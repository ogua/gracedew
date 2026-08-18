<?php
/**
 * HTTP client for the Gracedew International School public API, served by
 * the oguaschoolz backend at `api/v1/public/*` (see CLAUDE.md's "Backend
 * Integration Architecture" section for the full endpoint reference). This
 * is the only way this website talks to school data — it never holds a
 * database credential, unlike the old site's direct mysqli connection.
 */

// db/config.local.php (not part of the committed codebase — copy
// config.local.example.php to get started) may define GD_API_BASE to point
// at a local oguaschoolz dev server, and/or GD_API_TOKEN, the shared secret
// for admissions/enquiries/newsletter writes (must match WEBSITE_API_TOKEN
// in oguaschoolz's .env). It's loaded first so its overrides win below.
$gd_local_config = __DIR__.'/config.local.php';
if (file_exists($gd_local_config)) {
    require $gd_local_config;
}

if (! defined('GD_API_BASE')) {
    // Production default (oguaschoolz's APP_URL — no port there). Local dev
    // runs oguaschoolz on :7000; override GD_API_BASE in db/config.local.php
    // rather than changing this default, so production stays correct.
    define('GD_API_BASE', 'http://oguaschool.com/api/v1/public');
}

// Gracedew's tenant key in oguaschoolz (schools.uniqueid = 'admin', schools.id = 9).
define('GD_UNIQUEID', 'admin');

if (! defined('GD_API_TOKEN')) {
    define('GD_API_TOKEN', '');
}

/**
 * GET a public content endpoint. Returns the decoded `data` array, or an
 * empty array on any failure (network error, non-200, malformed JSON) so
 * pages degrade gracefully instead of fatal-erroring when the backend is
 * unreachable — callers should treat an empty result as "show nothing /
 * show an empty state", not as an error to surface to visitors.
 */
function gd_api_get(string $path, array $params = []): array
{
    $params['uniqueid'] = GD_UNIQUEID;
    $url = rtrim(GD_API_BASE, '/').'/'.ltrim($path, '/').'?'.http_build_query($params);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 5,
        CURLOPT_CONNECTTIMEOUT => 3,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
    ]);
    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error || $status !== 200 || ! $response) {
        gd_api_log_error("GET {$path} failed: ".($error ?: "HTTP {$status}"));

        return [];
    }

    $decoded = json_decode($response, true);

    return $decoded['data'] ?? [];
}

/**
 * POST to a write endpoint (admissions/enquiries/newsletter). $files is the
 * relevant slice of $_FILES (field => single-file array) for multipart
 * uploads. Returns ['ok' => bool, 'status' => int, 'body' => array] — callers
 * must check 'ok' and show the user a friendly error on failure, never a raw
 * API/network error.
 */
function gd_api_post(string $path, array $data = [], array $files = []): array
{
    $data['uniqueid'] = GD_UNIQUEID;
    $url = rtrim(GD_API_BASE, '/').'/'.ltrim($path, '/');

    $payload = gd_flatten_for_multipart($data);

    foreach ($files as $field => $file) {
        if (is_array($file) && ! empty($file['tmp_name']) && is_uploaded_file($file['tmp_name'])) {
            $payload[$field] = new CURLFile($file['tmp_name'], $file['type'] ?? '', $file['name'] ?? '');
        }
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'X-Website-Token: '.GD_API_TOKEN,
        ],
    ]);
    $response = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        gd_api_log_error("POST {$path} failed: {$error}");

        return ['ok' => false, 'status' => 0, 'body' => []];
    }

    $body = $response ? (json_decode($response, true) ?? []) : [];

    return ['ok' => $status >= 200 && $status < 300, 'status' => $status, 'body' => $body];
}

/**
 * Flattens nested arrays (e.g. ['guardian' => ['name' => 'X']] or indexed
 * document arrays) into the bracket-notation field names
 * (guardian[name], documents[0][type]) that oguaschoolz's Laravel validator
 * expects from a multipart form submission.
 */
function gd_flatten_for_multipart(array $data, string $prefix = ''): array
{
    $out = [];
    foreach ($data as $key => $value) {
        $field = $prefix === '' ? (string) $key : "{$prefix}[{$key}]";
        if (is_array($value)) {
            $out += gd_flatten_for_multipart($value, $field);
        } else {
            $out[$field] = $value;
        }
    }

    return $out;
}

function gd_api_log_error(string $message): void
{
    error_log('[gracedew-api] '.$message);
}

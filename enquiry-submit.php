<?php
/**
 * AJAX endpoint for the contact form on contact.php. Thin wrapper around
 * gd_api_post('enquiries', ...) — oguaschoolz's WebsiteContactController is
 * the real validation authority.
 */
require __DIR__.'/db/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

$data = [
    'fullname' => trim($_POST['fullname'] ?? ''),
    'phone' => trim($_POST['phone'] ?? ''),
    'email' => trim($_POST['email'] ?? ''),
    'note' => trim($_POST['note'] ?? ''),
];

$result = gd_api_post('enquiries', $data);

if ($result['ok']) {
    echo json_encode(['ok' => true, 'message' => $result['body']['message'] ?? "Thank you, we'll be in touch shortly."]);
    exit;
}

http_response_code(422);
echo json_encode([
    'ok' => false,
    'message' => $result['body']['message'] ?? 'We could not send your message. Please try again or contact us directly.',
]);

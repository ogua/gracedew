<?php
/**
 * AJAX endpoint for the newsletter signup (footer + contact page). Thin
 * wrapper around gd_api_post('newsletter', ...).
 */
require __DIR__.'/db/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

$result = gd_api_post('newsletter', ['email' => trim($_POST['email'] ?? '')]);

if ($result['ok']) {
    echo json_encode(['ok' => true, 'message' => 'Subscribed — thank you!']);
    exit;
}

http_response_code(422);
echo json_encode(['ok' => false, 'message' => $result['body']['message'] ?? 'Could not subscribe. Please check your email and try again.']);

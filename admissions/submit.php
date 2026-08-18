<?php
/**
 * AJAX endpoint the apply.php form posts to. Thin wrapper around
 * gd_api_post('admissions', ...) — validates nothing itself beyond basic
 * presence, since oguaschoolz's WebsiteAdmissionController is the real
 * server-side authority (never trust this layer, or the browser, alone).
 */
require __DIR__.'/../db/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed.']);
    exit;
}

$data = [
    'surname' => trim($_POST['surname'] ?? ''),
    'firstname' => trim($_POST['firstname'] ?? ''),
    'onames' => trim($_POST['onames'] ?? ''),
    'gender' => $_POST['gender'] ?? '',
    'dateofbirth' => $_POST['dateofbirth'] ?? '',
    'placeofbirth' => trim($_POST['placeofbirth'] ?? ''),
    'nationality' => trim($_POST['nationality'] ?? ''),
    'hometown' => trim($_POST['hometown'] ?? ''),
    'religion' => trim($_POST['religion'] ?? ''),
    'disability' => trim($_POST['disability'] ?? ''),
    'medicalinfo' => trim($_POST['medicalinfo'] ?? ''),
    'entrylevel' => $_POST['entrylevel'] ?? '',
    'guardian' => [
        'name' => trim($_POST['guardian_name'] ?? ''),
        'relationship' => trim($_POST['guardian_relationship'] ?? ''),
        'phone' => trim($_POST['guardian_phone'] ?? ''),
        'email' => trim($_POST['guardian_email'] ?? ''),
        'occupation' => trim($_POST['guardian_occupation'] ?? ''),
        'address' => trim($_POST['guardian_address'] ?? ''),
    ],
];

$documentTypes = ['birth_certificate', 'previous_report', 'other'];
$documents = [];
foreach ($documentTypes as $i => $type) {
    if (! empty($_FILES["document_{$type}"]['tmp_name']) && is_uploaded_file($_FILES["document_{$type}"]['tmp_name'])) {
        $data['documents'][$i]['type'] = $type;
        $documents["documents[{$i}][file]"] = $_FILES["document_{$type}"];
    }
}

$files = $documents;
if (! empty($_FILES['pic']['tmp_name']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
    $files['pic'] = $_FILES['pic'];
}

$result = gd_api_post('admissions', $data, $files);

if ($result['ok']) {
    echo json_encode([
        'ok' => true,
        'reference' => $result['body']['data']['reference'] ?? null,
        'submitted_at' => $result['body']['data']['submitted_at'] ?? null,
    ]);
    exit;
}

http_response_code(422);
echo json_encode([
    'ok' => false,
    'message' => $result['body']['message'] ?? 'We could not submit your application. Please check your details and try again.',
    'errors' => $result['body']['errors'] ?? null,
]);

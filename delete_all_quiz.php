<?php
// delete_all_quiz.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

$host = 'localhost'; // Tetap 'localhost' karena PHP script akan berjalan di server yang sama dengan database.
$user = 'socialroom_user'; // Gunakan user baru yang Anda buat
$pass = 'PASSWORD_KUAT_ANDA'; // Gunakan password yang Anda buat
$db = 'sosialrum';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

$sql = "TRUNCATE TABLE quiz_results";

if ($conn->query($sql)) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Query error: ' . $conn->error]);
}

$conn->close();
?>
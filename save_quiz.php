<?php
// save_quiz.php
header('Content-Type: application/json');

// Koneksi ke database (MySQL)
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

// Ambil data dari POST
$data = json_decode(file_get_contents('php://input'), true);
if (!isset($data['nama'], $data['nilai'], $data['misi'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}
$nama = $conn->real_escape_string($data['nama']);
$nilai = (int)$data['nilai'];
$misi = (int)$data['misi'];

// Simpan ke database
$sql = "INSERT INTO quiz_results (nama, nilai, misi, created_at) VALUES ('$nama', $nilai, $misi, NOW())";
if ($conn->query($sql)) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
}
$conn->close();

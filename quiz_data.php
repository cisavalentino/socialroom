<?php
// quiz_data.php
header('Content-Type: application/json');
$host = 'localhost'; // Tetap 'localhost' karena PHP script akan berjalan di server yang sama dengan database.
$user = 'socialroom_user'; // Gunakan user baru yang Anda buat
$pass = 'PASSWORD_KUAT_ANDA'; // Gunakan password yang Anda buat
$db = 'sosialrum';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([]);
    exit;
}
$sql = "SELECT nama, nilai, misi, created_at FROM quiz_results ORDER BY created_at DESC";
$res = $conn->query($sql);
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$conn->close();

<?php
// export_quiz.php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="quiz_results.csv"'); // This makes it download as a CSV

$host = 'localhost'; // Tetap 'localhost' karena PHP script akan berjalan di server yang sama dengan database.
$user = 'socialroom_user'; // Gunakan user baru yang Anda buat
$pass = 'PASSWORD_KUAT_ANDA'; // Gunakan password yang Anda buat
$db = 'sosialrum';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$sql = "SELECT nama, nilai, misi, created_at FROM quiz_results ORDER BY created_at DESC";
$res = $conn->query($sql);

// CSV Header Row
echo "Nama,Nilai,Ruang Misi,Waktu\n";

// CSV Data Rows
while ($row = $res->fetch_assoc()) {
    // Escaping double quotes for CSV
    echo '"'.str_replace('"','""',$row['nama']).'",';
    echo $row['nilai'].',';
    echo $row['misi'].','; // Assumes misi doesn't contain commas or double quotes
    echo '"'.$row['created_at'].'"'."\n"; // Ensure newline for next row
}

$conn->close();
?>
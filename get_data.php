<?php
// Koneksi ke database (contoh menggunakan MySQLi)
$mysqli = new mysqli("localhost", "root", "", "testing");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// Query untuk mendapatkan data
$query = "SELECT * FROM instansi";
$result = $mysqli->query($query);

// Inisialisasi array untuk menyimpan data
$data = array();

// Ambil data dari hasil query
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Tutup koneksi ke database
$mysqli->close();

// Mengirim data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>

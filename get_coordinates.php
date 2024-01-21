<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Buat query SQL tanpa filter
$sql = "SELECT latitude, longitude, name, status FROM your_table";

// Mempersiapkan statement
$stmt = $conn->prepare($sql);

// Eksekusi statement
$stmt->execute();

// Dapatkan hasil query
$result = $stmt->get_result();

// Siapkan array untuk menyimpan semua data
$allData = [];

if ($result->num_rows > 0) {
    // Loop melalui hasil query dan tambahkan ke array
    while ($row = $result->fetch_assoc()) {
        $allData[] = [
            'lat' => $row['latitude'],
            'lng' => $row['longitude'],
            'name' => $row['name'],
            'status' => $row['status'],
            // tambahkan kolom lain sesuai kebutuhan
        ];
    }
}

// Mengembalikan semua data sebagai JSON
header('Content-Type: application/json');
echo json_encode($allData);

// Tutup koneksi database
$stmt->close();
$conn->close();
?>

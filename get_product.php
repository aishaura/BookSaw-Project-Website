<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'login_systems';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Ambil produk dari database
$query = "SELECT * FROM buku";
$result = $conn->query($query);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        'id' => $row['id'],
        'name' => $row['judul_buku'],
        'image' => $row['gambar'],
        'price' => $row['harga']
    ];
}

// Ubah data ke JSON
header('Content-Type: application/json');
echo json_encode($products);
?>

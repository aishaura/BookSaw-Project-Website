<?php
session_start(); // Pastikan ini ada di baris pertama

$_SESSION['no_telp'] = $_POST['no_telp']; // Simpan nomor telepon
$_SESSION['alamat'] = $_POST['alamat']; // Simpan alamat

// Redirect ke invoice.php
header("Location: invoice.php");
exit();
?>

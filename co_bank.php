<?php
session_start();

// Simpan bank yang dipilih ke dalam sesi
if (isset($_POST['bank'])) {
    $_SESSION['selected_bank'] = $_POST['bank'];
}
$_SESSION['no_telp'] = $_POST['no_telp']; // Simpan nomor telepon
$_SESSION['alamat'] = $_POST['alamat']; // Simpan alamat

// Redirect ke invoice
header("Location: invoice.php");
exit();
?>

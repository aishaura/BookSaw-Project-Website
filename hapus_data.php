<?php
session_start();
include_once 'connection.php';

// Ambil user_id dari session
$user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

// Pastikan user_id valid sebelum melanjutkan
if ($user_id === 0) {
    die("Error: User tidak ditemukan.");
}

// Hapus satu item jika tombol "Hapus" diklik
if (isset($_POST['hapus']) && isset($_POST['id'])) {
    $id_hapus = (int)$_POST['id'];

    // Hapus dari session jika ada
    if (isset($_SESSION['users_data'][$user_id]['cart'][$id_hapus])) {
        unset($_SESSION['users_data'][$user_id]['cart'][$id_hapus]);
    }

    // Hapus dari database
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id_hapus, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Jika keranjang kosong, hapus session user
    if (empty($_SESSION['users_data'][$user_id]['cart'])) {
        unset($_SESSION['users_data'][$user_id]);
        unset($_SESSION['cart']);
    }

    header("Location: data_admin.php");
    exit();
}

// Hapus semua item di keranjang jika parameter `hapus_semua` dikirim
if (isset($_GET['hapus_semua']) && $_GET['hapus_semua'] == 1) {
    // Hapus semua dari session
    unset($_SESSION['users_data'][$user_id]['cart']);
    unset($_SESSION['cart']);

    // Hapus semua dari database berdasarkan user_id
    if ($conn) {
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: data_admin.php");
    exit();
}
?>

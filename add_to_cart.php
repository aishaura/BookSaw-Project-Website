<?php
session_start();

// Inisialisasi keranjang jika belum ada di sesi browser
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Periksa apakah permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // ID produk dari Supabase

    // Periksa apakah ada aksi tambah/kurang kuantitas dari halaman cart
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Penanganan aksi "tambah" kuantitas
        if ($action === 'tambah') {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['jumlah'] += 1;
            }
        }

        // Penanganan aksi "kurang" kuantitas
        elseif ($action === 'kurang') {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['jumlah'] -= 1;

                // Jika jumlah mencapai 0, hapus item dari keranjang session
                if ($_SESSION['cart'][$id]['jumlah'] <= 0) {
                    unset($_SESSION['cart'][$id]);
                }
            }
        }
    } else {
        // Jika form ditekan dari index.php (Tambah item baru ke keranjang)
        $gambar = $_POST['gambar'];
        $judul_buku = $_POST['judul_buku'];
        $harga = (float) $_POST['harga'];

        // Jika item sudah ada di keranjang, akumulasikan jumlahnya
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['jumlah'] += 1;
        } else {
            // Masukkan data struktur array baru ke dalam session
            $_SESSION['cart'][$id] = [
                'gambar' => $gambar,
                'judul_buku' => $judul_buku,
                'harga' => $harga,
                'jumlah' => 1
            ];
        }
    }
}

// PERBAIKAN: Redirect dialihkan ke file cart.php yang valid (bukan cartcoba.php)
header('Location: cart.php');
exit;
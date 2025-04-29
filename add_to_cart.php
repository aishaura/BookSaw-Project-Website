<?php
session_start();

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Periksa apakah permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; // ID produk

    // Periksa apakah ada aksi tambah/kurang atau item baru
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Penanganan aksi "tambah"
        if ($action === 'tambah') {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['jumlah'] += 1; // Tambah jumlah item
            }
        }

        // Penanganan aksi "kurang"
        elseif ($action === 'kurang') {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['jumlah'] -= 1; // Kurangi jumlah item

                // Jika jumlah mencapai 0, hapus item dari keranjang
                if ($_SESSION['cart'][$id]['jumlah'] <= 0) {
                    unset($_SESSION['cart'][$id]);
                }
            }
        }
    } else {
        // Jika tidak ada aksi, tambahkan item baru ke keranjang
        $gambar = $_POST['gambar'];
        $judul_buku = $_POST['judul_buku'];
        $harga = (float) $_POST['harga']; // Pastikan harga dalam format float

        // Jika item sudah ada di keranjang, tambahkan jumlahnya
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['jumlah'] += 1;
        } else {
            // Tambahkan item baru ke keranjang
            $_SESSION['cart'][$id] = [
                'gambar' => $gambar,
                'judul_buku' => $judul_buku,
                'harga' => $harga,
                'jumlah' => 1
            ];
        }
    }
}

// Redirect kembali ke halaman keranjang
header('Location: cartcoba.php');
exit;

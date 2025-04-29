<?php
session_start();
include_once 'connection.php';

// Set zona waktu Jakarta
date_default_timezone_set('Asia/Jakarta');

// Ambil data pengguna dari sesi (misalnya, username)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

// Inisialisasi data pengguna dalam sesi jika belum ada
if (!isset($_SESSION['users_data'])) {
    $_SESSION['users_data'] = [];
}

// Jika username baru, tambahkan data baru
if (!isset($_SESSION['users_data'][$username])) {
    $_SESSION['users_data'][$username] = [
        'waktu_masuk' => date('H:i:s'), // Menggunakan waktu Jakarta
        'cart' => isset($_SESSION['cart']) ? $_SESSION['cart'] : []
    ];
}

// Update data pengguna jika keranjang berubah
$_SESSION['users_data'][$username]['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Urutkan data berdasarkan username
ksort($_SESSION['users_data']);

if (isset($_POST['hapus'])) {
    $id_hapus = $_POST['id'];
    unset($_SESSION['users_data'][$username]['cart'][$id_hapus]);
    $_SESSION['cart'] = $_SESSION['users_data'][$username]['cart'];
    header("Location: data_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .user-section {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
</nav>

<div class="container mt-4">
    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        <a href="index.php" class="btn btn-primary">Kembali ke Dashboard Admin</a>
        <a href="data_admin.php" class="btn btn-primary">Data Keranjang User</a>
        <a href="data_user.php" class="btn btn-primary">Data User</a>
    </div>

<div class="container mt-4">
    <h2>Data Keranjang User</h2>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Judul Buku</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['users_data'] as $user => $data): ?>
                <tr class="user-section">
                    <td colspan="7" class="table-secondary"><strong><?= $user ?></strong> - Waktu Masuk: <?= $data['waktu_masuk'] ?> - <strong><?= array_sum(array_column($data['cart'], 'jumlah')) ?> Total Item</strong></td>
                </tr>
                <?php if (!empty($data['cart'])): ?>
                    <?php foreach ($data['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= $item['judul_buku'] ?></td>
                        <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp<?= number_format($item['harga'] * $item['jumlah'], 0, ',', '.') ?></td>
                        <td>
                        <form method="POST">
                        <input type="hidden" name="id" value="<?= $id ?>">
                         <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                        </form>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada item di keranjang</td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Daftar Pengguna Terdaftar</title>
<!-- Link Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
        font-size: 15px;
    }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid black; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
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
<div class="container mt-5">
    <h2 class="text-center">Daftar Pengguna Terdaftar</h2>
    <?php
    // Koneksi ke database login_systems
    $conn2 = mysqli_connect("localhost", "root", "", "login_systems");
    if (!$conn2) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $resultUsers = mysqli_query($conn2, "SELECT id, username, created_at FROM pembeli");

    if (mysqli_num_rows($resultUsers) > 0) {
    ?>
    <table class='table table-bordered table-striped mt-3'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Tanggal Pendaftaran</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultUsers)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } else { echo "Belum ada pengguna terdaftar."; } ?>
</div>
</body>
</html>

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
        'waktu_masuk' => date('Y-m-d H:i:s'), // Menggunakan waktu Jakarta
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
    header("Location: data_keranjang2.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="admin.css">

	<title>AdminHub</title>
	<style>
    body.dark .bx-search{
			color: var(--light) !important;
		}
    .user-section {
        background-color: #e9ecef;
        font-weight: bold;
		width: 100%;
    }
    .user-section td {
    width: 100%;
    background-color: #e9ecef;
    font-weight: bold;
	padding: 10px;
    text-align: left;
}

		.dashboard {
    /* width: 80%; */
    /* max-width: 600px; */
    background-color: #8EC5FC;
    background: linear-gradient(135deg, #8EC5FC, #E0C3FC);
    color: white;
    border-radius: 15px;
    padding: 20px;
    position: relative;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
	width: auto; 
    max-width: 2000px; /* Maksimum lebar lebih besar */
    height: 300px; /* Tinggi lebih besar */
	margin-top: 20px;
}

/* Kotak Waktu di Pojok Kiri Atas */
.datetime-box {
    position: absolute;
    top: 10px;
    left: 25px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: bold;
}

/* Greeting di Kiri Bawah */
.greeting {
    position: absolute;
    bottom: 70px;
    left: 25px;
}

h1 {
    /* margin: 0; */
    font-size: 70px;
}

p {
    /* margin: 5px 0 0; */
    font-size: 25px;
    opacity: 0.9;
}
/* Gambar di sebelah kanan */
.admin-image {
    position: absolute;
    right: 70px;
    bottom: 10px;
    width: 480px;  /* Sesuaikan ukuran */
    height: auto; /* Agar proporsi tetap */
    border-radius: 10px; /* Opsional, membuat sudut agak melengkung */
}
#content main .table-data .order table th {
	font-size: 16px;
}
</style>
	
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand" >
		<i class='bx bxs-book-reader' style="font-size: 35px; margin-left:10px;"></i>
			<span class="text" style="font-size: 35px;">BOOKSAW</span>
		</a> 
		<ul class="side-menu top">
			<li class="active" id="">
				<a href="admin.php" id="dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="data_keranjang2.php" id="data-keranjang">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Data Pembelian Pengguna</span>
				</a>
			</li>
			
			
			<li>
				<a href="data_user2.php" id="data-login">
					<i class='bx bxs-group' ></i>
					<span class="text">Data Pengguna Terdaftar</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="signup.php" class="logout">
                    <i class='bx bx-log-out'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' style="color: white;"></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>

			<a href="#" class="notification">
				<i class='bx bxs-bell' style="color: white;" ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="3d.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Pembelian Pengguna</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">BookSaw Halaman Admin</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" style="color: #187fd8;" href="#">Data Pembelian Pengguna</a>
						</li>
					</ul>
				</div>
				
			</div>

			<!-- HEADLINE -->
		<div class="dashboard">
        <!-- Waktu di pojok kiri atas -->
        <div class="datetime-box">
            <span id="datetime"></span>
        </div>

        <!-- Teks di kiri bawah -->
        <div class="greeting">
            <h1>BUKU JENDELA DUNIA</h1>
            <p>Sebar kebaikan lewat ilmu💕</p>
        </div>

		<!-- Gambar di sebelah kanan -->
		<img src="buku.png" alt="Admin Image" class="admin-image">
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', year: 'numeric', month: 'long', 
                day: 'numeric', hour: '2-digit', minute: '2-digit', 
                timeZone: 'Asia/Jakarta' 
            };
            document.getElementById("datetime").innerText = now.toLocaleString('id-ID', options);
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Data Pembelian Pengguna</h3>
						<div style="display: flex; justify-content: space-between; align-items: center; width: 50%; padding: 30px;">
            			</div>
					</div>

					<?php
					// Koneksi ke database login_systems
					$conn2 = mysqli_connect("localhost", "root", "", "login_systems");
					if (!$conn2) {
						die("Koneksi gagal: " . mysqli_connect_error());
					}

					$resultUsers = mysqli_query($conn2, "SELECT id, username, created_at FROM pembeli");

					if (mysqli_num_rows($resultUsers) > 0) 
					?>
						<table>
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
									<td colspan="5" class="table-secondary">
										<strong><?= $user ?></strong> - Waktu Masuk: <?= date('Y-m-d', strtotime($data['waktu_masuk'])) ?> pada waktu <?= date('H:i:s', strtotime($data['waktu_masuk'])) ?> - 
										<strong><?= array_sum(array_column($data['cart'], 'jumlah')) ?> Total Item</strong>
									</td>
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
							<button type="submit" name="hapus" style="background: none; border: none; padding: 0; cursor: pointer;">
								<i class='bx bxs-trash' style="color: red; font-size: 27px;"></i>
							</button>
						</form>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada item di keranjang</td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
							</tbody>
						</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="admin.js"></script>
</body>
</html>
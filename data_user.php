<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/css/admin.css">

	<title>AdminHub</title>
	<style>
		body.dark .bx-search{
			color: var(--light) !important;
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
    font-size: 50px;
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
    width: 430px;  /* Sesuaikan ukuran */
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
		<i class='bx bxs-book-reader' style="font-size: 35px;margin-left:10px"></i>
			<span class="text" style="font-size: 35px;">BOOKSAW</span>
		</a> 
		<ul class="side-menu top">
			<li>
				<a href="admin.php" id="dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="data_keranjang.php" id="data-keranjang">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Data Pembelian Pengguna</span>
				</a>
			</li>
			
			
			<li class="active">
				<a href="data_user.php" id="data-login">
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
				<img src="assets/images/3d.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Pengguna Terdaftar</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">BookSaw Halaman Admin</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" style="color: #187fd8;" href="#">Data Pengguna Terdaftar</a>
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
            <h1>"Hard Work Today <br>
				Bring Success Tomorrow"</h1>
        </div>

		<!-- Gambar di sebelah kanan -->
		<img src="assets/images/bew.png" alt="Admin Image" class="admin-image">
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
						<h3>Data Login Pengguna</h3>
						<div style="display: flex; justify-content: space-between; align-items: center; width: 50%; padding: 30px;">
            			</div>
					</div>

					<?php
					include_once 'includes/connection.php';
					$resultUsers = fetch_supabase_data('pembeli?select=id,username,created_at&order=id.asc');

					if (!empty($resultUsers) && is_array($resultUsers)) {
					?>
						<table>
							<thead>
								<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Tanggal Pendaftaran</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($resultUsers as $row) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo date('Y-m-d H:i:s', strtotime($row['created_at'])); ?></td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
					<?php } else { echo "Belum ada pengguna terdaftar."; } ?>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="assets/js/admin.js"></script>
</body>
</html>

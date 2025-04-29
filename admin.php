<?php
session_start();
include_once 'connection.php';
$result = mysqli_query($conn, "SELECT * FROM buku");
$totalBuku = mysqli_num_rows($result);
// Koneksi ke database login_systems2
$conn2 = mysqli_connect("localhost", "root", "", "login_systems");
if (!$conn2) {
    die("Koneksi ke database login_systems gagal: " . mysqli_connect_error());
}

// Query untuk menghitung jumlah user yang pernah login
$resultVisitors = mysqli_query($conn2, "SELECT COUNT(*) AS total_visitors FROM pembeli");
$rowVisitors = mysqli_fetch_assoc($resultVisitors);
$totalVisitors = $rowVisitors['total_visitors']; // Jumlah pengguna yang pernah login
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

	<title>Dashboard Admin - BOOKSAW</title>

	<style>
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
    bottom: 20px;
    left: 25px;
}

h1 {
    margin: 0;
    font-size: 40px;
}

p {
    margin: 5px 0 0;
    font-size: 16px;
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
#content main .box-info li{
	background: var(--light);
	position: relative; /* Dibutuhkan untuk pseudo-element */
    overflow: hidden; /* Mencegah elemen tambahan melampaui batas */
}
#content main .box-info li:nth-child(1)::before{
	content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 17px; /* Lebar garis */
    height: 100%;
    background: #97BBFF; /* Warna ungu */
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}
#content main .box-info li:nth-child(1){
	background: var(--light);
}
#content main .box-info li:nth-child(2)::before{
	content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 17px; /* Lebar garis */
    height: 100%;
    background: #B09CFF; /* Warna ungu */
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}
#content main .box-info li:nth-child(2){
	background: var(--light);
}
#content main .box-info li:nth-child(3)::before{
	content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 17px; /* Lebar garis */
    height: 100%;
    background: #EA98EC; /* Warna ungu */
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}
#content main .box-info li:nth-child(3){
	background: var(--light);
}
.modal-content {
	line-height: 25px;
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">BookSaw Halaman Admin</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" style="color: #187fd8;" href="#">Dashboard</a>
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
            <h1>Selamat Datang Kembali, <br>Admin Haura!</h1>
            <p>Semoga harimu menyenangkan dan penuh semangat😊</p>
        </div>

		<!-- Gambar di sebelah kanan -->
		<img src="admin222.png" alt="Admin Image" class="admin-image">
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

			<ul class="box-info">
			
                <li>
					<i class='bx bxs-book-heart' style="font-size: 80px"></i>
					<span class="text">
						<h3><?= $totalBuku ?></h3>
						<p>Buku di Katalog</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-group' style="font-size: 80px"></i>
                    <span class="text">
                        <h3><?= $totalVisitors ?></h3>
                        <p>Pengguna</p>
                    </span>
                </li>
                <?php
				$totalHarga = 0; // Variabel total harga

                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id => $item) {
                        $subtotal = $item['harga'] * $item['jumlah']; // Hitung subtotal tiap item
                        $totalHarga += $subtotal; // Tambahkan ke total harga
                    }
                }
                ?>
                <li>
                    <i class='bx bxs-dollar-circle' style="font-size: 80px"></i>
                    <span class="text">
                        <h3>Rp<?= number_format($totalHarga, 0, ',', '.') ?></h3>
                        <p>Total Sales</p>
                    </span>
                </li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Books Catalog</h3>
						<div style="display: flex; justify-content: space-between; align-items: center; width: 50%; padding: 30px;">
                <!-- Judul -->
                <div>
                    <h2 style="margin: 0; font-size: 20px; font-weight: bold;"></h2>
                </div>

                <!-- Bagian kanan: Ikon "+" dan Kolom Pencarian -->
                <div style="display: flex; align-items: center; gap: 10px;">
                    <!-- Kolom Pencarian -->
                    <div style="display: flex; align-items: center; background: #e3e1e1; border-radius: 20px; padding: 10px 15px; width: 300px; ">
                        <span style="margin-right: 10px;">
                            <i class='bx bx-search' style="font-size: 20px; color: #b0b0b0;"></i>
                        </span>
                        <input type="text" id="searchInput" placeholder="Search" 
                            style="border: none; background: none; outline: none; flex: 1; font-size: 15px; color: #666; padding: 5px;">
                    </div>
                </div>
            </div>
			
            <a href="create2.php"><i class='bx bx-plus' style="font-size: 27px; color: black; margin-right:20px;"></i></a>
					</div>

					<?php if (mysqli_num_rows($result) > 0) { ?>
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Gambar</th>
									<th>Judul Buku</th>
									<th>Pengarang</th>
									<th>Kategori</th>
									<th>Sinopsis</th>
									<th>Harga</th>
									<th>Stok Tersedia</th>
									<th>Id Admin</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php while($row = mysqli_fetch_array($result)) { ?>
									<tr>
										<td><?php echo $row["id"]; ?></td>
										<td><img src="<?php echo $row["gambar"]; ?>" style="width: 50px;"></td>
										<td><?php echo $row["judul_buku"]; ?></td>
										<td><?php echo $row["pengarang"]; ?></td>
										<td><?php echo $row["kategori"]; ?></td>
										<td>
											<button class="lihat-sinopsis" onclick="showSinopsis('<?php echo htmlspecialchars($row["sinopsis"], ENT_QUOTES, 'UTF-8'); ?>')">
												Lihat Sinopsis
											</button>
										</td>

										<td><?php echo $row["harga"]; ?></td>
										<td><?php echo $row["stok_tersedia"]; ?></td>
										<td><?php echo $row["id_admin"]; ?></td>
										<td>
											<a href="update2.php?id=<?php echo $row["id"]; ?>" title='Update Record'><i class='bx bx-edit' style="font-size: 27px; text-decoration:none;"></i></a>
											<a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record' onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');"><i class='bx bx-trash' style="font-size: 27px"></i></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } else { echo "<p>No result found</p>"; } ?>

				</div>
			</div>
			<!-- Modal Pop-up -->
			<div class="modal">
				<div class="modal-content" style="font-size:18px;">
					<p id="sinopsisText"></p>
					<button onclick="closeSinopsis()">OK</button>
				</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<!-- POP UP -->
	<script>
		// Membuat elemen modal secara dinamis
const modal = document.createElement("div");
modal.classList.add("modal");
modal.innerHTML = `
    <div class="modal-content">
        <p id="sinopsis-text"></p>
        <button onclick="closeSinopsis()">Tutup</button>
    </div>
`;
document.body.appendChild(modal);

// Fungsi untuk menampilkan sinopsis
function showSinopsis(sinopsis) {
    document.getElementById("sinopsis-text").innerText = sinopsis;
    modal.style.display = "flex";
}

// Fungsi untuk menutup modal
function closeSinopsis() {
    modal.style.display = "none";
}

// Menutup modal jika pengguna mengklik di luar modal
modal.addEventListener("click", function (event) {
    if (event.target === modal) {
        closeSinopsis();
    }
});
	 </script>
	<!-- JavaScript untuk Search -->
<script>
document.getElementById('searchInput').addEventListener('input', function () {
    let searchQuery = this.value.toLowerCase();
    let rows = document.querySelectorAll('table tr');

    rows.forEach((row, index) => {
        if (index === 0) return; // Lewati header tabel
        let title = row.cells[2].textContent.toLowerCase();
        let author = row.cells[3].textContent.toLowerCase();
        let category = row.cells[4].textContent.toLowerCase();
        
        if (title.includes(searchQuery) || author.includes(searchQuery) || category.includes(searchQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});


</script>


	<script src="admin.js"></script>
</body>
</html>
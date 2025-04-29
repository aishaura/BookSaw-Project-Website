<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
      body {
        background: #e0d9f5;
            }
        .navbar-custom {
            background:  #6c48b5;
            padding: 20px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            position: sticky;
            /* Tambahan gaya */
            margin: 15px 30px; /* Margin atas 10px, kiri & kanan 5px */
            border-radius: 30px; /* Border radius 30% */
            position: sticky;
            top: 0;
            z-index: 1000; /* Pastikan navbar tetap di atas elemen lain */
            transition: all 0.3s ease-in-out;
        }

.navbar-custom .nav-right {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-right: 25px;
}

.logo img {
    height: 40px;
}
.navbar-custom .nav-left {
    display: flex;
    align-items: center;
    gap: 300px;
    font-family: 'Lato', sans-serif;
}

.navbar-custom .nav-left form {
    background: white;
    border-radius: 30px;
    padding: 5px 15px; /* Mengurangi padding agar lebih ke kiri */
    display: flex;
    align-items: center;
    width: 100%;

}

.navbar-custom .nav-left .input-group {
    display: flex;
    align-items: center;
    width: 100%;
}

.navbar-custom .nav-left .input-group-text {
    background: white;
    border: none;
    padding-left: 5px; /* Memastikan ikon lebih ke kiri */
}

.navbar-custom .nav-left form input {
    border: none;
    outline: none;
    font-size: 14px;
    margin-left: 5px;
    flex-grow: 1; /* Agar input menyesuaikan lebar */
}


.icon-btn {
    position: relative;
    font-size: 20px;
    color: white;
    text-decoration: none;
}

/* Notifikasi Cart */
.cart-badge {
    position: absolute;
    top: 0;
    right: 50px; /* Menyesuaikan posisi agar lebih dekat ke ikon */
    transform: translate(50%, -50%);
    background-color: #dc3545; /* Warna merah */
    color: white;
    font-size: 12px;
    font-weight: bold;
    padding: 4px 8px;
    border-radius: 50%;
    display: none; /* Default disembunyikan jika 0 */
    min-width: 20px; /* Ukuran minimal */
    text-align: center;
}
.navbar-custom .nav-left .logo {
	font-size: 24px;
	font-weight: 700;
	height: 56px;
	display: flex;
	align-items: center;
	color: #F9F9F9;
	position: sticky;
	top: 5px;
	left: 0;
	z-index: 500;

	box-sizing: content-box;
}
.navbar-custom .nav-left .logo .bx {
	min-width: 60px;
	display: flex;
	justify-content: center;
}
        .book-container {
            margin: 40px auto;
            max-width: 900px;
            background: #ffffff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .book-cover {
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
        }
        .price {
            font-size: 1.8rem;
            color: #dc3545;
            font-weight: bold;
        }
        button:hover{
            color:white;
        }

    </style>
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar-custom">
        <!-- Kiri: Logo & Search -->
        <div class="nav-left">
            <div class="logo">
            <i class='bx bxs-book-reader' style="font-size: 35px;margin-left:10px"></i>
			<span class="text" style="font-size: 35px;">BOOKSAW</span>
            </div>
            
        </div>

        <!-- Kanan: Cart, Logout, Profil -->
        <div class="nav-right">
            <!-- Cart -->
            <!-- <a href="cart.php" class="btn d-flex align-items-center position-relative" style="color: white;">
                <i class="fa-solid fa-cart-shopping me-2" style="font-size: 27px;"></i>
                <span class="cart-badge badge rounded-pill" id="cart-count">0</span>
            </a> -->

            <!-- Logout -->
            <a href="logout.php" class="icon-btn" style="font-size: 27px;">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </div>
    </nav>


<div class="container">
    <div class="book-container row">
        <?php
        include_once 'connection.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'");
            if ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="col-md-4">
                    <img src="<?php echo $row['gambar']; ?>" class="img-fluid book-cover" alt="Book Cover">
                </div>
                <div class="col-md-8">
                    <h2><?php echo $row['judul_buku']; ?></h2>
                    <p class="text-muted">By: <?php echo $row['pengarang']; ?></p>
                    <p class="text-secondary">Genre: <?php echo $row['kategori']; ?></p>
                    <p>
                        <?php echo nl2br($row['sinopsis']); ?>
                    </p>
                    <p class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>

                    <!-- Add to cart button -->
                    <!-- <form method="POST" action="add_to_cart.php" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="judul_buku" value="<?php echo $row['judul_buku']; ?>">
                        <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                        <button type="submit" class="btn btn-warning">Tambah ke Keranjang</button>
                    </form> -->
                    <button class="btn btn-outline-secondary ms-2"><a href="user.php" style="text-decoration:none; color: light blue">Kembali ke Dashboard</a></button>
                </div>
        <?php
            } else {
                echo "<p>Book not found!</p>";
            }
        } else {
            echo "<p>No book selected!</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

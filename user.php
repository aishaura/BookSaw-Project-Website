

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>USER</title>
<?php include "head.php"; ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

<!-- Link Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="user.css" />
    <style>
        body {
            background:rgb(241, 236, 246);
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
header {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-image: 
      url("papa.svg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 999; /* Supaya header berada di belakang navbar */
  }
  .footer {
    background-color: #44297b;
    text-align: center;
    padding: 30px 0;
}

.footer-logo {
    font-size: 24px;
    font-weight: bold;
    color: white;
    margin-bottom: 5px;
}

.footer-menu {
    list-style: none;
    padding: 0;
    margin: 5px 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.footer-menu li {
    display: inline;
    font-size: large;
    color: white;
}

.footer-menu a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

.social-icons {
    margin: 10px 0;
}

.social-icons a {
    text-decoration: none;
    margin: 0 10px;
    font-size: 27px;
    color: white;
}

.footer-bottom {

    color: white;
    text-align: center;
    font-size: 14px;
}
    </style>
</head>
<body>
    
<!-- NAVBAR2 -->
  <!-- Navbar -->
  <nav class="navbar-custom">
        <!-- Kiri: Logo & Search -->
        <div class="nav-left">
            <div class="logo">
            <i class='bx bxs-book-reader' style="font-size: 35px;margin-left:10px"></i>
			<span class="text" style="font-size: 35px;">BOOKSAW</span>
            </div>
            <form class="d-flex mx-auto" style="width: 400px;" role="search">
                <div class="input-group">
                <span class="input-group-text bg-white border-0">
                    <i class="fa-solid fa-magnifying-glass text-muted" style="font-size: 18px"></i>
                </span>
                <input type="text" id="searchInput" placeholder="Cari buku..." class="form-control border-0" style="font-size: 15px">
                </div>
            </form>
        </div>

        <!-- Kanan: Cart, Logout, Profil -->
        <div class="nav-right">
            <!-- Cart -->
            <a href="cartcoba.php" class="btn d-flex align-items-center position-relative" style="color: white;">
                <i class="fa-solid fa-cart-shopping me-2" style="font-size: 27px;"></i>
                <span class="cart-badge badge rounded-pill" id="cart-count">0</span>
            </a>

            <!-- Logout -->
            <a href="signin.php" class="btn d-flex align-items-center position-relative" style="color: white; font-size: 27px;">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </div>
    </nav>

    <!-- MAIN HEAD -->
    <header>
      <div class="section__container">
        <div class="header__content">
        </div>
      </div>
    </header>
    <!-- MAIN HEAD -->

  

<!-- start: Tab -->
<section class="tab-section">
    <div class="container">
        <div class="tab-pane">
            <button type="button" data-tab-pane="all" class="tab-pane-item active">
                <span class="tab-pane-item-title">01</span>
                <span class="tab-pane-item-subtitle"style="font-size:15px">Semua Buku</span>
            </button>
            <button type="button" data-tab-pane="horror" class="tab-pane-item after">
                <span class="tab-pane-item-title">02</span>
                <span class="tab-pane-item-subtitle" style="font-size:15px">Horor</span>
            </button>
            <button type="button" data-tab-pane="fantasy" class="tab-pane-item after">
                <span class="tab-pane-item-title">03</span>
                <span class="tab-pane-item-subtitle"style="font-size:15px">Fantasy</span>
            </button>
            <button type="button" data-tab-pane="comedy" class="tab-pane-item after">
                <span class="tab-pane-item-title">04</span>
                <span class="tab-pane-item-subtitle"style="font-size:15px">Comedy</span>
            </button>
            <button type="button" data-tab-pane="romance" class="tab-pane-item after">
                <span class="tab-pane-item-title">05</span>
                <span class="tab-pane-item-subtitle"style="font-size:15px">Romance</span>
            </button>
        </div>

        <?php
        include_once 'connection.php';

        function getBooksByCategory($conn, $category = null) {
            if ($category) {
                $query = "SELECT * FROM buku WHERE kategori = '$category'";
            } else {
                $query = "SELECT * FROM buku";
            }
            return mysqli_query($conn, $query);
        }

        $categories = [
            "all" => null,
            "horror" => "Horor",
            "fantasy" => "Fantasy",
            "comedy" => "Comedy",
            "romance" => "Romance"
        ];

        foreach ($categories as $tab => $category) {
            $books = getBooksByCategory($conn, $category);
            echo '<div class="tab-page ' . ($tab === "all" ? "active" : "") . '" data-tab-page="' . $tab . '">';
            
            if (mysqli_num_rows($books) > 0) {
                echo '<div class="row">';
                while ($row = mysqli_fetch_array($books)) {
                    ?>
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <img src="<?php echo $row['gambar']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['judul_buku']; ?></h5>
                                <p class="card-text">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                                <div class="btn-container d-flex flex-column">
                                    <form method="POST" action="add_to_cart.php">
                                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                        <input type="hidden" name="gambar" value="<?php echo $row["gambar"]; ?>">
                                        <input type="hidden" name="judul_buku" value="<?php echo $row["judul_buku"]; ?>">
                                        <input type="hidden" name="harga" value="<?php echo $row["harga"]; ?>">
                                        <button type="submit" class="btn btn-dark w-100" style="font-size:16px;">Tambah ke Keranjang</button>
                                    </form>
                                    <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark w-100 mt-1" style="font-size:16px;">Lihat Details</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <?php
                }
                echo '</div>';
            } else {
                echo '<p class="text-center">Tidak ada buku dalam kategori ini.</p>';
            }
            echo '</div>';
        }
        ?>
    </div>
</section>

<footer class="footer">
        <div class="footer-logo">
        <i class='bx bxs-book-reader' style="font-size: 35px;margin-left:10px"></i>
        <span class="text" style="font-size: 35px;">BOOKSAW</span>
        </div>
        <ul class="footer-menu">
            <li>Kontak kami di berbagai sosial media untuk dapat berita terupdate setiap harinya!</li>
        </ul>
        <div class="social-icons">
        <a href="https://www.facebook.com/SiameseAssetThailand/?locale=id_ID"><i class="ri-facebook-circle-fill"></i></a>
              <a href="https://www.instagram.com/siameseassetcorp/?hl=en"><i class="ri-instagram-fill"></i></a>
              <a href="https://x.com/siameseasset"><i class="ri-twitter-fill"></i></a>
              <a href="https://www.youtube.com/@SiameseAssetCorp"><i class="ri-youtube-fill"></i></a>
        </div>
        <div class="footer-bottom">
    Created by NakynAisha. | &copy; 2024. All rights reserved.
    </div>
    </footer>
<!-- end: Tab -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let tabButtons = document.querySelectorAll(".tab-pane-item");
        let tabPages = document.querySelectorAll(".tab-page");

        tabButtons.forEach(button => {
            button.addEventListener("click", function () {
                let tab = this.getAttribute("data-tab-pane");

                tabButtons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");

                tabPages.forEach(page => {
                    page.classList.remove("active");
                    if (page.getAttribute("data-tab-page") === tab) {
                        page.classList.add("active");
                    }
                });
            });
        });
    });
</script>

        <!-- end: Tab -->

        <script src="user.js"></script>


<script>document.getElementById('searchInput').addEventListener('input', function () {
    let searchQuery = this.value.toLowerCase(); // Ambil teks input dan ubah ke huruf kecil
    let books = document.querySelectorAll('.card'); // Ambil semua kartu buku

    books.forEach(book => {
        let title = book.querySelector('.card-title').textContent.toLowerCase(); // Ambil judul buku
        if (title.includes(searchQuery)) {
            book.style.display = 'block'; // Tampilkan buku yang cocok
        } else {
            book.style.display = 'none'; // Sembunyikan buku yang tidak cocok
        }
    });
});
</script>

<script>books.forEach(book => {
    let titleElement = book.querySelector('.card-title');
    let title = titleElement.textContent;
    
    if (title.toLowerCase().includes(searchQuery)) {
        let regex = new RegExp((${searchQuery}), 'gi');
        titleElement.innerHTML = title.replace(regex, <mark>$1</mark>);
    } else {
        titleElement.innerHTML = title; // Kembalikan ke normal jika tidak cocok
    }
});
</script>

<!-- JavaScript untuk Search -->
<script>
document.getElementById('searchInput').addEventListener('input', function () {
    let searchQuery = this.value.toLowerCase();
    let books = document.querySelectorAll('.book-card');

    books.forEach(book => {
        let titleElement = book.querySelector('.card-title');
        let title = titleElement.textContent;

        if (title.toLowerCase().includes(searchQuery)) {
            book.style.display = 'block';
            let regex = new RegExp((${searchQuery}), 'gi');
            titleElement.innerHTML = title.replace(regex, <mark>$1</mark>);
        } else {
            book.style.display = 'none';
        }
    });

    // Pindahkan hasil pencarian ke atas kanan
    let container = document.getElementById('bookContainer');
    let filteredBooks = Array.from(books).filter(book => book.style.display === 'block');
    container.innerHTML = ''; // Kosongkan hasil lama
    filteredBooks.forEach(book => container.appendChild(book)); // Tambahkan hasil yang cocok
});
</script>
<script>
    function updateCartCount() {
        fetch("cart_count.php")
        .then(response => response.text())
        .then(data => {
            let cartBadge = document.getElementById("cart-count");
            cartBadge.textContent = data;

            // Jika jumlah > 0, tampilkan badge, jika tidak, sembunyikan
            if (parseInt(data) > 0) {
                cartBadge.style.display = "inline-block";
            } else {
                cartBadge.style.display = "none";
            }
        });
    }

    // Panggil saat halaman dimuat
    document.addEventListener("DOMContentLoaded", updateCartCount);

    document.addEventListener("scroll", function() {
    let navbar = document.querySelector(".navbar-custom");

    if (window.scrollY > 50) {
        navbar.style.boxShadow = "0px 4px 10px rgba(0, 0, 0, 0.3)";
    } else {
        navbar.style.boxShadow = "none";
    }
});

</script>

    


</body>
</html>
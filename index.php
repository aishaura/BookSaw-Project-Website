<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BookSaw - Toko Buku Digital</title>
    
    <?php include "head.php"; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: rgb(230, 210, 208);
        }
        .navbar {
            background-color: #a82d2d;
            padding: 20px;
        }
        img {
            border-radius: 5px;
            object-fit: cover;
        }
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="main-logo">
                <a href="index.php"><img src="assets/images/main-logo.png" alt="logo" height="40"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <form class="d-flex mx-auto" style="width: 40%;" role="search" onsubmit="return false;">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-0">
                            <i class="fa-solid fa-magnifying-glass text-muted" style="font-size: 15px"></i>
                        </span>
                        <input type="text" id="searchInput" placeholder="Cari buku..." class="form-control border-0" style="font-size: 15px">
                    </div>
                </form>
                <div class="d-flex align-items-center gap-3">
                    <a href="cart.php" class="btn" style="color: white;">
                        <i class="fa-solid fa-cart-shopping" style="font-size: 24px;"></i>
                    </a>
                    <a href="signin.php" class="btn" style="color: white;">
                        <i class="fas fa-sign-out-alt" style="font-size: 24px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row" id="bookContainer">
            <?php
            // 1. Memanggil file koneksi Supabase baru di dalam folder includes
            include_once 'includes/connection.php';
            
            // 2. Mengambil data dari Supabase via cURL (BUKAN mysqli_query lagi)
            $buku_list = fetch_supabase_data('buku?select=*&order=id.asc');

            if (!empty($buku_list) && is_array($buku_list)) {
                foreach ($buku_list as $row) {
                    // Gunakan path gambar dari database langsung
                    $gambar_path = $row['gambar'];
            ?>
                    <div class="col-md-3 mb-4 book-item">
                        <div class="card h-100">
                            <img src="<?php echo $gambar_path; ?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="<?php echo $row['judul_buku']; ?>">
                            <div class="card-body d-flex flex-column justify-content-between text-center">
                                <div>
                                    <h5 class="card-title fs-5 fw-bold mb-2"><?php echo $row['judul_buku']; ?></h5>
                                    <p class="card-text text-danger fw-bold fs-6">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                                </div>
                                
                                <div class="d-flex gap-2 mt-3">
                                    <form method="POST" action="add_to_cart.php" class="w-50">
                                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                        <input type="hidden" name="gambar" value="<?php echo $gambar_path; ?>">
                                        <input type="hidden" name="judul_buku" value="<?php echo $row["judul_buku"]; ?>">
                                        <input type="hidden" name="harga" value="<?php echo $row["harga"]; ?>">
                                        <button type="submit" class="btn btn-dark w-100 btn-sm" style="font-size: 0.8rem;">+ Keranjang</button>
                                    </form>
                                    <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark w-50 btn-sm d-flex align-items-center justify-content-center" style="font-size: 0.8rem;">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col-12'><p class='text-center text-muted'>Tidak ada koleksi buku tersedia atau konfigurasi Supabase salah.</p></div>";
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <script>
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchQuery = this.value.trim().toLowerCase();
        let bookItems = document.querySelectorAll('.book-item');

        bookItems.forEach(item => {
            let titleElement = item.querySelector('.card-title');
            let originalTitle = titleElement.textContent;
            
            if (!titleElement.getAttribute('data-original-title')) {
                titleElement.setAttribute('data-original-title', originalTitle);
            }
            
            let titleToSearch = titleElement.getAttribute('data-original-title');

            if (titleToSearch.toLowerCase().includes(searchQuery)) {
                item.style.display = 'block';
                if (searchQuery !== '') {
                    let regex = new RegExp(`(${searchQuery})`, 'gi');
                    titleElement.innerHTML = titleToSearch.replace(regex, '<mark class="p-0 bg-warning">$1</mark>');
                } else {
                    titleElement.innerHTML = titleToSearch;
                }
            } else {
                item.style.display = 'none';
            }
        });
    });
    </script>
</body>
</html>
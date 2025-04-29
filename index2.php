

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
    <style>
        body {
            background:rgb(230, 210, 208);
            }
 
            
        .navbar {
            background-color:#a82d2d;
            padding:20px;
        }
        
        img {
        border-radius: 5px;
        object-fit: cover;
    }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="main-logo">
      <a href="index2.php"><img src="img/main-logo.png" alt="logo"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <form class="d-flex mx-auto" style="width: 40%;" role="search">
        <div class="input-group">
          <span class="input-group-text bg-white border-0">
            <i class="fa-solid fa-magnifying-glass text-muted" style="font-size: 15px"></i>
          </span>
          <input type="text" id="searchInput" placeholder="Cari buku..." class="form-control border-0" style="font-size: 15px">
        </div>
      </form>
      <a href="cart.php" class="btn d-flex align-items-center" style="color: white; ">
        <i class="fa-solid fa-cart-shopping me-5" style="font-size: 27px;"></i>
      </a>
      <a href="signin.php" class="btn d-flex align-items-center" style="color: white;">
        <i class="fas fa-sign-out-alt me-2" style="font-size: 27px;"></i>
      </a>
    </div>
  </div>
</nav>



<div class="container">
    <div class="row">
        <?php
        include_once 'connection.php';
        $result = mysqli_query($conn, "SELECT * FROM buku");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="col-md-3 mb-4">
                
                    <div class="card">
                        <!-- Gambar lebih panjang -->
                        
                        <img src="<?php echo $row['gambar']; ?>" class="card-img-top" style="height: 500px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size:3rem; font-weight:700"><?php echo $row['judul_buku']; ?></h5>
                            <p class="card-text text-danger fw-bold" style="font-size:2rem">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                            
                            <!-- Tombol dalam satu baris -->
                            <div class="d-flex justify-content-between">
                            <form method="POST" action="add_to_cart.php">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="gambar" value="<?php echo $row["gambar"]; ?>">
                                <input type="hidden" name="judul_buku" value="<?php echo $row["judul_buku"]; ?>">
                                <input type="hidden" name="harga" value="<?php echo $row["harga"]; ?>">
                                <button type="submit" class="btn btn-dark w-100">Tambah ke Keranjang</button>
                            </form>
                                <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark w-50 ">Lihat Details</a>
                            </div>

            

                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>No books found</p>";
        }
        ?>
    </div>
</div>
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

    


</body>
</html>
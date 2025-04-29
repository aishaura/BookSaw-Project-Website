<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Dashboard Admin</title>
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
        background-color: #f8f9fa;
        font-size:15px;
    }
    .navbar {
        background-color:rgb(125, 33, 211);
        padding:20px;
    }
    .navbar-brand a {
        font-size: 2rem;
    }
    img {
        border-radius: 5px;
        object-fit: cover;
    }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid black; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="main-logo">
        <a href="index.html"><img src="img/main-logo.png" alt="logo"></a>
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
        <a href="data_admin.php" class="btn d-flex align-items-center" style="color: white;">
            <i class="fa-solid fa-clock-rotate-left" style="font-size: 27px;"></i>
        </a>
        <a href="signin.php" class="btn d-flex align-items-center" style="color: white;">
            <i class="fas fa-sign-out-alt me-2" style="font-size: 27px;"></i>
        </a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="page-header clearfix">
                <h2 class="pull-left">Katalog Buku Admin</h2>
                <a href="create.php" class="btn btn-success pull-right" style="font-size:15px">Tambah Buku Baru</a>
            </div>

            <?php
            include_once 'connection.php';
            $result = mysqli_query($conn,"SELECT * FROM buku");
            if (mysqli_num_rows($result) > 0) {
            ?>
            <table class='table table-bordered table-striped'>
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
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><img src="<?php echo $row["gambar"]; ?>" style="width: 50%"></td>
                    <td><?php echo $row["judul_buku"]; ?></td>
                    <td><?php echo $row["pengarang"]; ?></td>
                    <td><?php echo $row["kategori"]; ?></td>
                    <td><?php echo $row["sinopsis"]; ?></td>
                    <td><?php echo $row["harga"]; ?></td>
                    <td><?php echo $row["stok_tersedia"]; ?></td>
                    <td><?php echo $row["id_admin"]; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row["id"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record'><span class='glyphicon glyphicon-trash'></span></a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php } else { echo "No result found"; } ?>
        </div>
    </div>     

    
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

</body>
</html>

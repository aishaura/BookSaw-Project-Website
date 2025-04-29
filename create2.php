<?php
require_once "connection.php";

if(isset($_POST['save']))
{    
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $sinopsis = $_POST['sinopsis'];
    $harga = $_POST['harga'];
    $stok_tersedia = $_POST['stok_tersedia'];
    $id_admin = $_POST['id_admin'];

    // Periksa apakah file gambar diunggah
    if (!isset($_FILES["gambar"]) || $_FILES["gambar"]["error"] != 0) {
        echo "Error: Tidak ada file yang diunggah atau terjadi kesalahan.";
        exit();
    }

    $target_dir = "uploads/"; // Pastikan folder ini ada
    $file_name = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file benar-benar gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Batasi ukuran file (maksimal 2MB)
    if ($_FILES["gambar"]["size"] > 2000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Batasi format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika tidak ada error, simpan file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Simpan ke database
            $sql = "INSERT INTO buku (id, gambar, judul_buku, pengarang, kategori, sinopsis, harga, stok_tersedia, id_admin) 
                    VALUES ('$id', '$target_file', '$judul_buku','$pengarang','$kategori','$sinopsis','$harga','$stok_tersedia','$id_admin')";
            
            if (mysqli_query($conn, $sql)) {
                header("location: admin.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Create New Books Catalog</title>
  <link rel="stylesheet" href="create2.css">
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <div class="title">Upload Buku Baru<br>
    <p style="font-size: 18px; font-weight: 300">Silakan isi formulir ini dan kirim untuk menambahkan catatan buku ke katalog.</p>
    </div>
    
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" placeholder="masukkan id buku" value="" maxlength="" required="">
                        </div>
                        
                        <div class="form-group ">
                            <label >Judul buku</label>
                            <input type="text" name="judul_buku" class="form-control" placeholder="judul buku" value="" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" placeholder="pengarang" value="" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="horor">Horror</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="romance">Romance</option>
                                <option value="comedy">Comedy</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="" placeholder="masukkan harga buku" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Stok tersedia</label>
                            <input type="text" name="stok_tersedia" class="form-control" value="" placeholder="masukkan stok tersedia" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Id Admin</label>
                            <input type="text" name="id_admin" class="form-control" value="" placeholder="masukkan id admin" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Image</label>
                            <input name="gambar" type="file" class="form-control" required>
                        </div>
                        <!-- Tombol Submit -->
                        <div class="btn-container">
                        <label>Sinopsis</label>
                            <input type="text" name="sinopsis" class="form-control" value="" placeholder="tulis sinopsis" maxlength="" required="">
                        
                            <input type="submit" class="btn btn-primary" name="save" value="Submit">
                            <a href="admin.php" class="btn btn-default">Cancel</a>
                        </div>

                        
                    </div>
                    
                </form>

  </div>
</body>
</html>
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
                header("location: index.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Books Catalog</title>
    <?php include "head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add books record to the catalog.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control" value="" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Image</label>
                            <input name="gambar" type="file" class="form-control" required>

                        </div>
                        <div class="form-group ">
                            <label >Judul buku</label>
                            <input type="text" name="judul_buku" class="form-control" value="" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" value="" maxlength="" required="">
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
                            <label>Sinopsis</label>
                            <input type="text" name="sinopsis" class="form-control" value="" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Stok tersedia</label>
                            <input type="text" name="stok_tersedia" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Id Admin</label>
                            <input type="text" name="id_admin" class="form-control" value="" maxlength="12" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

        

</body>
</html>

<?php
// Include database connection file
require_once "connection.php";

    if(count($_POST)>0) {
    mysqli_query($conn, "UPDATE  buku set judul_buku='" . $_POST['judul_buku'] . "' , 
    pengarang='" . $_POST['pengarang'] . "' , kategori='" . $_POST['kategori'] . "' , 
    sinopsis='" . $_POST['sinopsis'] . "' , harga='" . $_POST['harga'] ."' , 
    stok_tersedia='" . $_POST['stok_tersedia']. "' 
    where id='" . $_POST['id'] . "'");
     
     header("location: index.php");
     exit();
    }
    $result = mysqli_query($conn,"SELECT * FROM buku WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Update Books Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the books record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control" value="<?php echo $row["judul_buku"]; ?>" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" value="<?php echo $row["pengarang"]; ?>" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value=""><?php echo $row["kategori"]; ?></option>
                                <option value="horor">Horror</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="romance">Romance</option>
                                <option value="comedy">Comedy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sinopsis</label>
                            <input type="text" name="sinopsis" class="form-control" value="<?php echo $row["sinopsis"]; ?>" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" value="<?php echo $row["harga"]; ?>" maxlength="" required="">
                        </div>
                        <div class="form-group">
                            <label>Stok Tersedia</label>
                            <input type="text" name="stok_tersedia" class="form-control" value="<?php echo $row["stok_tersedia"]; ?>" maxlength="" required="">
                        </div>
                        
                        <input type="hidden" name="id_admin" value="<?php echo $row["id_admin"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div> 
        </div>
</body>
</html>
<?php
// Include database connection file
require_once "includes/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && count($_POST) > 0) {
    $id = $_POST['id'];
    $data = [
        'judul_buku' => $_POST['judul_buku'],
        'pengarang' => $_POST['pengarang'],
        'kategori' => $_POST['kategori'],
        'sinopsis' => $_POST['sinopsis'],
        'harga' => (int)$_POST['harga'],
        'stok_tersedia' => (int)$_POST['stok_tersedia']
    ];
    
    $res = supabase_request('buku?id=eq.' . rawurlencode($id), 'PATCH', $data);
    
    if ($res && !isset($res['error'])) {
        header("location: admin.php");
        exit();
    } else {
        echo "Error updating record in Supabase: " . json_encode($res);
        exit();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = supabase_request('buku?id=eq.' . rawurlencode($id) . '&select=*');
    if (!empty($result) && is_array($result)) {
        $row = $result[0];
    } else {
        echo "Buku tidak ditemukan!";
        exit();
    }
} else {
    echo "ID tidak disediakan!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Update Books Catalog</title>
  <link rel="stylesheet" href="assets/css/create2.css">
  <style>
    .container {
  max-width: 1200px;
  width: 100%;
  height: 580px;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}
.btn-container {
    margin-top: 20px;
}
  </style>
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <div class="title">Update Data Buku<br>
    <p style="font-size: 18px; font-weight: 300">Harap edit nilai masukan dan kirim untuk memperbarui catatan buku.</p>
    </div>
    
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
                    <div class="user-details">
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
                                <option value="<?php echo $row["kategori"]; ?>"><?php echo ucfirst($row["kategori"]); ?></option>
                                <option value="horor">Horror</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="romance">Romance</option>
                                <option value="comedy">Comedy</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sinopsis</label>
                            <input type="text" name="sinopsis" class="form-control" value="<?php echo htmlspecialchars($row["sinopsis"]); ?>" maxlength="" required="">
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
                        <!-- Tombol Submit -->
                        <div class="btn-container">
                            <input type="submit" class="btn btn-primary" name="save" value="Submit">
                            <a href="admin.php" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>
  </div>
</body>
</html>
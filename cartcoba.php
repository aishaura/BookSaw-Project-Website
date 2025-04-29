<?php
session_start();

function getTotalItems() {
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['jumlah'];
        }
    }
    return $total;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background:rgb(241, 236, 246);
            font-family: 'Poppins', sans-serif;
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

        .cart-container {
            display: flex;
            gap: 20px;
            max-width: 1200px;
            margin: 30px auto;
        }

        .cart-items, .order-summary {
            background: rgba(123, 106, 218, 0.1);
            padding: 20px;
            border-radius: 15px;
            /* box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); */
        }

        .cart-items {
            flex: 2;
        }

        .order-summary {
            flex: 1;
            background: rgba(123, 106, 218, 0.15);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(123, 106, 218);
            color: white;
        }

        .quantity-controls button {
            background: rgb(123, 106, 218);
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .quantity-value {
            margin: 0 5px;
            font-weight: bold;
            min-width: 20px;
            text-align: center;
        }

        .checkout-btn {
            background: rgb(123, 106, 218);
            color: #fff;
            padding: 12px 20px;
            border: none;
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .checkout-btn:hover {
            background: rgb(103, 86, 198);
        }

        .btn-primary {
            background: rgb(103, 86, 198);
            border: none;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: rgb(83, 66, 178);
        }

        input, textarea, select {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 8px;
        }

        .message {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }

        .message i {
            color: rgb(123, 106, 218);
            font-size: 50px;
            margin-bottom: 10px;
        }
        .footer {
    background-color: #44297b;
    text-align: center;
    padding: 30px 0;
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
         

            <!-- Logout -->
            <a href="user.php" class="icon-btn" style="font-size: 27px;">
            <i class="fa-solid fa-xmark"></i>
            </a>

        </div>
    </nav>

<div class="cart-container">
    <div class="cart-items">
        <h2>Shopping Cart (<?= getTotalItems() ?> items)</h2>
        <?php 
            $totalHarga = 0;
            if (!empty($_SESSION['cart'])):
        ?>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $id => $item):
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $totalHarga += $subtotal;
                ?>
                <tr>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <img src="<?= $item['gambar'] ?>" alt="<?= $item['judul_buku'] ?>" style="width: 60px; height: 60px; border-radius: 10px; object-fit: cover;">
                        <strong><?= $item['judul_buku'] ?></strong>
                    </td>
                    <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                    <td>
                        <div class="quantity-controls">
                            <form method="POST" action="add_to_cart.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="action" value="kurang">
                                <button>-</button>
                            </form>
                            <span class="quantity-value"><?= $item['jumlah'] ?></span>
                            <form method="POST" action="add_to_cart.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="action" value="tambah">
                                <button>+</button>
                            </form>
                        </div>
                    </td>
                    <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                    <td>
                        <form method="POST" action="remove_from_cart.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button style="background: none; border: none; color: red; cursor: pointer;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="message">
                <i class="fa fa-shopping-cart"></i>
                <p>Keranjang kosong. Silakan tambahkan produk ke keranjang Anda!</p>
            </div>
        <?php endif; ?>

        <button class="btn btn-primary mx-5" style="padding: 12px; margin-bottom: 40px;  margin-top: 150px;" onclick="window.location.href='user.php';">
            Kembali ke Daftar Buku
        </button>
    </div>

    <div class="order-summary">
        <h4>Order Summary</h4>




        
        <form method="POST" action="invoice.php">
        <div style="margin-bottom: 15px;">
                <label for="nama" style="font-weight: bold;">Nama:</label>
                <input type="text" id="nama" name="nama" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="no_telp" style="font-weight: bold;">No. Telepon:</label>
                <input type="text" id="no_telp" name="no_telp" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label for="alamat" style="font-weight: bold;">Alamat Lengkap:</label>
                <textarea id="alamat" name="alamat" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="bank" class="form-label">Pilih Bank:</label>
                <select id="bank" name="bank" class="form-select">
                    <option value="bca">Bank BCA</option>
                    <option value="bni">Bank BNI</option>
                    <option value="bri">Bank BRI</option>
                    <option value="mandiri">Bank Mandiri</option>
                    <option value="cimb">Bank CIMB Niaga</option>
                </select>
            </div>
            <p>Subtotal: Rp<?= number_format($totalHarga, 0, ',', '.') ?></p>

            <button type="submit" class="checkout-btn">Checkout Now</button>
        </form>
    </div>
    
</body>

</html>

<?php
session_start();

// Jika tombol Add to Cart ditekan
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_id = $_POST['product_id'];

    // Jika keranjang belum ada, buat array kosong
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Cek apakah produk sudah ada dalam keranjang
    $product_found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            // Jika produk sudah ada, tambah jumlahnya
            $item['quantity'] += 1;
            $product_found = true;
            break;
        }
    }

    // Jika produk belum ada, tambahkan produk baru ke dalam keranjang
    if (!$product_found) {
        $_SESSION['cart'][] = [
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        ];
    }
}

// Redirect ke halaman cart_view.php untuk melihat keranjang
header("Location: view_cart.php");
exit();
?>

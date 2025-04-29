<?php
session_start();

$totalItems = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalItems += $item['jumlah'];
    }
}

echo $totalItems;
?>

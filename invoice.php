<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

function getTotalHarga() {
    $totalHarga = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
        }
    }
    return $totalHarga;
}

function getPajak($totalHarga) {
    return $totalHarga * 0.05;
}

if (isset($_POST['bank'])) {
    $_SESSION['selected_bank'] = $_POST['bank'];
}
$_SESSION['no_telp'] = $_POST['no_telp']; // Simpan nomor telepon
$_SESSION['alamat'] = $_POST['alamat']; // Simpan alamat



$invoiceDate = date("d-m-Y");
$dueDate = date("d-m-Y", strtotime("+1 days"));
$clientName = $_SESSION['username'];
$phoneNumber = htmlspecialchars($_POST['no_telp']);
$address = htmlspecialchars($_POST['alamat']);
$nama = htmlspecialchars($_POST['nama']);
$totalHarga = getTotalHarga();
$pajak = getPajak($totalHarga);
$totalKeseluruhan = $totalHarga + $pajak;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgb(123, 106, 218), #e0d9f5);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }
        .invoice-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            position: relative;
            overflow: hidden;
        }
        .invoice-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: rgb(123, 106, 218);
        }
        .invoice-info div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .items {
            margin: 20px 0;
            border-top: 1px dashed #aaa;
            border-bottom: 1px dashed #aaa;
            padding: 10px 0;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }
        .total {
            margin-top: 10px;
            font-weight: bold;
        }
        .total div {
            display: flex;
            justify-content: space-between;
        }
        .paid-status {
            text-align: center;
            background: rgb(123, 106, 218);
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            transition: transform 0.5s, background-color 0.3s;
        }
        .paid-status:hover {
            transform: scale(1.1);
            background-color: rgb(103, 86, 198);
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: rgb(123, 106, 218);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: rgb(103, 86, 198);
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">BookSaw Payment Invoice</div>
        <div class="invoice-info">
            <div><span>Invoice Date:</span><span><?= $invoiceDate ?></span></div>
            <div><span>Delivery Date:</span><span><?= $dueDate ?></span></div>
            <div><span>Name:</span><span><?= $nama ?></span></div>
            <div><span>Phone:</span><span><?= $phoneNumber ?></span></div>
            <div><span>Address:</span><span><?= $address ?></span></div>
            <div><span>Client:</span><span><?= htmlspecialchars($clientName) ?></span></div>
        </div>

        <div class="items">
            <?php if (!empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="item">
                        <span><?= htmlspecialchars($item['judul_buku']) ?> (x<?= $item['jumlah'] ?>)</span>
                        <span>Rp<?= number_format($item['harga'] * $item['jumlah'], 0, ',', '.') ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No items in the cart.</p>
            <?php endif; ?>
        </div>

        <div class="total">
            <div><span>Taxes (5%):</span><span>Rp<?= number_format($pajak, 0, ',', '.') ?></span></div>
            <div><span>Total Amount:</span><span>Rp<?= number_format($totalKeseluruhan, 0, ',', '.') ?></span></div>
        </div>

        <?php 
            $selectedBank = isset($_SESSION['selected_bank']) ? $_SESSION['selected_bank'] : '';
            $bankNames = [
                'bca' => 'Bank BCA',
                'bni' => 'Bank BNI',
                'bri' => 'Bank BRI',
                'mandiri' => 'Bank Mandiri',
                'cimb' => 'Bank CIMB Niaga'
            ];
            $bankName = isset($bankNames[$selectedBank]) ? $bankNames[$selectedBank] : 'Unknown Bank';
        ?>

        <div class="paid-status">
            PAYMENT SUCCESS WITH <?= htmlspecialchars($bankName) ?>
        </div>

        <div class="button-container">
            <a href="user.php" class="button">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>

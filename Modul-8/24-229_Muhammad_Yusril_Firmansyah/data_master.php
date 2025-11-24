<?php
include 'auth.php';

// Hanya owner
if ($_SESSION['user']['level'] != 1) {
    echo "Tidak punya akses";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Master</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef3ff;
            padding: 30px;
        }

        .box {
            background: white;
            width: 450px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            color: #0057b7;
        }

        a.menu {
            display: block;
            padding: 12px;
            background: #0057b7;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin: 8px 0;
        }

        a.menu:hover {
            background: #004799;
        }

        .back {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #0057b7;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Menu Data Master</h2>

    <a class="menu" href="user_index.php">Data User</a>
    <a class="menu" href="barang_index.php">Data Barang</a>
    <a class="menu" href="supplier_index.php">Data Supplier</a>
    <a class="menu" href="pelanggan_index.php">Data Pelanggan</a>

    <a class="back" href="home.php">← Kembali</a>
</div>

</body>
</html>
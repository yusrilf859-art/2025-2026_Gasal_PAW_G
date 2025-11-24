<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4ff;
            margin: 0;
            padding: 30px;
        }

        .box {
            background: white;
            width: 400px;
            margin: auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.15);
            text-align: center;
        }

        h2 {
            margin-top: 0;
            color: #003c8f;
        }

        .info {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .menu a {
            display: block;
            background: #0066cc;
            color: white;
            padding: 10px;
            margin: 8px 0;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #004c99;
        }

        .logout {
            display: inline-block;
            margin-top: 15px;
            color: #cc0000;
            text-decoration: none;
            font-weight: bold;
        }

        .logout:hover {
            color: red;
        }
    </style>
</head>
<body>

<div class="box">

    <h2>Selamat Datang</h2>

    <div class="info">
        <b><?= $_SESSION['user']['name']; ?></b><br>
        Level: <?= $_SESSION['user']['level']; ?>
    </div>

    <div class="menu">
        <?php if ($_SESSION['user']['level'] == 1): ?>
            <a href="data_master.php">Data Master</a>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>
        <?php else: ?>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>
        <?php endif; ?>
    </div>

    <a class="logout" href="logout.php">Logout</a>

</div>

</body>
</html>
<?php
include "koneksi.php"; 
include "auth.php";

// Ambil data barang
$stmtBarang = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
$barang = $stmtBarang->fetchAll();

// Ambil data pelanggan
$stmtPelanggan = $pdo->query("SELECT * FROM pelanggan ORDER BY id DESC");
$pelanggan = $stmtPelanggan->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi</title>
    <style>
        body {
            font-family: Arial;
            background: #eef3ff;
            padding: 20px;
        }
        h2 {
            color: #003c8f;
        }
        .box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background: #004799;
        }
    </style>
</head>

<body>

<h2>Transaksi Penjualan</h2>

<div class="box">
<form method="POST" action="transaksi_simpan.php">

    <label>Pilih Barang</label>
    <select name="barang_id" required>
        <option value="">-- Pilih --</option>
        <?php foreach($barang as $b): ?>
            <option value="<?= $b['id'] ?>">
                <?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)
            </option>
        <?php endforeach; ?>
    </select>

    <label>Pilih Pelanggan</label>
    <select name="pelanggan_id" required>
        <option value="">-- Pilih --</option>
        <?php foreach($pelanggan as $p): ?>
            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Jumlah</label>
    <input type="number" name="jumlah" min="1" required>

    <button type="submit">Simpan Transaksi</button>
</form>
</div>

</body>
</html>
<?php
include 'auth.php';
require 'koneksi.php';

if ($_SESSION['user']['level'] != 1) {
    echo "Tidak punya akses.";
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, harga, stok) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $harga, $stok]);

    header("Location: barang_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>

<h2>Tambah Barang</h2>
<a href="barang_index.php">← Kembali</a>
<br><br>

<form method="post">
    Nama Barang:<br>
    <input type="text" name="nama_barang" required><br><br>

    Harga:<br>
    <input type="number" name="harga" required><br><br>

    Stok:<br>
    <input type="number" name="stok" required><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>

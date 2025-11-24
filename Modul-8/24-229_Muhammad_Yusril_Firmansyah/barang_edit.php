<?php
include 'auth.php';
require 'koneksi.php';

if ($_SESSION['user']['level'] != 1) {
    echo "Tidak punya akses.";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM barang WHERE id=?");
$stmt->execute([$id]);
$barang = $stmt->fetch();

if (!$barang) {
    echo "Data tidak ditemukan";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $update = $pdo->prepare("UPDATE barang SET nama_barang=?, harga=?, stok=? WHERE id=?");
    $update->execute([$nama, $harga, $stok, $id]);

    header("Location: barang_index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>

<h2>Edit Barang</h2>
<a href="barang_index.php">← Kembali</a>
<br><br>

<form method="post">
    Nama Barang:<br>
    <input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required><br><br>

    Harga:<br>
    <input type="number" name="harga" value="<?= $barang['harga'] ?>" required><br><br>

    Stok:<br>
    <input type="number" name="stok" value="<?= $barang['stok'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>

<?php
include 'auth.php';
require 'koneksi.php';

if ($_SESSION['user']['level'] != 1) {
    echo "Tidak punya akses.";
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM barang WHERE id=?");
$stmt->execute([$id]);

header("Location: barang_index.php");
exit;

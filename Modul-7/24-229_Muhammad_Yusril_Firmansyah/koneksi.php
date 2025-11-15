<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "toko";

$conn = mysqli_connect($host, $user, $pass, $db);

// Jika koneksi gagal
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

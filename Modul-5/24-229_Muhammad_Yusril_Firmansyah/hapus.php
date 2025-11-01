<?php
$conn = mysqli_connect("localhost", "root", "", "toko_db");
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id=$id");
header("location:index.php");
?>

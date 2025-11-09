<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID barang tidak ditemukan!');window.location='index.php';</script>";
    exit;
}

$id = $_GET['id'];

$cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE barang_id='$id'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Barang tidak dapat dihapus karena digunakan dalam transaksi detail!');
        window.location='index.php';
    </script>";
    exit;
}

mysqli_query($conn, "DELETE FROM barang WHERE barang_id='$id'");
echo "<script>
    alert('Barang berhasil dihapus!');
    window.location='index.php';
</script>";
?>

<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Transaksi Toko Memet</title>
</head>
<body>

<h1>Manajemen Transaksi Toko Memet</h1>

<a href="tambah_transaksi.php">+ Tambah Transaksi</a> |
<a href="tambah_transaksi_detail.php">+ Tambah Detail Transaksi</a>

<hr>

<h2>Data Barang</h2>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
<?php
$q = mysqli_query($conn, "SELECT * FROM barang ORDER BY barang_id ASC");
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_assoc($q)) {
        echo "
        <tr>
            <td>{$r['barang_id']}</td>
            <td>{$r['nama_barang']}</td>
            <td>Rp" . number_format($r['harga'], 0, ',', '.') . "</td>
            <td>{$r['stok']}</td>
            <td>
                <a href='hapus_barang.php?id={$r['barang_id']}'
                   onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Hapus</a>
            </td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='5' align='center'>Belum ada data barang.</td></tr>";
}
?>
</table>

<h2>Data Transaksi</h2>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Pelanggan</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Total</th>
</tr>
<?php
$q = mysqli_query($conn, "SELECT t.*, p.nama FROM transaksi t
                          LEFT JOIN pelanggan p ON t.pelanggan_id = p.pelanggan_id
                          ORDER BY t.transaksi_id DESC");
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_assoc($q)) {
        echo "
        <tr>
            <td>{$r['transaksi_id']}</td>
            <td>{$r['nama']}</td>
            <td>{$r['waktu_transaksi']}</td>
            <td>{$r['keterangan']}</td>
            <td>Rp" . number_format($r['total'], 0, ',', '.') . "</td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='5' align='center'>Belum ada transaksi.</td></tr>";
}
?>
</table>

<h2>Data Detail Transaksi</h2>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>ID Detail</th>
    <th>ID Transaksi</th>
    <th>Barang</th>
    <th>Qty</th>
    <th>Harga</th>
</tr>
<?php
$q = mysqli_query($conn, "SELECT d.*, b.nama_barang FROM transaksi_detail d
                          LEFT JOIN barang b ON d.barang_id = b.barang_id
                          ORDER BY d.detail_id DESC");
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_assoc($q)) {
        echo "
        <tr>
            <td>{$r['detail_id']}</td>
            <td>{$r['transaksi_id']}</td>
            <td>{$r['nama_barang']}</td>
            <td>{$r['qty']}</td>
            <td>Rp" . number_format($r['harga'], 0, ',', '.') . "</td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='5' align='center'>Belum ada detail transaksi.</td></tr>";
}
?>
</table>

</body>
</html>

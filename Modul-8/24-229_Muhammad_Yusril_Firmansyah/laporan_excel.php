<?php
include "koneksi.php";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_penjualan.xls");

// data
$q = mysqli_query($koneksi, "
    SELECT t.*, p.nama AS pelanggan
    FROM transaksi t
    LEFT JOIN pelanggan p ON p.id = t.pelanggan_id
    ORDER BY t.id DESC
");

// total
$sum = mysqli_query($koneksi, "SELECT SUM(total) AS total_all FROM transaksi");
$total_all = mysqli_fetch_assoc($sum)['total_all'];

echo "<h3>Laporan Penjualan</h3>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Pelanggan</th>
    <th>Keterangan</th>
    <th>Total</th>
</tr>";

while ($d = mysqli_fetch_assoc($q)) {
    echo "<tr>
        <td>{$d['id']}</td>
        <td>{$d['waktu_transaksi']}</td>
        <td>{$d['pelanggan']}</td>
        <td>{$d['keterangan']}</td>
        <td>{$d['total']}</td>
    </tr>";
}

echo "<tr>
        <td colspan='4'><b>Total Keseluruhan</b></td>
        <td><b>".number_format($total_all)."</b></td>
      </tr>";
echo "</table>";
?>
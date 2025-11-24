<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil transaksi & pelanggan
$trans = mysqli_query($koneksi, "
    SELECT t.*, p.nama AS pelanggan
    FROM transaksi t
    LEFT JOIN pelanggan p ON p.id = t.pelanggan_id
    WHERE t.id = '$id'
");
$t = mysqli_fetch_assoc($trans);

// ambil detail barang
$detail = mysqli_query($koneksi, "
    SELECT td.*, b.nama_barang
    FROM transaksi_detail td
    LEFT JOIN barang b ON b.id = td.barang_id
    WHERE td.transaksi_id = '$id'
");
?>

<h2>Detail Transaksi #<?= $t['id'] ?></h2>

<p>
Tgl Transaksi : <b><?= $t['waktu_transaksi'] ?></b><br>
Pelanggan     : <b><?= $t['pelanggan'] ?></b><br>
Keterangan    : <b><?= $t['keterangan'] ?></b><br>
Total         : <b>Rp <?= number_format($t['total']) ?></b>
</p>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

    <?php while($d = mysqli_fetch_assoc($detail)) { ?>
    <tr>
        <td><?= $d['nama_barang'] ?></td>
        <td>Rp <?= number_format($d['harga']) ?></td>
        <td><?= $d['qty'] ?></td>
        <td>Rp <?= number_format($d['harga'] * $d['qty']) ?></td>
    </tr>
    <?php } ?>
</table>

<br>
<a href="laporan.php">← Kembali</a>
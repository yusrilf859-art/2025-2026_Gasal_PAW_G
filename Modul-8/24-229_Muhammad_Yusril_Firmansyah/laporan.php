<?php
include "koneksi.php";

// Ambil data transaksi + pelanggan (PDO)
$stmt = $pdo->query("
    SELECT t.id, t.waktu_transaksi, t.keterangan, t.total, 
           p.nama AS pelanggan
    FROM transaksi t
    LEFT JOIN pelanggan p ON p.id = t.pelanggan_id
    ORDER BY t.id DESC
");
$transaksi = $stmt->fetchAll();
?>

<a href="laporan_grafik.php">Grafik</a> |
<a href="laporan_pdf.php" target="_blank">Print PDF</a> |
<a href="laporan_excel.php">Export Excel</a>
<br><br>

<h2>Laporan Transaksi</h2>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>Pelanggan</th>
        <th>Keterangan</th>
        <th>Total</th>
        <th>Detail</th>
    </tr>

    <?php foreach ($transaksi as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <td><?= $t['waktu_transaksi'] ?></td>
        <td><?= $t['pelanggan'] ?></td>
        <td><?= $t['keterangan'] ?></td>
        <td>Rp <?= number_format($t['total']) ?></td>
        <td><a href="laporan_detail.php?id=<?= $t['id'] ?>">Lihat Detail</a></td>
    </tr>
    <?php endforeach; ?>
</table>
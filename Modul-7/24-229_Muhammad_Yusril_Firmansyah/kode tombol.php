<?php
include "koneksi.php";

// Ambil data transaksi
$sql = "SELECT transaksi.id, transaksi.waktu_transaksi, pelanggan.nama, transaksi.keterangan, transaksi.total 
        FROM transaksi 
        LEFT JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id 
        ORDER BY transaksi.id ASC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Master Transaksi</title>
    <style>
        body {
            font-family: Arial;
            background: #f1f3f5;
        }
        .container {
            width: 95%;
            margin: auto;
            margin-top: 20px;
        }
        .header-box {
            background: #0d6efd;
            color: white;
            padding: 12px;
            border-radius: 5px 5px 0 0;
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }
        table th {
            background: #0d6efd;
            color: white;
            padding: 8px;
        }
        table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .btn-blue {
            background-color:#0d6efd; 
            color:white; 
            padding:6px 10px; 
            text-decoration:none; 
            border-radius:4px;
            margin-right:5px;
        }
        .btn-green {
            background-color:#198754; 
            color:white; 
            padding:6px 10px; 
            text-decoration:none; 
            border-radius:4px;
        }
        .btn-detail {
            background:#0d6efd; 
            color:#fff; 
            padding:5px 8px; 
            text-decoration:none; 
            border-radius:4px;
        }
        .btn-delete {
            background:#dc3545; 
            color:#fff; 
            padding:5px 8px; 
            text-decoration:none; 
            border-radius:4px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header-box">
        <h2>Data Master Transaksi</h2>
    </div>

    <div style="background:white; padding:15px; border-radius:0 0 5px 5px;">
        
        <!-- Tombol di bagian kanan -->
        <div style="text-align:right; margin-bottom:10px;">
            <a href="report_transaksi.php" class="btn-blue">Lihat Laporan Penjualan</a>
            <a href="tambah_transaksi.php" class="btn-green">Tambah Transaksi</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Waktu Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Keterangan</th>
                <th>Total</th>
                <th>Tindakan</th>
            </tr>

            <?php
            $no = 1;
            while($d = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['id'] ?></td>
                <td><?= $d['waktu_transaksi'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['keterangan'] ?></td>
                <td>Rp<?= number_format($d['total'],0,',','.') ?></td>
                <td>
                    <a href="transaksi_detail.php?id=<?= $d['id'] ?>" class="btn-detail">Lihat Detail</a>
                    <a href="hapus_transaksi.php?id=<?= $d['id'] ?>" class="btn-delete">Hapus</a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>

</body>
</html>

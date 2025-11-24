<?php
include 'auth.php';
require 'koneksi.php';

// Akses hanya level 1 (owner)
if ($_SESSION['user']['level'] != 1) {
    echo "Anda tidak memiliki akses ke halaman ini!";
    exit;
}

// Ambil data barang
$stmt = $pdo->query("SELECT * FROM barang ORDER BY id ASC");
$barang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .btn-back {
            display: inline-block;
            padding: 8px 14px;
            background: #0275d8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-back:hover { background: #025aa5; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th {
            background: #0275d8;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e5e5;
        }
        tr:hover { background: #f1f7ff; }
        .btn {
            padding: 6px 10px;
            font-size: 13px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
        }
        .edit { background: #5cb85c; }
        .edit:hover { background: #449d44; }
        .delete { background: #d9534f; }
        .delete:hover { background: #c9302c; }
    </style>

</head>
<body>

<h2>Data Barang</h2>
<a href="data_master.php" class="btn-back">← Kembali ke Data Master</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($barang as $b): ?>
    <tr>
        <td><?= $b['id'] ?></td>
        <td><?= $b['nama_barang'] ?></td>
        <td>Rp <?= number_format($b['harga']) ?></td>
        <td><?= $b['stok'] ?></td>
        <td>
            <a class="btn edit" href="barang_edit.php?id=<?= $b['id'] ?>">Edit</a>
            <a class="btn delete" href="barang_delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus barang ini?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

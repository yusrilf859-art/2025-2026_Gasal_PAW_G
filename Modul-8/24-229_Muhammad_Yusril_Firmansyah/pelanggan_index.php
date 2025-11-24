<?php
include "koneksi.php";
include "auth.php";

// Ambil data pelanggan
$stmt = $pdo->query("SELECT * FROM pelanggan ORDER BY id DESC");
$pelanggan = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pelanggan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #eef3ff;
        }

        h2 {
            color: #003c8f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th {
            background: #004a99;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        tr:hover {
            background: #f2f8ff;
        }

        .btn {
            padding: 6px 12px;
            background: #0066cc;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background: #004c99;
        }

        .btn-danger {
            background: #cc0000;
        }

        .btn-danger:hover {
            background: #990000;
        }
    </style>
</head>

<body>

<h2>Data Pelanggan</h2>

<a href="pelanggan_tambah.php" class="btn">+ Tambah Pelanggan</a>
<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($pelanggan as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['alamat'] ?></td>
        <td><?= $p['telp'] ?></td>
        <td>
            <a class="btn" href="pelanggan_edit.php?id=<?= $p['id'] ?>">Edit</a>
            <a class="btn btn-danger" href="pelanggan_hapus.php?id=<?= $p['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
<?php
include "koneksi.php";
include 'auth.php';
require 'koneksi.php';

// Hanya Owner (level 1)
if ($_SESSION['user']['level'] != 1) {
    echo "Anda tidak memiliki akses ke halaman ini!";
    exit;
}

// Ambil data user dari tabel users
$stmt = $pdo->query("SELECT * FROM user ORDER BY id_user ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data User</title>

    <style>
        body { font-family: Arial; background: #f0f4f8; padding:20px; }
        h2 { color:#333; }
        .btn-back { padding:8px 12px; background:#0275d8; color:white; text-decoration:none; border-radius:5px; }
        table { width:100%; border-collapse:collapse; background:white; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);}
        th { background:#0275d8; color:white; padding:12px; }
        td { padding:10px; border-bottom:1px solid #eee; }
        tr:hover { background:#eef5ff; }
    </style>
</head>
<body>

<h2>Data User</h2>
<a href="home.php" class="btn-back">← Kembali</a>
<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Level</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id_user'] ?></td>
        <td><?= $user['username'] ?></td>
        <td><?= $user['password'] ?></td>
        <td><?= $user['nama'] ?></td>
        <td><?= $user['alamat'] ?></td>
        <td><?= $user['hp'] ?></td>
        <td><?= $user['level'] ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

<?php
include "koneksi.php";
include 'auth.php';
require 'koneksi.php';

if ($_SESSION['user']['level'] != 1) {
    echo "Tidak punya akses";
    exit;
}

$stmt = $pdo->query("SELECT * FROM supplier ORDER BY id ASC");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>

    <style>
        body { font-family: Arial; background: #f0f4f8; padding:20px; }
        h2 { color:#333; }
        a.btn { padding:8px 12px; background:#0275d8; color:white; border-radius:5px; text-decoration:none; }
        table { width:100%; border-collapse:collapse; background:white; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
        th { background:#0275d8; color:white; padding:12px; }
        td { padding:10px; border-bottom:1px solid #eee; }
        tr:hover { background:#f5faff; }
    </style>
</head>
<body>

<h2>Data Supplier</h2>
<a href="data_master.php" class="btn">← Kembali</a>
<br><br>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Telepon</th>
    <th>Alamat</th>
</tr>

<?php foreach ($data as $s): ?>
<tr>
    <td><?= $s['id'] ?></td>
    <td><?= $s['nama'] ?></td>
    <td><?= $s['telp'] ?></td>
    <td><?= $s['alamat'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>

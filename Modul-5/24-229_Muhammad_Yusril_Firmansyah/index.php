<?php
$conn = mysqli_connect("localhost", "root", "", "toko_db");
$supplier = mysqli_query($conn, "SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>
<h2>DATA SUPPLIER</h2>
<a href="tambah.php">Tambah Data</a><br><br>

<table border="1" cellpadding="8">
<tr>
    <th>No</th><th>Nama</th><th>Telp</th><th>Alamat</th><th>Aksi</th>
</tr>
<?php $no=1; while($d=mysqli_fetch_assoc($supplier)) : ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['telp']; ?></td>
    <td><?= $d['alamat']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>

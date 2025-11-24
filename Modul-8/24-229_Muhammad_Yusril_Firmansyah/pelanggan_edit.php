<?php
include "koneksi.php";
include "auth.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data pelanggan
$stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if (!$data) {
    die("Data pelanggan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #eef3ff;
        }

        .form-box {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: auto;
        }

        h2 {
            color: #003c8f;
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #aaa;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #0066cc;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background: #004c99;
        }

        .back {
            text-decoration: none;
            color: #0066cc;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="form-box">
    <h2>Edit Pelanggan</h2>

    <form method="POST" action="pelanggan_update.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

        <label>No HP</label>
        <input type="text" name="telp" value="<?= $data['telp'] ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a class="back" href="pelanggan_index.php">&larr; Kembali</a>
</div>

</body>
</html>
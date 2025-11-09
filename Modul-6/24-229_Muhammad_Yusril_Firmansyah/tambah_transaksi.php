<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pelanggan_id = $_POST['pelanggan_id'];
    $waktu_transaksi = $_POST['waktu_transaksi'];
    $keterangan = trim($_POST['keterangan']);

    if (strtotime($waktu_transaksi) < strtotime(date('Y-m-d'))) {
        echo "<script>alert('Tanggal transaksi tidak boleh sebelum hari ini!');history.back();</script>";
        exit;
    }

    if (strlen($keterangan) < 3) {
        echo "<script>alert('Keterangan minimal 3 karakter!');history.back();</script>";
        exit;
    }

    mysqli_query($conn, "INSERT INTO transaksi (pelanggan_id, waktu_transaksi, keterangan, total)
                         VALUES ('$pelanggan_id', '$waktu_transaksi', '$keterangan', 0)");
    $transaksi_id = mysqli_insert_id($conn);

    echo "<script>alert('Transaksi berhasil ditambahkan!');window.location='tambah_transaksi_detail.php?transaksi_id=$transaksi_id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Data Transaksi</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f7fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .card {
        background: white;
        width: 350px;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
    }
    input, textarea, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        width: 100%;
        margin-top: 15px;
        padding: 10px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }
    button:hover {
        background: #0056b3;
    }
    .link {
        text-align: center;
        margin-top: 10px;
    }
    .link a {
        color: #007bff;
        text-decoration: none;
    }
</style>
</head>
<body>

<div class="card">
    <h2>Tambah Data Transaksi</h2>
    <form method="post">
        <label>Waktu Transaksi</label>
        <input type="date" name="waktu_transaksi" required>

        <label>Keterangan</label>
        <textarea name="keterangan" minlength="3" required placeholder="Masukkan keterangan transaksi"></textarea>

        <label>Total</label>
        <input type="text" value="0" readonly>

        <label>Pelanggan</label>
        <select name="pelanggan_id" required>
            <option value="">Pilih Pelanggan</option>
            <?php
            $pel = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama ASC");
            while ($p = mysqli_fetch_assoc($pel)) {
                echo "<option value='{$p['pelanggan_id']}'>{$p['nama']}</option>";
            }
            ?>
        </select>

        <div class="link">
            Belum ada pelanggan? <a href="#">Tambah di sini</a>
        </div>

        <button type="submit">Tambah Transaksi</button>
    </form>
    <div class="link">
        ← <a href="index.php">Kembali ke Index</a>
    </div>
</div>

</body>
</html>

<?php
include 'koneksi.php';

$transaksi_id = $_GET['transaksi_id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaksi_id = $_POST['transaksi_id'];
    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];

    $cek = mysqli_query($conn, "SELECT * FROM transaksi_detail WHERE transaksi_id='$transaksi_id' AND barang_id='$barang_id'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Barang ini sudah ditambahkan pada transaksi ini!');history.back();</script>";
        exit;
    }

    $barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM barang WHERE barang_id='$barang_id'"));
    $harga_total = $barang['harga'] * $qty;

    mysqli_query($conn, "INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga)
                         VALUES ('$transaksi_id', '$barang_id', '$qty', '$harga_total')");

    mysqli_query($conn, "UPDATE transaksi
                         SET total = (SELECT COALESCE(SUM(harga), 0)
                                      FROM transaksi_detail
                                      WHERE transaksi_id = '$transaksi_id')
                         WHERE transaksi_id = '$transaksi_id'");

    echo "<script>alert('Detail transaksi berhasil ditambahkan!');window.location='tambah_transaksi_detail.php?transaksi_id=$transaksi_id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Detail Transaksi</title>
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
    input, select {
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
    <h2>Tambah Detail Transaksi</h2>
    <form method="post">
        <label>Pilih Barang</label>
        <select name="barang_id" required>
            <option value="">Pilih Barang</option>
            <?php
            $barang = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
            while ($b = mysqli_fetch_assoc($barang)) {
                echo "<option value='{$b['barang_id']}'>{$b['nama_barang']}</option>";
            }
            ?>
        </select>

        <label>ID Transaksi</label>
        <select name="transaksi_id" required>
            <option value="">Pilih ID Transaksi</option>
            <?php
            $trs = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY transaksi_id DESC");
            while ($t = mysqli_fetch_assoc($trs)) {
                $sel = ($t['transaksi_id'] == $transaksi_id) ? 'selected' : '';
                echo "<option value='{$t['transaksi_id']}' $sel>{$t['transaksi_id']}</option>";
            }
            ?>
        </select>

        <label>Quantity</label>
        <input type="number" name="qty" min="1" placeholder="Masukkan jumlah barang" required>

        <button type="submit">Tambah Detail Transaksi</button>
    </form>
    <div class="link">
        ← <a href="index.php">Kembali ke Index</a>
    </div>
</div>

</body>
</html>

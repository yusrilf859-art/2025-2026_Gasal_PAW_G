<?php
$conn = mysqli_connect("localhost", "root", "", "toko_db");
$error = "";

$nama = $telp = $alamat = "";

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if(empty($nama) || !preg_match("/^[a-zA-Z ]+$/", $nama))
        $error .= "Nama tidak boleh kosong & hanya huruf.<br>";
    if(empty($telp) || !preg_match("/^[0-9]+$/", $telp))
        $error .= "Telp tidak boleh kosong & hanya angka.<br>";
    if(empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).+$/", $alamat))
        $error .= "Alamat harus alfanumerik (ada huruf & angka).<br>";

    if($error == ""){
        mysqli_query($conn, "INSERT INTO supplier VALUES('', '$nama', '$telp', '$alamat')");
        header("location:index.php");
    }
}
?>

<h2>Tambah Data Supplier</h2>
<?= $error; ?>
<form method="POST">
    Nama : <input type="text" name="nama" value="<?= $nama ?>"><br><br>
    Telp : <input type="text" name="telp" value="<?= $telp ?>"><br><br>
    Alamat : <input type="text" name="alamat" value="<?= $alamat ?>"><br><br>
    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php">Batal</a>
</form>

<?php
$conn = mysqli_connect("localhost", "root", "", "toko_db");
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$d = mysqli_fetch_assoc($data);
$error = "";

$nama = $d['nama'];
$telp = $d['telp'];
$alamat = $d['alamat'];

if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if(empty($nama) || !preg_match("/^[a-zA-Z ]+$/", $nama))
        $error .= "Nama hanya boleh huruf.<br>";
    if(empty($telp) || !preg_match("/^[0-9]+$/", $telp))
        $error .= "Telp hanya angka.<br>";
    if(empty($alamat) || !preg_match("/^(?=.*[A-Za-z])(?=.*[0-9]).+$/", $alamat))
        $error .= "Alamat harus alfanumerik.<br>";

    if($error==""){
        mysqli_query($conn, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
        header("location:index.php");
    }
}
?>

<h2>Edit Data Supplier</h2>
<?= $error; ?>
<form method="POST">
    Nama : <input type="text" name="nama" value="<?= $nama ?>"><br><br>
    Telp : <input type="text" name="telp" value="<?= $telp ?>"><br><br>
    Alamat : <input type="text" name="alamat" value="<?= $alamat ?>"><br><br>
    <button type="submit" name="update">Update</button>
    <a href="index.php">Batal</a>
</form>

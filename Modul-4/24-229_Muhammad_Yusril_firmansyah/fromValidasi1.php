<?php
require 'validate.inc'; // berisi fungsi validasi
$errors = [];

// 1️⃣ Cek apakah tombol submit sudah ditekan (ada data dikirim)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2️⃣ Validasi form (misalnya hanya username dulu)
    if (validateName($_POST, 'username', $errors)) {

        // 3️⃣ Tidak ada error
        echo "<h3 style='color:green;'>Form submitted successfully with no errors</h3>";

    } else {

        // 4️⃣ Ada error → tampilkan pesan error dan form lagi
        echo "<h3 style='color:red;'>Terjadi kesalahan:</h3>";
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
        include 'form.inc'; // tampilkan form kembali
    }

} else {

    // 5️⃣ Form belum disubmit → tampilkan form kosong pertama kali
    include 'form.inc';
}
?>

<?php
require 'validate.inc';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Jalankan semua validasi
    $validName = validateName($_POST, 'username', $errors);
    $validEmail = validateEmail($_POST, 'email', $errors);
    $validSemester = validateSemester($_POST, 'semester', $errors);

    // (Contoh tambahan untuk validasi tanggal)
    // $validDate = validateDateInput($_POST['day'], $_POST['month'], $_POST['year'], $errors);

    if ($validName && $validEmail && $validSemester) {
        echo "<h3 style='color:green;'>Form submitted successfully with no errors</h3>";
    } else {
        echo "<h3 style='color:red;'>Terjadi kesalahan:</h3>";
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>

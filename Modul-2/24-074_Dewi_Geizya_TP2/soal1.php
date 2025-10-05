<?php 
$matkul = ["PTI", "ALPRO", "DPW", "STRUKDAT", "JARKOM", "PAW", "PSBF", "RPL"];
$praktikum = ["JARKOM", "PAW"];
$sudah = ["PTI", "ALPRO", "DPW", "STRUKDAT"];

for ($i = 0; $i < count($matkul); $i++) {
    if (in_array($matkul[$i], $sudah)) {
        echo "Saya sudah mengambil matkul $matkul[$i] semester lalu <br>";
    } elseif (in_array($matkul[$i], $praktikum)) {
        echo "Saya sedang mengambil matkul $matkul[$i] termasuk praktikum nya <br>";
    } else {
        echo "Saya belum mengambil matkul $matkul[$i] <br>";
    }
}

?>

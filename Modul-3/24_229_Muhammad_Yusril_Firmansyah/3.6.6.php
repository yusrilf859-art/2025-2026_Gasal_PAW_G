<?php
$angka = array(5, 3, 8, 1, 9);

sort($angka);     
echo "sort(): ";
print_r($angka);

rsort($angka);
echo "<br>rsort(): ";
print_r($angka);

$nama = array("Ali" => 30, "Budi" => 25, "Cici" => 28);
asort($nama);
echo "<br>asort(): ";
print_r($nama);

ksort($nama);
echo "<br>ksort(): ";
print_r($nama);
?>
<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "David" => "172",
    "Ethan" => "168",
    "Frank" => "180",
    "George" => "169",
    "Harry" => "175"
);
unset($height["Charlie"]);
$lastKey = array_key_last($height);
echo "Setelah hapus Charlie:<br>";
echo "Indeks terakhir sekarang: $lastKey <br>";
echo "Nilai pada indeks terakhir: " . $height[$lastKey] . " cm";
?>
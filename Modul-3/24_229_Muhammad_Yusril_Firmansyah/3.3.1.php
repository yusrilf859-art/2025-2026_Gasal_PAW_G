<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);
$height["David"] = "172";
$height["Ethan"] = "168";
$height["Frank"] = "180";
$height["George"] = "169";
$height["Harry"] = "175";
$lastKey = array_key_last($height);
echo "Indeks terakhir: $lastKey <br>";
echo "Nilai pada indeks terakhir: " . $height[$lastKey] . " cm";
?>
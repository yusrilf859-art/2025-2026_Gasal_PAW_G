<?php
$angka = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$genap = array_filter($angka, function($nilai) {
    return $nilai % 2 == 0;
});
print_r($genap);
?>
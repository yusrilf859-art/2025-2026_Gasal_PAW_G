<?php
$fruits = array("Avocado", "Blueberry", "Cherry", "Durian", "Mango", "Orange", "Apple", "Grapes");
unset($fruits[2]);
$fruits = array_values($fruits);
$last_index = count($fruits) - 1;
echo "Setelah menghapus satu data, indeks tertinggi ($last_index) adalah: " . $fruits[$last_index];
?>
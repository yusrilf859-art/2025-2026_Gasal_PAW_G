<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "Durian", "Mango", "Orange", "Apple", "Grapes");
$arrayLength = count($fruits);
for($x = 0; $x < $arrayLength; $x++) {
    echo $fruits[$x] . "<br>";
}
?>
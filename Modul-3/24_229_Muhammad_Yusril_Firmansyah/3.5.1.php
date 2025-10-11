<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);
array_push($students,
    array("David", "220404", "0812345111"),
    array("Ethan", "220405", "0812345222"),
    array("Frank", "220406", "0812345333"),
    array("George", "220407", "0812345444"),
    array("Harry", "220408", "0812345555")
);
$rowCount = count($students);
for ($row = 0; $row < $rowCount; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
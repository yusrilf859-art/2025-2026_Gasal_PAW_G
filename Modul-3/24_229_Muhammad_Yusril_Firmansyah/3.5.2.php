<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
    array("David", "220404", "0812345111"),
    array("Ethan", "220405", "0812345222"),
    array("Frank", "220406", "0812345333"),
    array("George", "220407", "0812345444"),
    array("Harry", "220408", "0812345555")
);

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
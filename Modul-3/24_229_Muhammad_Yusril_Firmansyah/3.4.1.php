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
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}
?>
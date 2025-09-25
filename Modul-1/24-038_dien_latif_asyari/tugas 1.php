               
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo "Hello world<br>"//ini embedded
    ?>
    
</body>
</html>
<?php
echo "Hello world<br>";//ini non- embeded script


$color="silver";
$COLOR="white";
echo "My car is $color<br>";
echo "My house is $COLOR<br>";


$greeting = "Hello world";
echo $greeting . "<br>";


$txt = "W3schools.com";
echo $txt . "<br>";


$x=5;
$y=7;
$hasil=$x+$y;
echo $hasil."<br>";


function hitung($kata){
    return strlen($kata);
}
echo hitung("diagnosa") , "<br>";


function hitung_kata($kataa){
    return str_word_count($kataa);
}
echo hitung_kata("bumi bulat") . "<br>";


function kebalik($kata){
    return strrev($kata);
}
echo kebalik ("Hello world!") . "<br>";


function posisi($kata,$cari){
    return strpos($kata,$cari);
}
echo posisi("hello world","world") . "<br>";


function pengganti($kata,$awal,$ganti){
    return str_replace($awal,$ganti,$kata);
}
echo pengganti ("Hello world", "world", "dolly") . "<br>";


function familyName($name){
    return $name . "<br>";
}
echo familyName("jani");
echo familyName("hege");
echo familyName("stale");
echo familyName("kai jim");
echo familyName("borge");


function Family_Name($fname,$year){
    return $fname ."born in " .  $year . "<br>";
}
echo Family_Name("hage",1975);
echo Family_Name("stale",1978);
echo Family_Name("kai jim",1983);


function setheight($minheight=50){
    return "the height is : " . $minheight;
}
echo setheight()."<br>";


function sum ($x,$y){
    $z= $x+$y ;
    return $x ."+". $y."=".$z;
}
echo sum (3,5);
?>

<?php
$array = [rand(0, 10), rand(0, 10), rand(0, 10)];
$each = 0;
$sum = 0;

foreach($array as $each){
    echo $each."<br>";
    $sum += $each;
}

$avg = $sum / count($array);
echo "A média é: ".$avg."<br>";

if($avg >= 6)
    echo "Aprovado";
else
    echo "Reprovado"

?>
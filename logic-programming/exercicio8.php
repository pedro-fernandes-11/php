<?php
$number = rand(0, 10);

function is_prime($number){
    if($number == 0){
        return "neither prime nor composite";
    }
    if($number == 1){
        return "not prime";
    }
    if($number == 2){
        return "prime";
    }
    $half = $number/2;
    for($i = 2; $i <= $half;$i++){
        if($number % $i == 0){
            return "not prime";
        }
    }
    return "prime";
}

echo $number." is <strong>".is_prime($number)."</strong>";
?>
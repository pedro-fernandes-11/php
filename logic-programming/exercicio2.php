<?php
    $var = rand(0, 10);
    echo "Tabuada do ". $var;
    echo "<br>";
    for ($i = 1; $i <= 10; $i++) {
        $each = $i * $var;
        echo $i ."*".$var."=".$each."<br>";
    }
?>
<?php
$st_array = [rand(1, 5), rand(1, 5), rand(1, 5)];
$nd_array = [rand(1, 5), rand(1, 5), rand(1, 5)];
$new_array = array();

echo "First array: <br>";
foreach($st_array as $st_each)
    echo $st_each."<br>";

echo "Second array: <br>";
foreach($nd_array as $st_each)
    echo $st_each."<br>";

foreach($st_array as $st_each)
    foreach($nd_array as $nd_each)
        if($st_each == $nd_each)
            if(in_array($st_each, $new_array) == false)
                array_push($new_array, $st_each);

echo "New array: <br>";
foreach($new_array as $each)
    echo $each."<br>";
?>
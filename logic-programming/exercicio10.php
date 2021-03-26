<?php
$sentence = "abcdefghijklmnopqrstuvwxyz][´~/./.=-";
$my_array = [];

foreach(str_split($sentence) as $each){
    $my_array[$each] = substr_count($sentence, $each);
}

foreach($my_array as $key => $value){
    echo $key." = ".$value."<br>";
}
?>
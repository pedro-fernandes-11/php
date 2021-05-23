<?php
$nums = [1, 2,2,3, 1];
$ori = $nums;
arsort($nums);
$array = ['Primeiro', 'Segundo', 'Terceiro', 'Quarto', 'Quinto'];
$i = 0;
foreach($nums as $key => $value){
    $new[$array[$i]] = $key;
    $i++;
}
print_r($nums);
?>
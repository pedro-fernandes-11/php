<?php

$str_original = "level";
$new_string = "";

function revertStr($original, &$inverted){
    $f = 0;
    for($i = (strlen($original) - 1); $i >= 0;$i--){
        $inverted[$f] = $original[$i];
        $f++;
    }
}

function is_palindrome($st_str, $nd_str){
    if(strlen($st_str) != strlen($nd_str)){
        return false;
    }else{
        if(strcmp($st_str, $nd_str) == 0){
            return true;
        }else{
            return false;
        }
    }
    
}

revertStr($str_original, $new_string);
echo "Original: ".$str_original."<br>";
echo "Inverted: ".$new_string."<br>";

if(is_palindrome($str_original, $new_string)){
    echo "Palindrome";
}else{
    echo "Not palindrome";
}


?>
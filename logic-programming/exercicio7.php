<?php
$st_string = "54124";
$nd_string = "testes31231testeste";

function switchCharacters(...$args){
    $new_string = $args[0].$args[1];

    for($j = $i = 0; $j <= strlen($new_string);$j++){
        foreach($args as $k)
            if($j < strlen($k)){
                $new_string[$i++] = $k[$j];
            } 
    }
    $new_string = str_replace(' ', '', $new_string);
    return $new_string;
}

echo switchCharacters($st_string, $nd_string);
?>
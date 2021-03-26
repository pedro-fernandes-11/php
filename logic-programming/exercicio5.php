<?php
$string = "Lorem ipsum dolor sit Amet, consectetur adipiscing elit. Nunc suscipit.";
$vowels = "aeiouAEIOU";

echo $string."<br>";
echo str_replace(str_split($vowels), '?', $string);
?>
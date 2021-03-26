<?php
$st_string = "dsasadadsa";
$nd_string = "sAA";

echo $st_string." - ".$nd_string." =<br>";
echo str_replace(str_split($nd_string), '', $st_string);
?>
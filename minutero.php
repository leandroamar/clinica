<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

$hr = date("H");
$min = date("i");

for($i=0; $i < 60;$i++){
    echo "La hora es " . (( $hr >= 0 && $hr <= 9) ? "0$hr" : $hr) . ":" . (( $min >= 0 && $min <= 9) ? "0$min" : $min) . "<br>";
    $min++;
    if($min == 60){
        $hr++;
        $min = 0;
    }
    if($hr == 24){
        $hr = 0;
    }
    echo "La hora es " . (( $hr >= 0 && $hr <= 9) ? "0$hr" : $hr) . ":" . (( $min >= 0 && $min <= 9) ? "0$min" : $min) . "<br>";

}


?>
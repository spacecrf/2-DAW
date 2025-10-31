<?php
// Crea la función Max(array) que nos devolverá el valor máximo de un array. Realiza una página que pruebe dicha función.
$array = [3, 5, 7, 2, 8, -1, 4];
echo "El valor máximo del array es: " . mas($array);

function mas($array): int{
    $mas = $array[0];
    for($i = 1; $i < count($array); $i++){
        if($array[$i] > $mas){
            $mas = $array[$i];
        }
    }
    return $mas;
}
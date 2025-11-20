<?php

// Comprueba si los arrays se pasan por valor o referencia como parámetros de una función. Modifica los datos de una array pasado como parámetro a una función y comprueba si se han modificado al salir de esta.

$coche5{
    "23133",
    "blanco",
    "glc",
    "mercedes"
}

echo $coche5[0] . "<br>";

$coche2 = $coche5;
$coche2[0] = "23456";
echo $coche2[0] . "<br>";

function modificarparametros($coche5){
    $coche5[] = año"2023";
    $coche5["año"] = "valor modificado";
    echo $coche5["año"] . "<br>";
}
?>

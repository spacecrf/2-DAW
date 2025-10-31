<?php

// Realiza la función FechaActual() que devuelva la fecha en un array con el formato [‘dia’=>dia, ‘mes’=>mes, ‘año’=>año]. Obtén la fecha actual llamando a la función muestra la fecha en el formato dd/mm/aa.

function fechaActual(){
    $fecha = [
        "dia" => date("d"),
        "mes" => date("m"),
        "año" => date("Y")
    ];
    return $fecha;
}

$fecha = fechaActual();

echo $fecha['dia'] . "/" . $fecha['mes'] . "/" . $fecha['año'] . "<br>";

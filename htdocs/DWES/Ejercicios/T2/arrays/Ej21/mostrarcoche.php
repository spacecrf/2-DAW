<?php

// Se desea almacenar información sobre coches, para cada coche se almacenaran las siguientes características (atributos): • matrícula • color • modelo • marca Realiza un array que almacene información de 5 o más coches. Crea la función MuestraCoche($coche), donde $coche será un array que contiene los atributos indicados anteriormente que c Rea liza la función MuestraCoches($lista) que mostrará por pantalla información de los coches almacenados . Añade dos coches adicionales al array, después de mostrar, y vuelve a mostrar toda la lista.

$coche1{
    "matricula" => "23133",
    "color" => "blanco",
    "modelo" => "glc",
    "marca" => "mercedes"
}
$coche2{
    "matricula" => "23133",
    "color" => "blanco",
    "modelo" => "glc",
    "marca" => "mercedes"
}
$coche3{
    "matricula" => "23133",
    "color" => "blanco",
    "modelo" => "glc",
    "marca" => "mercedes"
}
$coche4{
    "matricula" => "23133",
    "color" => "blanco",
    "modelo" => "glc",
    "marca" => "mercedes"
}
$coche5{
    "matricula" => "23133",
    "color" => "blanco",
    "modelo" => "glc",
    "marca" => "mercedes"
}

$lista{
    $coche1,
    $coche2,
    $coche3,
    $coche4,
    $coche5
}

function MuestraCoches(array $coche){
    echo "Matricula" . $coche["matricula"] . "<br>";
    echo "Color" . $coche["color"] . "<br>";
    echo "Modelo" . $coche["modelo"] . "<br>";
    echo "Marca" . $coche["marca"] . "<br>";
}

function MuestraCoches($lista){
    foreach ($lista as $coche) {
        MuestraCoches($coche)
    }
}

MuestraCoches($coche1);
MuestraCoches($lista);
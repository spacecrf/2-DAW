<?php
//Crea la función NombreMes(num_mes) que devolverá una cadena que será el nombre de mes que corresponde al parámetro. Modifica el ejercicio anterior para que en cada línea aparezca el nombre de més y el año y a continuación solo aparezca el número de día.

$num_mes = 5; // Ejemplo de mes
echo "El mes $num_mes es " . NombreMes($num_mes) . ".";

function NombreMes($num_mes): string {
    switch ($num_mes) {
        case 1:
            return "Enero";
        case 2:
            return "Febrero";
        case 3:
            return "Marzo";
        case 4:
            return "Abril";
        case 5:
            return "Mayo";
        case 6:
            return "Junio";
        case 7:
            return "Julio";
        case 8:
            return "Agosto";
        case 9:
            return "Septiembre";
        case 10:
            return "Octubre";
        case 11:
            return "Noviembre";
        case 12:
            return "Diciembre";
        default:
            return "Mes inválido";
    }
}
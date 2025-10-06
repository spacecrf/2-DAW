<?php
// Utilizando arrays crea la función DiasMes(num_mes) que devolverá un entero que será el número de días que tiene un mes. Utilizando dicha función realiza un programa que imprima el número de días que tienes los distintos meses. El nombre del mes se almacenará en una array igualmente.

$num_mes = 2; //ejemplo de mes


echo "El mes de " . NombreMes($num_mes) . " tiene " . DiasMes($num_mes) . " días.";

function DiasMes($num_mes):int {
    $dias_por_mes = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    
    return $dias_por_mes[$num_mes - 1];
}

function NombreMes($num_mes): string {
    $nombres_meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    
    return $nombres_meses[$num_mes - 1];
}
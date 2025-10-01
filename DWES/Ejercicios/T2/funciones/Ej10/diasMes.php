<?php

function DiasMes($num_mes, $anio): int {
    switch ($num_mes) {
        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
            return 31;
        case 4: case 6: case 9: case 11:
            return 30;
        case 2:
            if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
                return 29;
            } else {
                return 28;
            }
        default:
            return 0;
    }
}

$mes = $_POST['mes'];
$anio = $_POST['anio'];
echo "El mes $mes del año $anio tiene " . DiasMes($mes, $anio) . " días.";
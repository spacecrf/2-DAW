<?php
print("<hr><h3>Ejercicio 8</h3><br><p>La función time() devuelve la fecha en número de segundos desde el 1 de enero de 1970. Realiza una página web que muestre en vuestro equipo todos los números múltiplos de 5 que le de tiempo a mostrar en 5 segundos. Mostraréis solamente 10 números por línea y Después de 10 líneas incluireis un separador (raya, salto de línea, caracteres ...)</p>");
$tiempo_inicial = time();
$tiempo_final = $tiempo_inicial + 5;

$i = 0;
while (time() < $tiempo_final) {
    if ($i % 5 == 0) {
        print("$i ");
        if ($i % 50 == 0 && $i != 0) {
            print("<br>---------------------<br>");
        } elseif ($i % 10 == 0 && $i != 0) {
            print("<br>");
        }
    }
    $i++;
}
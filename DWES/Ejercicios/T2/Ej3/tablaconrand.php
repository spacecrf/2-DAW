<?php
print("<hr><h3>Ejercicio 3</h3><br><p>Tabla de multiplicar con numeros aleatorios con rand()</p>");
$numero = rand(1,10);
for($i = 0; $i <= 10; $i++){
    $resultado = $numero * $i;
    print("$numero x $i = $resultado <br>");
}
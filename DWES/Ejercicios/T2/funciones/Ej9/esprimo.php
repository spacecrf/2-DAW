<?php
print("<hr><h3>Ejercicio 9</h3><br><p>Crea la función EsPrimo(numero) que devuelva un booleano que indique si el número pasado como parámetro es primo. Utilizando dicha función mostrar en una página los números primos menores de 100 que existen.</p>");

function EsPrimo($n): bool {
    if ($n < 2) return false;

    for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}


for ($i = 0; $i < 100; $i++) {
    if (EsPrimo($i)) {
        echo $i . " ";
    }
}




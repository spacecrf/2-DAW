<?php
print("<hr><h3>Ejercicio 7</h3><br><p>Bucle do...while</p>");
do{
    $i=rand(0, 1000);
    print("El número aleatorio es: $i<br>");
}while($i == 15);
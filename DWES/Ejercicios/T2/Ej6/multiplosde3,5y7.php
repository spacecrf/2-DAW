<?php
print("<hr><h3>Ejercicio 5</h3><br><p> todos los números entre 1 y 1000 que son múltiplos de 3, 5 y 7.</p>");
for($i = 1; $i <=1000; $i++){
    if($i % 3 == 0 && $i % 5 == 0 && $i % 7 == 0){
        print("$i es multiplo de 3, 5 y 7<br>");
    }
} 
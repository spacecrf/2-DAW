<?php
print("<hr><h3>Ejercicio 5</h3><br><p> todos los números entre 1 y 1000 que son múltiplos de 3, 4.</p>");
for($i = 1; $i <= 1000; $i++){
    if($i % 3 == 0 && $i % 4 == 0){
        print("$i es multiplo de 3 y 4<br>");
    }
}
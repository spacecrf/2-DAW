<?php
print("<hr><h3>Tabla de multiplicar del numero x a numero y</h3><p>Con bucle anidado</p>");
for($i = 0; $i <= 10; $i++){
    print("<h4>Tabla del $i</h4>");
    for($j = 0; $j <= 10; $j++){
        $resultado = $i * $j;
        print("$i x $j = $resultado <br>");
    }
    print("<br>");
}
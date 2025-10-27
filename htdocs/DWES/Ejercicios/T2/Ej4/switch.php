<?php
print("<hr><h3>Ejercicio 4</h3><br><p>construcción switch realiza un programa que genere un número aleatorio entre 1 y 10 y muestre en la página el número en letra</p>");
$numero = rand(1,10);
switch($numero){
    case 1:
        print("El numero es uno");
        break;
    case 2:
        print("El numero es dos");
        break;
    case 3:
        print("El numero es tres");
        break;
    case 4:
        print("El numero es cuatro");
        break;
    case 5:
        print("El numero es cinco");
        break;
    case 6:
        print("El numero es seis");
        break;
    case 7:
        print("El numero es siete");
        break;
    case 8:
        print("El numero es ocho");
        break;
    case 9:
        print("El numero es nueve");
        break;
    case 10:
        print("El numero es diez");
        break;
}
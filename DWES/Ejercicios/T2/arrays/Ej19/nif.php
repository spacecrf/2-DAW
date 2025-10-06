<?php
//Realizar una página que verifique si un dni/nif es correcto. (solo hace falta para los que tienen el formato NúmeroLetra). Formato NIF: 12345678Z

$nif = "49395524Q"; // Ejemplo de NIF

if(esNIFValido($nif)){
    echo "El nif $nif es válido.";
} else {
    echo "El nif $nif no es válido.";
}

function esNIFValido($nif): bool {
    $numero = substr($nif, 0, -1);
    $letra = strtoupper(substr($nif, -1));
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $indice = $numero % 23;
    $letra_correcta = $letras[$indice];
    return $letra === $letra_correcta;

}
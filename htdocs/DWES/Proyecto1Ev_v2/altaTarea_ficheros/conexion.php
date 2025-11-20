<?php

try {
    $conexion = mysqli_connect("localhost", "root", "", "bunglebuild");
    mysqli_set_charset($conexion, 'utf8');
} catch (Exception $ex) {
    echo "Ha  fallado la conexión <br>";
    echo $ex->getMessage();
    exit;
}


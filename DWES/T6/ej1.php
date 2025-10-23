<?php

$conexion = mysqli_connect("localhost", "root", "", "provincias");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conectado correctamente<br>";

$consulta = mysqli_query($conexion, "SELECT * FROM tbl_provincias");

if (!$consulta) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

while ($fila = mysqli_fetch_assoc($consulta)) {
    echo $fila['nombre'] . "<br>";
}

mysqli_close($conexion);

?>

<?php
$host = "localhost";
$usuario = "manuelgarcia";
$contraseña = "7GyOyo6tx_Bs#nz2";
$base_datos = "manuelgarcia";

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
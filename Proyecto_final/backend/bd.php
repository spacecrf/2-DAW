<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "hotel_tamarindos";

$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
<?php
// Encabezado para indicar que la respuesta es JSON
header('Content-Type: application/json; charset=utf-8');

// Incluir el archivo de conexión
include 'conexion.php'; // o require 'conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión: " . $conn->connect_error]));
}

$codigo = $_GET['codigo'];
// Consulta SQL
$sql = "SELECT * FROM notas WHERE codigo_alumno=". $codigo;
$resultado = $conn->query($sql);

$notas = [];

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $notas[] = $fila;
    }
     echo json_encode($notas, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}   else {
    echo json_encode(["mensaje" => "No hay registros en la tabla notas."]);
}

// Cerrar conexión
$conn->close();
?>
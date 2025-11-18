<?php
header('Content-Type: application/json; charset=utf-8');
include 'conexion.php';

$nombre    = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';
$apellidos = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
$nota      = isset($_GET['notas']) ? trim($_GET['notas']) : '';

if (empty($nombre) || empty($apellidos) || empty($nota)) {
    echo json_encode([
        "status" => "error",
        "message" => "Todos los campos son obligatorios."
    ]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO usuario (nombre, apellido, notas) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $apellidos, $nota);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Alumno insertado correctamente.",
        "data" => [
            "nombre" => $nombre,
            "apellido" => $apellidos,
            "nota" => $nota
        ]
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();

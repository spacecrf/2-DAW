<?php
header('Content-Type: application/json; charset=utf-8');
include 'conexion.php';

// Recoger datos
$codigo    = isset($_GET['codigo']) ? intval($_GET['codigo']) : 0;
$nombre    = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';
$apellidos = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
$notas     = isset($_GET['notas']) ? trim($_GET['notas']) : '';

if ($codigo <= 0 || empty($nombre) || empty($apellidos) || empty($notas)) {
    echo json_encode([
        "status" => "error",
        "message" => "Todos los campos son obligatorios y el código debe ser válido."
    ]);
    exit;
}

// Preparar y ejecutar la actualización
$stmt = $conn->prepare("UPDATE usuario SET nombre = ?, apellido = ?, notas = ? WHERE codigo = ?");
$stmt->bind_param("sssi", $nombre, $apellidos, $notas, $codigo);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Alumno modificado correctamente.",
        "data" => [
            "codigo" => $codigo,
            "nombre" => $nombre,
            "apellido" => $apellidos,
            "notas" => $notas
        ]
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error al modificar el alumno: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>

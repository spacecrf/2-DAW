<?php
header('Content-Type: application/json; charset=utf-8');
include 'conexion.php';

// Validar que se reciba el código
$codigo = isset($_GET['codigo']) ? intval($_GET['codigo']) : 0;

if ($codigo <= 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Código de alumno no válido."
    ]);
    exit;
}

// Preparar y ejecutar borrado
$stmt = $conn->prepare("DELETE FROM usuario WHERE codigo = ?");
$stmt->bind_param("i", $codigo);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "Alumno eliminado correctamente."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Error al eliminar el alumno: " . $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>

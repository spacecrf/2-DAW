<?php 
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    if (!is_numeric($id)) {
        die("ID inválido");
    }

    $sql = "DELETE FROM tareas WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../../index.php");
        exit;
    } else {
        echo "Error al eliminar: " . mysqli_error($conexion);
    }
} else {
    header("Location: ../../index.php");
    exit;
}

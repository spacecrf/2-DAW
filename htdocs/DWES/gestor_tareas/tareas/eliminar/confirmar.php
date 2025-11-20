<?php 
require_once '../../config/conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido");
}

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Tarea</title>
    <link rel='stylesheet' href='../../assets/css/style.css'>
</head>
<body>
    <h2>¿Seguro que quieres eliminar la tarea <?= $id ?>?</h2>

    <form method="post" action="procesar.php">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Sí, eliminar" class="btn btn-eliminar">
        <a href="../../index.php" class="btn btn-cancelar">Cancelar</a>
    </form>
</body>
</html>

<?php
require_once '../../includes/funciones.php';
require_once '../../config/conexion.php'; // Conexion mysqli

// Verificar que se recibe el ID por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID inválido");
}

$id = $_GET['id'];

// Obtener la tarea desde la BD
$sql = "SELECT * FROM tareas WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);

if ($resultado->num_rows === 0) {
    die("Tarea no encontrada");
}

$tarea = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='../../assets/css/style.css'>
    <title>Modificar Tarea</title>
</head>

<body>
    <h2>Modificar Tarea</h2>

    <form method='post' action='procesar.php?id=<?= $id ?>' enctype='multipart/form-data'>
        NIF/CIF:<input type='text' name='nif_cif' value='<?= htmlspecialchars($tarea['nif_cif']) ?>'><?php verErrores($errores, 'nif_cif'); ?>
        Persona Contacto:<input type='text' name='persona_contacto' value='<?= htmlspecialchars($tarea['persona_contacto']) ?>'><?php verErrores($errores, 'persona_contacto'); ?>
        Teléfono:<input type='text' name='telefono_contacto' value='<?= htmlspecialchars($tarea['telefono_contacto']) ?>'><?php verErrores($errores, 'telefono_contacto'); ?>
        Correo:<input type='email' name='correo_contacto' value='<?= htmlspecialchars($tarea['correo_contacto']) ?>'><?php verErrores($errores, 'correo_contacto'); ?>
        Descripción:<textarea name='descripcion'><?= htmlspecialchars($tarea['descripcion']) ?></textarea>
        Dirección:<input type='text' name='direccion' value='<?= htmlspecialchars($tarea['direccion']) ?>'>
        Población:<input type='text' name='poblacion' value='<?= htmlspecialchars($tarea['poblacion']) ?>'>
        Código Postal:<input type='text' name='codigo_postal' value='<?= htmlspecialchars($tarea['codigo_postal']) ?>'>
        Provincia:<select name='provincia'><?php mostrarProvincias($tarea['provincia']); ?></select>
        Estado:<select name ='estado'><?php mostrarEstado($tarea['estado']); ?></select>
        Fecha Realización:<input type='date' name='fecha_realizacion' value='<?= htmlspecialchars($tarea['fecha_realizacion']) ?>'>
        Operario Encargado:<input type='text' name='operario_encargado' value='<?= htmlspecialchars($tarea['operario_encargado']) ?>'>
        Anotaciones Anteriores:<textarea name='anotaciones_anteriores'><?= htmlspecialchars($tarea['anotaciones_anteriores']) ?></textarea>
        Fichero Resumen:<input type='file' name='fichero_resumen'>
        Fotos:<input type='file' name='fotos' multiple>
        <input type='submit' value='Guardar'>
    </form>
</body>

</html>
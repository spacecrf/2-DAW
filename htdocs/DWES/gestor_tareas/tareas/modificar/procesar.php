<?php
require_once '../../config/conexion.php';

require_once '../../includes/funciones.php';

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

$errores = [];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nif_cif = $_POST["nif_cif"];
    $persona_contacto = $_POST["persona_contacto"];
    $telefono_contacto = $_POST["telefono_contacto"];
    $descripcion = $_POST["descripcion"];
    $correo_contacto = $_POST["correo_contacto"];
    $direccion = $_POST["direccion"];
    $poblacion = $_POST["poblacion"];
    $codigo_postal = $_POST["codigo_postal"];
    $provincia = $_POST["provincia"];
    $estado = $_POST["estado"];
    $fecha_realizacion = $_POST["fecha_realizacion"];
    $operario_encargado = $_POST["operario_encargado"];
    $anotaciones_anteriores = $_POST["anotaciones_anteriores"];

    $sql = "UPDATE tareas SET 
        nif_cif='$nif_cif',
        persona_contacto='$persona_contacto',
        telefono_contacto='$telefono_contacto',
        descripcion='$descripcion',
        correo_contacto='$correo_contacto',
        direccion='$direccion',
        poblacion='$poblacion',
        codigo_postal='$codigo_postal',
        provincia='$provincia',
        estado='$estado',
        fecha_realizacion='$fecha_realizacion',
        operario_encargado='$operario_encargado',
        anotaciones_anteriores='$anotaciones_anteriores'
        WHERE id = $id";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        header("Location: ../../index.php");
        exit;
    } else {
        echo "Error al modificar la tarea: " . mysqli_error($conexion);
    }
}


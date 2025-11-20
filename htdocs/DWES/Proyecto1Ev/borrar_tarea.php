<?php
$conexion = mysqli_connect("localhost", "root", "", "bunglebuild");

$id = $_GET["id"];
$consulta = "SELECT * FROM tareas WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$tarea = mysqli_fetch_assoc($resultado);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $confirmar = $_POST["confirmar"];
    if ($confirmar == "si") {
        $borrar = "DELETE FROM tareas WHERE id = $id";
        mysqli_query($conexion, $borrar);
        echo "Tarea eliminada correctamente.";
    } else {
        echo "Operación cancelada.";
    }
}
?>


<div class="confirm-box">
    <h3>¿Estás seguro de que quieres borrar esta tarea?</h3>
    <p><strong>Descripción:</strong> <?= $tarea['descripcion'] ?></p>
    <p><strong>Persona de contacto:</strong> <?= $tarea['persona_contacto'] ?></p>
    <p><strong>Fecha de realización:</strong> <?= $tarea['fecha_realizacion'] ?></p>

    <form method="POST">
        <button type="submit" name="confirmar" value="si">Sí, borrar</button>
        <button type="submit" name="confirmar" value="no">No, cancelar</button>
    </form>
</div>

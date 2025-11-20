<?php
$conexion = mysqli_connect("localhost", "root", "", "bunglebuild");

$id = $_GET["id"];
$resultado = mysqli_query($conexion, "SELECT * FROM tareas WHERE id = $id");
$tarea = mysqli_fetch_assoc($resultado);

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

    mysqli_query($conexion, $sql);
    echo "Tarea modificada correctamente.";
}
?>


<h2>Modificar Tarea</h2>

<form method="POST">
    <input type="text" name="nif_cif" value="<?= $tarea['nif_cif'] ?>" placeholder="NIF/CIF">
    <input type="text" name="persona_contacto" value="<?= $tarea['persona_contacto'] ?>" placeholder="Persona de contacto">
    <input type="text" name="telefono_contacto" value="<?= $tarea['telefono_contacto'] ?>" placeholder="Teléfono">
    <textarea name="descripcion" placeholder="Descripción"><?= $tarea['descripcion'] ?></textarea>
    <input type="email" name="correo_contacto" value="<?= $tarea['correo_contacto'] ?>" placeholder="Correo electrónico">
    <input type="text" name="direccion" value="<?= $tarea['direccion'] ?>" placeholder="Dirección">
    <input type="text" name="poblacion" value="<?= $tarea['poblacion'] ?>" placeholder="Población">
    <input type="text" name="codigo_postal" value="<?= $tarea['codigo_postal'] ?>" placeholder="Código postal">
    <select name="provincia">
        <option value="21" <?= $tarea['provincia'] == 21 ? 'selected' : '' ?>>Huelva</option>
        <option value="41" <?= $tarea['provincia'] == 41 ? 'selected' : '' ?>>Sevilla</option>
        <option value="11" <?= $tarea['provincia'] == 11 ? 'selected' : '' ?>>Cádiz</option>
    </select>
    <select name="estado">
        <option value="B" <?= $tarea['estado'] == 'B' ? 'selected' : '' ?>>Esperando aprobación</option>
        <option value="P" <?= $tarea['estado'] == 'P' ? 'selected' : '' ?>>Pendiente</option>
        <option value="R" <?= $tarea['estado'] == 'R' ? 'selected' : '' ?>>Realizada</option>
        <option value="C" <?= $tarea['estado'] == 'C' ? 'selected' : '' ?>>Cancelada</option>
    </select>
    <input type="date" name="fecha_realizacion" value="<?= $tarea['fecha_realizacion'] ?>">
    <input type="text" name="operario_encargado" value="<?= $tarea['operario_encargado'] ?>" placeholder="Operario encargado">
    <textarea name="anotaciones_anteriores" placeholder="Anotaciones anteriores"><?= $tarea['anotaciones_anteriores'] ?></textarea>
    <button type="submit">Guardar cambios</button>
</form>

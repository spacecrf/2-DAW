<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("localhost", "root", "", "bunglebuild");

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

    $sql = "INSERT INTO tareas (nif_cif, persona_contacto, telefono_contacto, descripcion, correo_contacto, direccion, poblacion, codigo_postal, provincia, estado, fecha_realizacion, operario_encargado, anotaciones_anteriores)
            VALUES ('$nif_cif', '$persona_contacto', '$telefono_contacto', '$descripcion', '$correo_contacto', '$direccion', '$poblacion', '$codigo_postal', '$provincia', '$estado', '$fecha_realizacion', '$operario_encargado', '$anotaciones_anteriores')";

    mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    echo "Tarea guardada correctamente.";
}
?>

<form method="POST">
    <input type="text" name="nif_cif" placeholder="NIF/CIF"><br>
    <input type="text" name="persona_contacto" placeholder="Persona de contacto"><br>
    <input type="text" name="telefono_contacto" placeholder="Teléfono"><br>
    <textarea name="descripcion" placeholder="Descripción"></textarea><br>
    <input type="email" name="correo_contacto" placeholder="Correo electrónico"><br>
    <input type="text" name="direccion" placeholder="Dirección"><br>
    <input type="text" name="poblacion" placeholder="Población"><br>
    <input type="text" name="codigo_postal" placeholder="Código postal"><br>
    <select name="provincia">
        <option value="21">Huelva</option>
        <option value="41">Sevilla</option>
        <option value="11">Cádiz</option>
    </select><br>
    <select name="estado">
        <option value="B">Esperando aprobación</option>
        <option value="P">Pendiente</option>
        <option value="R">Realizada</option>
        <option value="C">Cancelada</option>
    </select><br>
    <input type="date" name="fecha_realizacion"><br>
    <input type="text" name="operario_encargado" placeholder="Operario encargado"><br>
    <textarea name="anotaciones_anteriores" placeholder="Anotaciones anteriores"></textarea><br>
    <button type="submit">Guardar tarea</button>
</form>
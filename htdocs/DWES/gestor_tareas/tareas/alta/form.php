<?php
require_once "procesar.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel='stylesheet' href='../../assets/css/style.css'>
</head>

<body>
    <h2>Alta Tarea</h2>
    <form method='post' enctype='multipart/form-data'>
        NIF/CIF:<input type='text' name='nif_cif'><?php verErrores($errores, 'nif_cif'); ?>
        Persona Contacto:<input type='text' name='persona_contacto'><?php verErrores($errores, 'persona_contacto'); ?>
        Teléfono:<input type='text' name='telefono_contacto'><?php verErrores($errores, 'telefono_contacto'); ?>
        Correo:<input type='email' name='correo_contacto'><?php verErrores($errores, 'correo_contacto'); ?>
        Descripción:<textarea name='descripcion'></textarea>
        Dirección:<input type='text' name='direccion'>
        Población:<input type='text' name='poblacion'>
        Código Postal:<input type='text' name='codigo_postal'>
        Provincia:<select name='provincia'><?php mostrarProvincias($provincia); ?></select>
        Estado:<select name ='estado'><?php mostrarEstado($estado); ?></select>
        Fecha Realización:<input type='date' name='fecha_realizacion'>
        Operario Encargado:<input type='text' name='operario_encargado'>
        Anotaciones Anteriores:<textarea name='anotaciones_anteriores'></textarea>
        Fichero Resumen:<input type='file' name='fichero_resumen'>
        Fotos:<input type='file' name='fotos' multiple>
        <input type='submit' value='Guardar'>
    </form>
</body>

</html>
<?php

$errores = [];

$nifCif = "";
$personaNombre = "";
$telefono = "";
$descripcionTarea = "";
$correo = "";
$direccionTarea = "";
$poblacion = "";
$codigoPostal = "";
$provincia = "";
$estadoTarea = "";
$operarioEncargado = "";
$fechaRealizacion = "";
$anotacionesAnteriores = "";
$anotacionesPosteriores = "";

//Llamada al archivo de las funciones
require_once __DIR__ . '/../funciones.php';


if ($_POST) {
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

    if ($nif_cif == "") {
        $errores['nif_cif'] = "Debe introducir el NIF/CIF de la persona encargada de la tarea";
    } else {
        $resultado = validarNif($nif_cif);          
        if ($resultado !== true) {
            $errores[] = $resultado;
        }
    }

    if ($persona_contacto === "") {
        $errores['nombre_persona'] = "Debe introducir el nombre de la persona encargada de la tarea";
    }

    if ($descripcion === "") {  
        $errores['descripcion_tarea'] = "Debe introducir la descripción de la tarea";
    }

    if ($correo_contacto === "") {
        $errores['correo'] = "Debe introducir el correo de la persona encargada de la tarea";
    } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = "El correo introducido no es válido";
    }

    if ($telefono_contacto == "") {
        $errores['telefono'] = "Debe introducir el teléfono de la persona encargada de la tarea";
    } else {
        $resultado = telefonoValido($telefono_contacto);
        if ($resultado !== true) {
            $errores['telefono'] = $resultado;
        }
    }

    if ($codigo_postal != "" && !preg_match("/^[0-9]{5}$/", $codigo_postal)) {
        $errores['codigo_postal'] = "El código postal introducido no es válido, debe tener 5 números";
    }

    if ($provincia === "") {
        $errores['provincia'] = "Debe introducir la provincia";
    }

    $fecha_actual = date('Y-m-d');
    if ($fecha_realizacion == "") {
        $errores['fecha_realizacion'] = "Debe introducir la fecha de realización de la tarea";
    } else {
        if ($fecha_realizacion <= $fecha_actual) {
            $errores['fecha_realizacion'] = "La fecha de realización debe ser posterior a la fecha actual";
        }
    }

    // Si hay errores, volvemos al formulario con los errores
    if (!empty($errores)) {
        include 'alta_tarea_form.php';
        exit;
    } else {
        // Si no hay errores, guardamos en la base de datos
        require_once 'conexion.php';

        $sql = "INSERT INTO tareas (
            nif_cif, persona_contacto, telefono, email, direccion, poblacion,
            codigo_postal, provincia, descripcion, anotaciones_anteriores,
            estado, operario_encargado, fecha_realizacion
        ) VALUES (
            '$nifCif', '$personaNombre', '$telefono', '$correo', '$direccionTarea', '$poblacion',
            '$codigoPostal', '$provincia', '$descripcionTarea', '$anotacionesAnteriores',
            '$estadoTarea', '$operarioEncargado', '$fechaRealizacion'
        )";

        if (mysqli_query($conexion, $sql)) {
            mysqli_close($conexion);
            include 'alta_tarea_procesado.php';
        } else {
            $errores[] = "Error al guardar en la base de datos: " . mysqli_error($conexion);
            mysqli_close($conexion);
            include 'alta_tarea_form.php';
        }
        exit;
    }
} else {
    include 'alta_tarea_form.php';
}

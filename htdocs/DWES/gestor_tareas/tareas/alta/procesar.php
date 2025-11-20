<?php require_once '../../includes/funciones.php';
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nif_cif = $_POST['nif_cif'];
    $persona_contacto = $_POST['persona_contacto'];
    $telefono_contacto = $_POST['telefono_contacto'];
    $descripcion = $_POST['descripcion'];
    $correo_contacto = $_POST['correo_contacto'];
    $direccion = $_POST['direccion'];
    $poblacion = $_POST['poblacion'];
    $codigo_postal = $_POST['codigo_postal'];
    $provincia = $_POST['provincia'];
    $estado = $_POST['estado'];
    $fecha_realizacion = $_POST['fecha_realizacion'];
    $operario_encargado = $_POST['operario_encargado'];
    $anotaciones_anteriores = $_POST['anotaciones_anteriores'];

    // Archivos (solo el nombre)
    $fichero = $_FILES['fichero_resumen']['name'] ?? '';
    $fotos   = $_FILES['fotos']['name'] ?? '';

    // Validaciones (las tuyas)
    if (validarNif($nif_cif) !== true) $errores['nif_cif'] = validarNif($nif_cif);
    if (telefonoValido($telefono_contacto) !== true) $errores['telefono_contacto'] = telefonoValido($telefono_contacto);
    if (!filter_var($correo_contacto, FILTER_VALIDATE_EMAIL)) $errores['correo_contacto'] = 'Correo inválido';

    if (empty($errores)) {

        require_once '../../config/conexion.php';

        $sql = "INSERT INTO tareas 
        (nif_cif, persona_contacto, telefono_contacto, descripcion, correo_contacto,
        direccion, poblacion, codigo_postal, provincia, estado, fecha_realizacion,
        operario_encargado, anotaciones_anteriores, fichero_resumen, fotos)
        VALUES 
        ('$nif_cif', '$persona_contacto', '$telefono_contacto', '$descripcion', '$correo_contacto',
        '$direccion', '$poblacion', '$codigo_postal', '$provincia', '$estado', '$fecha_realizacion',
        '$operario_encargado', '$anotaciones_anteriores', '$fichero', '$fotos')";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            header("Location: ../../index.php");
            exit;
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    }
}
// descripcion y provincia fecha de realizacion obligatoria y verificar el codigo postal.
//Probelmas con el estado revisar.
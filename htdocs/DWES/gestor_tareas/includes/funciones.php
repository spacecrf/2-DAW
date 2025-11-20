<?php

include __DIR__ . '../../config/conexion.php';

function validarNif($dni)
{
    $dni = strtoupper($dni);
    if (!preg_match('/^[A-Z0-9]{9}$/', $dni)) return 'El NIF/CIF debe tener 9 caracteres';
    $letrasNif = 'TRWAGMYFPDXBNJZSQVHLCKE';
    if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
        $numero = substr($dni, 0, 8);
        $letra = substr($dni, -1);
        if ($letra !== $letrasNif[$numero % 23]) return 'La letra del NIF no es correcta.';
        return true;
    }
    if (preg_match('/^[ABCDEFGHJNPQRSUVW][0-9]{7}[A-Z0-9]$/', $dni)) {
        $sumaPar = 0;
        $sumaImpar = 0;
        for ($i = 1; $i <= 6; $i += 2) {
            $sumaPar += (int)$dni[$i];
        }
        for ($i = 0; $i <= 6; $i += 2) {
            $doble = (int)$dni[$i] * 2;
            $sumaImpar += $doble > 9 ? $doble - 9 : $doble;
        }
        $sumaTotal = $sumaPar + $sumaImpar;
        $control = (10 - ($sumaTotal % 10)) % 10;
        $letrasControl = 'JABCDEFGHI';
        $controlEsperado = $dni[8];
        if (ctype_alpha($controlEsperado)) {
            return $controlEsperado === $letrasControl[$control] ? true : 'La letra de control del CIF no es correcto.';
        } else {
            return (string)$control === $controlEsperado ? true : 'El número de control del CIF no es correcto.';
        }
    }
    return 'El NIF/CIF no es válido.';
}
function telefonoValido($telefono)
{
    if (!preg_match('/^[+()0-9\s\-.]+$/', $telefono)) return 'Formato de teléfono inválido';
    $soloDigitos = preg_replace('/[^0-9]/', '', $telefono);
    $long = strlen($soloDigitos);
    if ($long < 7) return 'Debe tener al menos 7 dígitos';
    if ($long > 15) return 'No puede tener más de 15 dígitos';
    return true;
}
$provincias = ["01" => "Araba/Álava", "02" => "Albacete", "03" => "Alicante", "04" => "Almería", "05" => "Ávila", "06" => "Badajoz", "07" => "Balears", "08" => "Barcelona", "09" => "Burgos", "10" => "Cáceres", "11" => "Cádiz", "12" => "Castellón", "13" => "Ciudad Real", "14" => "Córdoba", "15" => "Coruña", "16" => "Cuenca", "17" => "Girona", "18" => "Granada", "19" => "Guadalajara", "20" => "Gipuzkoa", "21" => "Huelva", "22" => "Huesca", "23" => "Jaén", "24" => "León", "25" => "Lleida", "26" => "La Rioja", "27" => "Lugo", "28" => "Madrid", "29" => "Málaga", "30" => "Murcia", "31" => "Navarra", "32" => "Ourense", "33" => "Asturias", "34" => "Palencia", "35" => "Las Palmas", "36" => "Pontevedra", "37" => "Salamanca", "38" => "Santa Cruz", "39" => "Cantabria", "40" => "Segovia", "41" => "Sevilla", "42" => "Soria", "43" => "Tarragona", "44" => "Teruel", "45" => "Toledo", "46" => "Valencia", "47" => "Valladolid", "48" => "Bizkaia", "49" => "Zamora", "50" => "Zaragoza", "51" => "Ceuta", "52" => "Melilla"];

function mostrarProvincias($provinciaSeleccionada = "")
{
    global $provincias;
    foreach ($provincias as $codigo => $nombre) {
        $sel = $codigo == $provinciaSeleccionada ? 'selected' : '';
        echo "<option value='$codigo' $sel>" . htmlspecialchars($nombre) . "</option>";
    }
}
function verErrores($errores, $campo)
{
    if (isset($errores[$campo])) echo "<div class='error'>" . htmlspecialchars($errores[$campo]) . "</div>";
}
$estado = ["B" => "Esperando ser aprobada", "P" => "Pendiente", "R" => "Realizada", "C" => "Candelada"];
function mostrarEstado($estadoSeleccionado = "")
{
    global $estado;
    foreach ($estado as $valor => $nombre) {
        $sel = ($valor == $estadoSeleccionado) ? 'selected' : '';
        echo "<option value='$valor' $sel>" . htmlspecialchars($nombre) . "</option>";
    }
}

$sql = 'SELECT * FROM tareas';
$resultado = mysqli_query($conexion, $sql);

function mosntrarTabla($resultado)
{
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila['id'] . '</td>';
            echo '<td>' . $fila['nif_cif'] . '</td>';
            echo '<td>' . $fila['persona_contacto'] . '</td>';
            echo '<td>' . $fila['telefono_contacto'] . '</td>';
            echo '<td>' . $fila['correo_contacto'] . '</td>';
            echo '<td>' . $fila['descripcion'] . '</td>';
            echo '<td>' . $fila['direccion'] . '</td>';
            echo '<td>' . $fila['poblacion'] . '</td>';
            echo '<td>' . $fila['codigo_postal'] . '</td>';
            echo '<td>' . $fila['provincia'] . '</td>';
            echo '<td>' . $fila['estado'] . '</td>';
            echo '<td>' . $fila['fecha_realizacion'] . '</td>';
            echo '<td>' . $fila['operario_encargado'] . '</td>';
            echo '<td>' . $fila['anotaciones_anteriores'] . '</td>';
            echo '<td>' . $fila['fichero_resumen'] . '</td>';
            echo '<td>' . $fila['fotos'] . '</td>';
            echo '<td>
                    <button class = "btn btn-modificar">
                    <a href="./tareas/modificar/form.php?id=' . $fila['id'] . '">Modificar</a>
                    </button>
                    <button class = "btn btn-modificar">
                    <a href="./tareas/eliminar/confirmar.php?id=' . $fila['id'] . '">Eliminar</a>
                    </button>
                    </td>';
        }
    }
}

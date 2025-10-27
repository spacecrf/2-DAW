<?php

$conexion = mysqli_connect("localhost", "root", "", "provincias");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conectado correctamente<br>";

$consulta =  "
    SELECT c.nombre AS comunidad, COUNT(p.cod) AS num_provincias
    FROM tbl_comunidadesautonomas c
    JOIN tbl_provincias p ON c.id = p.comunidad_id
    GROUP BY c.nombre
    ORDER BY c.nombre
";

$resultado = mysqli_query($conexion, $consulta);

if(!$resultado){
    die("Error en la consulta: ". mysqli_error($conexion));
}

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>
            <td>{$fila['comunidad']}</td>
            <td align='center'>{$fila['num_provincias']}</td>
          </tr>";
}

mysqli_close($conexion);

?>
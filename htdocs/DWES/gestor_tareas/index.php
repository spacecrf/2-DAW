<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href="assets/css/style.css">
    <title>Gestor Tareas</title>
</head>

<body>
    <h1>Gestor de Tareas</h1>
<<<<<<< HEAD
    <ul>
        <li><a href='tareas/alta/form.php'>Dar de alta tarea</a></li>
        <li><a href='tareas/modificar/form.php'>Modificar tarea</a></li>
        <li><a href='tareas/eliminar/confirmar.php'>Eliminar tarea</a></li>
=======
        <button class="btn btn-alta"><a href='tareas/alta/form.php'>Dar de alta tarea</a></button>
    <ul>
        <!-- <li><a href='tareas/alta/form.php'>Dar de alta tarea</a></li>
        <li><a href='tareas/modificar/form.php'>Modificar tarea</a></li>
        <li><a href='tareas/eliminar/confirmar.php'>Eliminar tarea</a></li> -->
>>>>>>> a9d14d0981aa59b928e491ce4d3108639552b132
    </ul> 

    <table class="tabla-tarea">
        <thead>
            <th>ID</th>
            <th>DNI</th>
            <th>Persona de Contacto</th>
            <th>TLF</th>
            <th>Correo</th>
            <th>Descripcion</th>
            <th>Direccion</th>
            <th>Poblacion</th>
            <th>Codigo Postal</th>
            <th>Provincia</th>
            <th>Estado</th>
            <th>Fecha de realizacion</th>
            <th>Operario al cargo</th>
            <th>Anotaciones Anteriores</th>
            <th>Ficheros</th>
            <th>Imagenes</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            include __DIR__ . '/includes/funciones.php';
            mosntrarTabla($resultado);
            ?>
        </tbody>
    </table>

</body>

</html>

        <!--Preguntar por los ficheros -->
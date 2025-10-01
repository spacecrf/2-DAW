<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla con datos PHP</title>
</head>
<body>
    <table>
        <tr>
            <th><?php include "cuerpo.php"; print($nombre); ?></th>
            <tr><?php print($apellido); ?></tr>
        </tr>
    </table>
</body>
</html>
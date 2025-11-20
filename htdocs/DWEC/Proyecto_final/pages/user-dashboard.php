<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}

require_once(__DIR__ . "/../backend/bd.php");

// Obtener datos del usuario
$user_id = $_SESSION['usuario_id'];

$stmt = $conn->prepare("SELECT nombre, email FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($nombre, $email);
$stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Los Tamarindos</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
<header>
    <nav class="nav">
        <div class="logo">Los Tamarindos</div>
        <ul>
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../rooms.html">Habitaciones</a></li>
            <li><a href="../booking.html">Reservas</a></li>
            <li><a href="../contact.html">Contacto</a></li>
            <li><a href="../backend/logout.php" class="logout">Cerrar sesión</a></li>
        </ul>
    </nav>
</header>

<section class="auth-section">
    <div class="auth-container">
        <h2>Mi cuenta</h2>

        <div class="user-box">
            <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        </div>

        <a href="../booking.html" class="btn">Hacer una reserva</a>
    </div>
</section>

<footer>
    <p>&copy; 2025 Los Tamarindos</p>
</footer>

</body>
</html>

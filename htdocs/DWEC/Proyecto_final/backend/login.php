<?php
require_once "bd.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password, nombre, rol FROM usuarios WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $hash, $nombre, $rol);
$stmt->fetch();

if ($stmt->num_rows > 0 && password_verify($password, $hash)) {
    session_start();
    $_SESSION['usuario_id'] = $id;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['rol'] = $rol;
    echo "OK";
} else {
    echo "ERROR";
}
?>

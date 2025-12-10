<?php
session_start();
include('../../config/database.php');

$correo = $_POST['correo'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE correo = '$correo' LIMIT 1";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        header("Location: ../../public/index.php");
        exit;
    }
}

header("Location: ../../public/iniciarsesion.php?error=1");
exit;
?>

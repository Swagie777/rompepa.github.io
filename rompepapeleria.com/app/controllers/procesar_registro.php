<?php
session_start();
include('../../config/database.php');

$nombre  = $_POST['nombre'];
$correo  = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios(nombre, correo, password)
        VALUES('$nombre', '$correo', '$password')";

if ($conn->query($sql)) {
    $_SESSION['usuario'] = $nombre;
    header("Location: ../../public/index.php");
    exit;
}

header("Location: ../../public/registrarse.php?error=1");
exit;
?>

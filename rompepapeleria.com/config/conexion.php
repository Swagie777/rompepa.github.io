<?php
// conexion.php (ubicado en /config)

$host = "localhost";
$user = "root";   // Cambiar si tu XAMPP tiene usuario diferente
$pass = "";       // Cambiar si tu XAMPP tiene contraseña
$db   = "rompepapeleria"; // Asegúrate que exista esta BD

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión a MySQL: " . $conexion->connect_error);
}

// Soporte para acentos
$conexion->set_charset("utf8mb4");

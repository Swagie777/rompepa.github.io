<?php
// registrar_usuario.php
require_once "../config/conexion.php";

// Evitar errores por sesiones duplicadas
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recibir datos del formulario
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $confirm = trim($_POST["confirm_password"]);

    // Validar campos vacíos
    if ($email === "" || $username === "" || $password === "" || $confirm === "") {
        $_SESSION["error_registro"] = "Todos los campos son obligatorios";
        header("Location: /public/registrarse.php");
        exit;
    }

    // Validar formato de correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_registro"] = "Ingresa un correo válido";
        header("Location: /public/registrarse.php");
        exit;
    }

    // Validar contraseña
    if ($password !== $confirm) {
        $_SESSION["error_registro"] = "Las contraseñas no coinciden";
        header("Location: /public/registrarse.php");
        exit;
    }

    if (strlen($password) < 4) {
        $_SESSION["error_registro"] = "La contraseña debe tener al menos 4 caracteres";
        header("Location: /public/registrarse.php");
        exit;
    }

    // Verificar si el correo ya existe
    $check = $conexion->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["error_registro"] = "El correo ya está registrado";
        header("Location: /public/registrarse.php");
        exit;
    }

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el usuario
    $sql = "INSERT INTO usuarios (email, username, password) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $email, $username, $passwordHash);

    if ($stmt->execute()) {

        // Crear sesión automáticamente
        $_SESSION["usuario"] = $username;

        // Redirigir al inicio
        header("Location: /public/index.php");
        exit;
    } else {
        $_SESSION["error_registro"] = "Error al registrar usuario";
        header("Location: /public/registrarse.php");
        exit;
    }
}

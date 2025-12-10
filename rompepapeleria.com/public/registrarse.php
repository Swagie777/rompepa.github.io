<?php
// registrarse.php - colocar en /public/registrarse.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors = [];

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

    // Validaciones
    if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ingresa un correo válido";
    }

    if ($username === '' || strlen($username) < 3) {
        $errors[] = "El nombre de usuario debe tener al menos 3 caracteres";
    }

    if ($password === '' || strlen($password) < 4) {
        $errors[] = "La contraseña debe tener mínimo 4 caracteres";
    }

    if ($password !== $password2) {
        $errors[] = "Las contraseñas no coinciden";
    }

    // Si no hay errores
    if (empty($errors)) {

        $_SESSION['usuario'] = $username; // 🔥 GUARDAR USUARIO LOGUEADO
    
        $_SESSION['new_user'] = [
            'correo' => $correo,
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s"),
        ];
    
        header("Location: /rompepapeleria.com/public/index.php");
        exit;
    }
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse - Papelería Rompediscoteka</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../assets/css/misestilos.css">
</head>
<body>

    <div class="login-container">

        <h2>Crear Cuenta</h2>

        <?php if (!empty($errors)): ?>
        <div style="background:#ffe8e8;color:#8a0000;padding:10px;border-radius:8px;margin-bottom:12px;">
            <?php foreach ($errors as $err) echo "<div>".htmlspecialchars($err)."</div>"; ?>
        </div>
        <?php endif; ?>

        <form action="" method="POST">

            <label for="correo">Correo Gmail</label>
            <input type="email" name="correo" placeholder="Ingresa tu correo de Gmail">

            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" placeholder="Elige un usuario">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingresa tu contraseña">

            <label for="password2">Confirmar contraseña</label>
            <input type="password" name="password2" placeholder="Repite la contraseña">

            <button type="submit" class="btn-login">Guardar</button>

        </form>

        <div class="divider">o</div>

        <button type="button" class="btn-google" onclick="window.location.href='../app/controllers/google_oauth.php'">
            Registrarse con Google
        </button>

        <div class="register-link">
            ¿Ya tienes cuenta?
            <a href="../public/iniciarsesion.php">Inicia sesión aquí</a>
        </div>

    </div>

</body>
</html>

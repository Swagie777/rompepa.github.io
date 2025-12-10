<?php
// iniciarsesion.php - colocar en /public/iniciarsesion.php

// Evitar notice por session_start() duplicado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$showSuccess = false;
$errors = [];

// Manejo del POST: guardamos temporalmente en sesión (lista para DB después)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validaciones básicas
    if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Por favor ingresa un correo válido';
    }
    if ($password === '' || strlen($password) < 4) {
        $errors[] = 'La contraseña debe tener al menos 4 caracteres';
    }

    if (empty($errors)) {

        $_SESSION['temp_user'] = [
            'correo' => $correo,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        $_SESSION['usuario'] = $correo; // 🔥 QUEDA COMO LOGUEADO
    
        $showSuccess = true;
    }
    
    else {
        // si hay errores, mantener el valor del correo para comodidad
        $prefill_email = htmlspecialchars($correo, ENT_QUOTES);
    }
} else {
    $prefill_email = isset($_SESSION['temp_user']['correo']) ? htmlspecialchars($_SESSION['temp_user']['correo'], ENT_QUOTES) : '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Papelería Rompediscoteka</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Ruta asumiendo que este archivo está en /public -->
    <link rel="stylesheet" href="../assets/css/misestilos.css">
    <style>
        /* Pequeño ajuste local para asegurar que el contenedor no choque con navbar fija */
        body { padding-top: 20px; }
    </style>
</head>
<body>

    <div class="login-container" role="main" aria-labelledby="login-title">
        <h2 id="login-title">Iniciar Sesión</h2>

        <?php if (!empty($errors)): ?>
            <div style="background:#ffe8e8;color:#8a0000;padding:10px;border-radius:8px;margin-bottom:12px;">
                <?php foreach($errors as $err) echo "<div>".htmlspecialchars($err)."</div>"; ?>
            </div>
        <?php endif; ?>

        <?php if ($showSuccess): ?>
            <div style="background:#e6ffef;color:#02643a;padding:12px;border-radius:10px;margin-bottom:14px;">
                Datos guardados correctamente
                <div style="font-size:13px;color:#024d2d;margin-top:6px;">
                    Correo: <strong><?php echo htmlspecialchars($_SESSION['temp_user']['correo'], ENT_QUOTES); ?></strong>
                </div>
            </div>
        <?php endif; ?>

        <form action="" method="POST">

    <label for="correo">Correo electrónico</label>
    <input type="email" name="correo" placeholder="Ingresa tu correo">

    <label for="password">Contraseña</label>
    <input type="password" name="password" placeholder="Ingresa tu contraseña">

    <button type="submit" class="btn-login">Guardar</button>
</form>


        <div class="divider">o</div>

        <button type="button" class="btn-google" onclick="window.location.href='../app/controllers/google_oauth.php'">
    Iniciar sesión con Google
</button>

<div class="register-link">
    ¿No tienes cuenta?
    <a href="../public/registrarse.php">Regístrate aquí</a>
</div>

        </div>
    </div>

    <script>
        // focus automático y accesibilidad ligera
        (function(){
            const email = document.getElementById('correo');
            if (email) email.focus();
        })();
    </script>
</body>
</html>



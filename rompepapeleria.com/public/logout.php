<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Borrar cualquier dato del usuario
session_unset();
session_destroy();

// Redirigir al inicio
header("Location: /rompepapeleria.com/public/index.php");
exit;

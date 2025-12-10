<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>


<header class="top-bar" data-aos="fade-down">

    <!-- LOGO -->
    <div class="logo">
        <img src="../assets/img/logo.png" alt="Papelería Rompediscoteka">
        <h1>PAPELERÍA ROMPEDISCOTEKA</h1>
        <p class="lema">¡Tu mundo creativo!</p>
    </div>

    <!-- MENÚ DE USUARIO -->
    <nav class="user-nav">

        <?php if (isset($_SESSION['usuario'])): ?>

            <!-- DROPDOWN DE CUENTA -->
            <div class="cuenta-dropdown">

                <button class="cuenta-btn">
                    <?= htmlspecialchars($_SESSION['usuario']) ?> ▼
                </button>

                <div class="cuenta-menu">
                    <a href="../public/cuenta.php">Mi Cuenta</a>
                    <a href="../app/controllers/logout.php">Cerrar sesión</a>
                </div>

            </div>

        <?php else: ?>

            <!-- BOTONES SIN SESIÓN -->
            <a href="../public/iniciarsesion.php" class="rect-login">
                Iniciar sesión
            </a>

            <a href="../public/registrarse.php" class="rect-login">
                Registrarse
            </a>

        <?php endif; ?>

    </nav>
</header>

<style>
/* -------- ESTILO DEL DROPDOWN (COMBINA CON TU DISEÑO) -------- */

.cuenta-dropdown {
    position: relative;
    display: inline-block;
}

.cuenta-btn {
    background: #ff6f61;
    color: #fff;
    padding: 10px 16px;
    border-radius: 10px;
    border: none;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

.cuenta-btn:hover {
    background: #ff3b2f;
}

/* Caja del menú */
.cuenta-menu {
    display: none;
    position: absolute;
    right: 0;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.2);
    min-width: 180px;
    overflow: hidden;
    z-index: 999;
}

.cuenta-menu a {
    color: #333;
    padding: 12px 15px;
    display: block;
    text-decoration: none;
    font-weight: 500;
}

.cuenta-menu a:hover {
    background: #f3f3f3;
}

/* Mostrar menú al pasar el mouse */
.cuenta-dropdown:hover .cuenta-menu {
    display: block;
}
</style>

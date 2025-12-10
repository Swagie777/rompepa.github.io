<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelería Rompediscoteka</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/rompepapeleria.com/assets/css/misestilos.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- AnimateScroll -->
    <script src="assets/js/animatescroll.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- AOS Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</head>
<body>

    <!-- HEADER / TOP BAR -->
    <header class="top-bar" data-aos="fade-down">
        <div class="nav-left">
            <img src="/rompepapeleria.com/assets/img/logo.png" alt="Papelería Rompediscoteka">
        </div>

        <div class="nav-center">
            <h1>PAPELERÍA ROMPEDISCOTEKA</h1>
            <p class="lema">¡Tu mundo creativo!</p>
        </div>

        <div class="auth-buttons">
            <a href="/rompepapeleria.com/public/iniciarsesion.php" class="btn-login">Iniciar sesión</a>
            <a href="/rompepapeleria.com/public/registrarse.php" class="btn-register">Registrarse</a>

        </div>
    </header>
<!-- MENÚ PRINCIPAL -->
<nav class="main-menu" data-aos="fade-down">
    <ul>
        <li><a href="#inicio">INICIO</a></li>
        <li><a href="#productos">PRODUCTOS</a></li>
        <li><a href="#servicios">SERVICIOS</a></li>
        <li><a href="#ofertas">OFERTAS</a></li>
        <li><a href="#contacto">CONTACTO</a></li>
    </ul>
</nav>


    <!-- BANNER -->
    <section class="banner" id="inicio" data-aos="fade-up">
        <div class="banner-overlay"></div>
        <div class="banner-content">
            <h2>Todo para tu escuela y oficina</h2>
            <button onclick="location.href='catalogo.php'">Ver catálogo</button>
            <button onclick="location.href='pedido.php'">Hacer pedido</button>
        </div>
    </section>

    <!-- CATEGORÍAS -->
    <section class="categorias-container" id="productos" data-aos="fade-up">
        <div class="categoria-card" data-aos="zoom-in">
            <h3>Productos escolares</h3>
            <a href="productos_escolares.php">Ver más</a>
        </div>

        <div class="categoria-card" data-aos="zoom-in">
            <h3>Papelería de oficina</h3>
            <a href="oficina.php">Ver más</a>
        </div>

        <div class="categoria-card" data-aos="zoom-in">
            <h3>Arte y diseño</h3>
            <a href="arte_diseno.php">Ver más</a>
        </div>
    </section>

    <!-- PROMOCIONES -->
    <section class="promos-container" id="ofertas" data-aos="fade-up">
        <div class="promo-item" data-aos="zoom-in">Producto 1</div>
        <div class="promo-item" data-aos="zoom-in">Producto 2</div>
        <div class="promo-item" data-aos="zoom-in">Producto 3</div>
    </section>

    <!-- NOSOTROS -->
    <section class="nosotros" id="nosotros" data-aos="fade-up">
        <h2>Nosotros</h2>
        <p>Breve historia + misión + visión de la papelería Rompediscoteka, comprometidos con tu creatividad y aprendizaje.</p>
    </section>

    <!-- CONTACTO -->
    <section class="contacto" id="contacto" data-aos="fade-up">
        <h2>Contacto</h2>
        <p>Dirección | WhatsApp | Horario | Mapa</p>
    </section>

    <!-- FOOTER -->
    <footer>
        © 2025 Papelería Rompediscoteka
    </footer>

    <!-- AOS Init -->
    <script>
        AOS.init({ duration: 900, easing: "ease-out-cubic" });
    </script>

    <!-- Smooth Scroll -->
    <script>
        $(document).ready(function(){
            $("a[href^='#']").click(function(e){
                e.preventDefault();
                let destino = $(this.getAttribute("href"));
                if(destino.length){
                    $("html, body").animate({
                        scrollTop: destino.offset().top - 80
                    }, 700);
                }
            });
        });
    </script>

</body>
</html>

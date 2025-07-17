<?php
session_start();
require 'php/confi.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avisos de privacidad</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

 <!-- Core theme CSS (includes Bootstrap)-->
 <link rel="shortcut icon" href="img/CGABCY.jpg">
    <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/estilosDesarrolladoras.css">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

  
  <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 900px;
        }

        .header2 {
            background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
            text-align: center;
            width: 100%;
            height: auto;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            overflow: hidden;
            border-radius: 0 0 85% 85% / 30%;
        }

        .header2 .overlay {
            width: 100%;
            height: 100%;
            padding: 50px;
            color: #FFF;
            text-shadow: 1px 1px 1px #333;
            background-image: linear-gradient(135deg, #CC6645 10%, #fd5e086b 100%);

        }

        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 80px;
            margin-bottom: 30px;
        }

        h3,
        p {
            font-family: 'Open Sans', sans-serif;
            margin-bottom: 30px;
        }

    
        h2{
             font-family: 'Playfair Display', serif;
             color: #CC6645;

        }
        button:hover {
            cursor: pointer;
        }
        hr{
            color: #CC6645;
        }
    </style>

<body>

  <!--Header -->
 
<!-----Nav con fondo blanco y letras negras--->
<nav class="p-3 text-dark" class="navbar" style="background-color: white">

<!-----Nav con fondo de color y letras blancas
<header class="p-3 text-white" style="background-color:  #CC6645;"> --->
<div class="container">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
    <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
      <img src="img/Gabcy_cafeteria.png" width="150" height="120" alt="" title="Página Principal">
    </a>

    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

      <li><a href="index.php" class="nav-link px-3 text" style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5">INICIO</a>
      </li>


      <li>
        <a class="nav-link dropdown-toggle" style=" color:#6E0023; display:inline;  border-right: 2px solid  #f0cea5" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          MENÚ
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" style="color: #6E0023;" href="menuC2.php">Bebidas Calientes</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuF2.php">Bebidas Frías</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuA2.php">Alimentos</a></li>
        </ul>
      </li>
      <li><a href="VerEventosGabcy.php" class="nav-link px-3 text" style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5;">EVENTOS</a>
      </li>

      <li><a href="conocenos.php" class="nav-link px-3 text" style=" color: #6E0023; display:inline; ">ACERCA
          DE</a></li>

    </ul>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
      <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search">

    </form>
    <div class="text-end">
         <button type="button" class="btn" onclick="search_producto()">Buscar</button>
    </div>

    <a href="carrito.php" class="btn" style="font-family:'Monserrat', sans-serif;">
      Mi Carrito <span style="background:#6E0023; color:white;" id="num_cart" class="badge text-bg-secondary"><?php echo $num_cart; ?></span>
    </a>


    <div class="dropdown text-end">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        <?php
        if (isset($_SESSION['permiso'])) {
          if ($_SESSION['permiso'] == 1) {
            echo
            '<li>
              <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
              '</a>
            <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Cliente...</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
             <hr class="dropdown-divider" style="color: #f0cea5">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
          }
          if ($_SESSION['permiso'] == 2) {
            echo
            '<li>
            <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
              '</a>
          <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Empleado...</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="#">Menú Empleado</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
           <hr class="dropdown-divider" style="color: #f0cea5">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
          }
          if ($_SESSION['permiso'] == 3) {
            echo
            '<li>
          <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/usuario.png" width="25" height="25" title="Cuenta">' . $_SESSION['nombre'] .
              '</a>
        <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Administrador...</a></li>
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="MenuAdmn.php">Menú Administrador</a></li>
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
         <hr class="dropdown-divider" style="color: #f0cea5">
         <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
          }
        } else {
        ?>
          <li>
            <a class="nav-link dropdown-toggle" style="font-family:'Monserrat', sans-serif; color:#6E0023; " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">
            </a>

            <ul class="dropdown-menu text-small" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;" href="inicioSesion.php">Iniciar Sesión</a></li>
              <hr class="dropdown-divider" style="color: #f0cea5">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;" href="registro.php">Crear Cuenta</a></li>
            <?php
          }
            ?>
            </ul>
          </li>
      </ul>
    </div>
  </div>

</div>
<hr class="featurette-divider" style="color:  #CC6645; " size="2">
</nav>

<header class="header2">
        <div class="overlay">
            <h1>¿Quienes somos?</h1>
            <h3 style="  font-family: 'Playfair Display', serif;">Conoce la historia de GABCY</h3>
          <br>
            <br>
            
        </div>
    </header>

    <br>
    <!-- Visión Misión -->
    <!-- Content section 1-->
    <section id="scroll">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="img/mision.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-5" style="  font-family: 'Playfair Display', serif;">MISIÓN</h2>
                        <hr style="color: #CC6645;">
                        <h4 class="fw-lighter">Somos una empresa mexicana que busca ser reconocida por la
                            venta de joyería de plata mexicana de calidad a costos accesibles para
                            acompañarte en cada momento de tu vida haciendo nuestro trabajo con
                            pasión para superar las expectativas de nuestros clientes garantizando la
                            satisfacción de compra hasta que lleguen a tus manos.</h4>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content section 2-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="img/vision.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-5">VISIÓN</h2>
                        <hr style="color: #CC6645;">
                        <h4 class="fw-lighter">Desarrollarnos y consolidarnos como una empresa líder en ventas online de joyería de plata de calidad y buenos precios a nivel nacional enfocándonos en las necesidades de nuestros clientes.</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Valores-->
    <section class="content-section  text-dark text-center" style="background:  #F9ECDC;" id="services">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading">
                <br>
                <h2 class="display-4" style="color: linear-gradient(90deg, rgb(20%, 40%, 60%), rgb(60%, 20%, 40%));">Nuestros valores</h2>
            </div>
            <br>
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <svg class="rounded-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" width="130" height="130">
                        <path fill="#333" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm114.6 226.4l-113 152.7-112.7-152.7c-8.7-11.9-19.1-50.4 13.6-72 28.1-18.1 54.6-4.2 68.5 11.9 15.9 17.9 46.6 16.9 61.7 0 13.9-16.1 40.4-30 68.1-11.9 32.9 21.6 22.6 60 13.8 72z" />
                    </svg>

                    <h2 class="display-6">Pasión</h2>
                    <hr style="color: #FFB28C;">
                    <p>Trabajamos juntos con vocación y precisión para superar las expectativas de nuestros clientes.</p>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">

                    <svg class="rounded-circle" width="130" height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <path fill="#333" d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L550.2 352H592c26.5 0 48-21.5 48-48V176c0-26.5-21.5-48-48-48H516h-4-.7l-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48H48c-26.5 0-48 21.5-48 48V304c0 26.5 21.5 48 48 48H156.2l91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123z" />
                    </svg>
                    <h2 class="display-6">Compromiso</h2>
                    <hr style="color: #FFB28C;">
                    <p>Creemos en el talento de los artesanos mexicanos y en el precio justo de su trabajo, buscamos reconocer su labor y dedicación.</p>
        
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="rounded-circle" width="130" height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="#333" d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z" />
                    </svg>
                    <h2 class="display-6">Calidad</h2>
                    <hr style="color: #FFB28C;">
                    <p>Cuidamos cada detalle durante todo el proceso de compra, cada una de nuestras piezas representa el trabajo y la herencia de la artesanía mexicana.</p>

                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <br>

            <br>
        </div>
        </div>
    </section>
<br>
    <h2 class="display-4" style="background:white; text-align: center;">Creadores</h2>

    <div class="body2">
        <div class="card">
            <div class="content">
                <span></span>
                <div class="img">
                    <img src="img/creadora1.jpg" alt="">
                    <h4>Gabriela</h4>
                    <h6>Creadora</h6>
                    <p>Seminario de Desarrollo WEB I</p>
                    <p>2023-1</p>
                </div>
            </div>
            <div class="links">
                <a href="a"><i class="fa-brands fa-facebook"></i></a>
                <a href="a"> <i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
        <div class="card">
            <div class="content">
                <span></span>
                <div class="img">
                    <img src="img/creadora2.jpg" alt="">
                    <h4>Nancy</h4>
                    <h6>Creadora</h6>
                    <p>Seminario de Desarrollo WEB I</p>
                    <p>2023-1</p>
                </div>
            </div>
            <div class="links">
                <a href="a"><i class="fa-brands fa-facebook"></i></a>
                <a href="a"> <i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </div>

  <!--Credito -->
  <?php include("creditos.php"); ?>

</body>

</html>
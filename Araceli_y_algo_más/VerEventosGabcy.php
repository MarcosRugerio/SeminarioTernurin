<?php
$dir = opendir('img/eventos/');
while ($f = readdir($dir))
?>

<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<html lang="es">

<head>
    <link href="icono.ico" type="image/x-icon" rel="shortcut icon" />
    <title>Eventos GABCY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel=" shortcut icon" href="img/CGABCY.jpg" type="image/x-icon">
    <script src="js-global/FancyZoom.js" type="text/javascript"></script>
    <script src="js-global/FancyZoomHTML.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/7f4ac6925c.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <style>
        .gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery {
            width: 85%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;

            display: grid;
            grid-template-columns: repeat(auto-fit, 133px);
            grid-auto-rows: 250px;
            justify-content: center;
            gap: 1rem;
        }

        .gallery_item {
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
            grid-column: span 2;
            height: 238px;
            transition: 0.5s filter;
        }


        .gallery_item hover {
            filter: brightness(0.3);
        }

        .gallery_item :first-of-type {
            grid-column: 2 / span 2;
        }



        @media screen and (min-width: 270px) and (max-width: 504px) {
            .gallery_item :first-of-type {
                grid-column: 1 / span 2;
            }

            .gallery {
                grid-auto-rows: 283px;
            }

        }

        @media screen and (min-width: 505px) and (max-width: 685px) {
            .gallery_item :nth-of-type(add) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 686px) and (max-width: 862px) {
            .gallery_item :nth-of-type(3n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 863px) and (max-width: 1038px) {
            .gallery_item :nth-of-type(4n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1039px) and (max-width: 1215px) {
            .gallery_item :nth-of-type(4n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1216px) and (max-width: 1372) {
            .gallery_item :nth-of-type(5n+1) {
                grid-column: 2 / span 2;
            }

        }

        @media screen and (min-width: 1372px) {
            .gallery_item :nth-of-type(7n+1) {
                grid-column: 2 / span 2;
            }

        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }



        @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .section2 {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            padding: 50px;
            position: relative;
            overflow: hidden;
        }

        .section2::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: all 0.4s ease;
        }

        .section2 .active::before {
            opacity: 1;
        }

        .container2 {
            max-width: 800px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            background: #fff;
            padding: 5px 10px;
            position: relative;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }

        .section2 .active .container2 {
            visibility: hidden;
        }





        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(0.5);
        }



        .jumbotron {
            color: #284738;
            background: #dce2df;
            align-items: center;
            height: 150px;

        }

        .evento {

            font-size: 65px;
            font-family: 'Playfair Display', serif;
            color: #CC6645;
            padding: 10px;


        }

        .p {
            font-size: 25px;
            font-family: 'Playfair Display', serif;
            color: #333;
            align-items: center;

        }

        .navbar-inverse {
            background: #284738;
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #e0fff0;
        }

        .navbar-inverse .navbar-brand {
            color: #e0fff0;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>

<body onLoad="setupZoom()">
    <!--
Encabezado de la página */
        */banner, menu, carrusel, cuadro iniciar, cuadro fechas, -->

    <!-- Barra de menu -->
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
                    <input type="search" class="form-control form-control-dark" placeholder="Buscar..." aria-label="Search" id="idbusqueda">

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
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="Menu_empleado.php">Menú Empleado</a></li>
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
    <!--Eventos  -->

    <div class="conteiner2">
        <div class="jumbotron" style="background-color:   #F9ECDC;">
            <h1 class="evento"><i class="fa fa-camera-retro" aria-hidden="true" style="color: #CC6645"></i>Eventos</h1>
            <p class="p">Próximos eventos en nuestra sucursal</p>
        </div>

        <h1>
            <center>
                <script>
                    var f = new Date();
                    document.write(f.getFullYear());
                </script>

            </center>
        </h1>

        <br>

        <main class="gallery">

            <?php
            $fotos  = scandir('img/eventos/');
            foreach ($fotos as $foto) {
                if (str_contains($foto, '.jpg') || str_contains($foto, '.jpeg') || str_contains($foto, '.png')) {
                    $htmlImagen = "<div class=\"gallery_item :nth-of-type \"><div class=\"gallery_item\"><div class=\"Imagen\">

            <a href= \"img/eventos/" . $foto . " \"> <img class=\"zoom\"src= \"img/eventos/" . $foto . " \" /></a>

              </div></div></div>";
                    echo $htmlImagen;
                }
            }

            ?>

    </div>

    </main>
    <br>
    <br>


    <script>
        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transition');
            }, function() {
                $(this).removeClass('transition');
            });
        });
    </script>


    <br>
    <br>
    <!--Creditos  -->
    <?php include("creditos.php"); ?>

   

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

</body>

</html>
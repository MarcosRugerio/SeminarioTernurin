<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Araceli y algo más</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <link rel="stylesheet" href="estilos/estilosLinea.css">
    
    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    H2 {
      font-size: 45px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #CC6645;
      text-decoration: underline;
    }

    H3 {
      font-family: 'Dancing Script', cursive;
      /* */
      font-size: 40px;
    }

    h4 {
      font-family: 'Monserrat', sans-serif;
      font-size: 25px;
      text-align: center;
    }
      .zoom {

        transform: scale(var(--escala, 1));
        transition: transform 0.8s;
      }

      .zoom:hover {
        --escala: 1.5;
        cursor: pointer;
      }

      .puzzle-img {
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.4s;
  }

  .puzzle-img:hover {
    transform: rotate(-2deg) scale(1.05);
  }

  .popup {
    display: none;
    position: fixed;
    z-index: 9999;
    padding-top: 60px;
    left: 0; top: 0;
    width: 100%; height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.8);
  }

  .popup-content {
    margin: auto;
    display: block;
    max-width: 80%;
    max-height: 80vh;
  }

  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
  }
</style>


<body>

<!--Header -->
<nav class="p-3 text-dark" class="navbar" style="background-color: white">

  <!-----Nav con fondo de color y letras blancas
<header class="p-3 text-white" style="background-color:  #CC6645;"> --->
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="img/logotipo_araceli.png" width="150" height="200" alt="" title="Página Principal">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
        >

        <li><a href="index.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
        </li>


        <li>
          <a class="nav-link dropdown-toggle"
            style=" color:#6E0023; display:inline;  border-right: 2px solid  #36642fff"  href=" #"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MENÚ
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuC2.php">Herbales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuF2.php">Nutricionales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuA2.php">Nutricosmenticos</a></li>
          </ul>
        </li>
       <li><a href="blog.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #36642fff;">BLOG</a>
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
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
         >
            <?php
              if (isset ($_SESSION['permiso'])){
                if($_SESSION['permiso']==1){
                echo
                '<li>
                <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
                  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
              '</a>
              <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Cliente...</a></li>
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
               <hr class="dropdown-divider" style="color: #f0cea5">
               <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
            }if($_SESSION['permiso']==2){
              echo
              '<li>
              <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
            '</a>
            <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Empleado...</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="Menu_empleado.php">Menú Empleado</a></li>
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
             <hr class="dropdown-divider" style="color: #f0cea5">
             <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
          }if($_SESSION['permiso']==3){
            echo
            '<li>
            <a class="nav-link dropdown-toggle" style="font-family:Monserrat, sans-serif; color:#6E0023; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">'.$_SESSION['nombre'].
          '</a>
          <ul class="dropdown-menu text-small" style=" font-family:Monserrat, sans-serif;  color: #6E0023;">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" disbled>Administrador...</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="MenuAdmn.php">Menú Administrador</a></li>
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="perfil.php"> Mi Perfil</a></li>
           <hr class="dropdown-divider" style="color: #f0cea5">
           <li><a class="dropdown-item" style=" font-family:Monserrat, sans-serif;  color: #6E0023;" href="destroySesion.php">Cerrar Sesión</a></li>';
        }
          }else{
                ?>
          <li>
            <a class="nav-link dropdown-toggle" style="font-family:'Monserrat', sans-serif; color:#6E0023; " href="#"
              id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/usuario.png" width="25" height="25" title="Cuenta">
            </a>

            <ul class="dropdown-menu text-small" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;" href="inicioSesion.php">Iniciar Sesión</a></li>
              <hr class="dropdown-divider" style="color: #f0cea5">
              <li><a class="dropdown-item" style=" font-family:'Monserrat', sans-serif;  color: #6E0023;" href="registro.php" >Crear Cuenta</a></li>
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

<!-----Carrucel--->
<section>
    <div class="container">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" style="background-color: #333333;" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" style="background-color: #333333;" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" style="background-color: #333333;" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active ">
            <img src="img/BANNER2.png " class="d-block w-100" width="80" height="550">
            <div class="carousel-caption d-none d-md-block text-dark">
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/BANNEREUCALIPTO.png" class="d-block w-100" width="80" height="550">
            <div class="carousel-caption d-none d-md-block text-dark">
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/BANNERSUPLE.png" class="d-block w-100" width="80" height="550">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </div>
  </section>

  <!-- Sección de Video Silencioso -->
<section class="video-section mt-5">
  <div class="container text-center">
    <video autoplay muted loop playsinline width="100%" style="max-height: 1500px; object-fit: cover; border-radius: 10px;">
      <source src="mp4/presentacion.mp4" type="video/mp4">
      Tu navegador no soporta el video HTML5.
    </video>
  </div>
</section>

  <div class="container marketing">

    <!--Categoria--->

    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold">Hechale un viztazo a</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"> </p>
      </div>
      <?php include("categorias.php"); ?>
      <hr class="featurette-divider" style="color:  #CC6645;" size="2">
      <br>
    </div>
    <div>

      <!--Fin de Categoria--->
      <!--IMAGEN  -->

      <section class="content price">

        <article class="contain">
          <br><br>
          <h2 class="display-1" style="color: white;  font-family: 'Playfair Display', serif; ">¿Eres fan del skincare?</h2>
          <h3 class="display-3" style="color: white; ">Tu nueva rutina de cuidado aqui</h3>
          <div class="zoom"  style="overflow:hidden">
          <a class="img2" href="blog.php"><img src="img/gotero.png" width="50" height="50"></a>

          </div>
       
        </article>

      </section>
      <br>
<br>
      <!--INICIO conteiner marketing---->
      <div class="container marketing">

        <div class="row featurette">
          <div class="col-md-7">
            <br>
            <h2 class="featurette-heading">Los famosisimos jabones artesanales
            </h2>
            <br><br>
            <center>
              <h3 class="featurette-heading"><span class="text-muted">Diferentes tipos para diferentes necesidades</span>
              </h3>
              <p class="lead">Están contenidos en cajas elaboradas con papel ecológico fácil de reciclar y con un diseño increíble, y con mensajes especialmente pensados en ti.¡Conocelos!</p>
              <br>
              <p><a class="btn btn-dark fs 4" href="Agregar aqui una URL">Visitarlos&raquo;</a></p>
              </p>
            </center>
          </div>
          <div class="col-md-4">
            <img src="img/banner_jabones.png" width="500" height="500">
          </div>
        </div>
      </div>
      <br>
    </div>
    </div>

    <!-- Galería tipo Rompecabezas -->
<section class="rompecabezas-gallery mt-5">
  <div class="container text-center">
    <h2 class="mb-4" style="font-family: 'Playfair Display', serif; color: #0f0f0fff;">Una lectura rápida</h2>
    <div class="row g-3 justify-content-center">
      <div class="col-6 col-md-4 col-lg-3">
        <img src="img/flotar1.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)">
      </div>
      <div class="col-6 col-md-4 col-lg-3">
        <img src="img/flotar2.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)">
      </div>
      <div class="col-6 col-md-4 col-lg-3">
        <img src="img/flotar3.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)">
      </div>
      <div class="col-6 col-md-4 col-lg-3">
        <img src="img/flotar4.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)">
      </div>
      <div class="col-6 col-md-4 col-lg-3">
        <img src="img/flotar5.png" class="img-fluid puzzle-img" onclick="openPopup(this.src)">
      </div>
    </div>
  </div>

  <br>
  <br>

  <!-- Popup -->
  <div id="popup" class="popup" onclick="closePopup()">
    <span class="close">&times;</span>
    <img class="popup-content" id="popup-img">
  </div>
</section>

<script>
  function openPopup(src) {
    document.getElementById("popup").style.display = "block";
    document.getElementById("popup-img").src = src;
  }

  function closePopup() {
    document.getElementById("popup").style.display = "none";
  }
</script>



<!--Creditos -->
<?php include("creditos.php");?>

    </div>
  </footer>
</body>

</html>
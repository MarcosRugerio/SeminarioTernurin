<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>

<?php include "php/conexion.php"
?>

<!--Opciones del empleado Gabcy -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <link rel="shortcut icon" href="img/logotipo_araceli.png">
    <script type="text/javascript" src="librerias/jquery.js"></script>
     <script type="text/javascript" src="js/main-scripts.js"> </script>

</head>

<style>
/* Tipografía */
body {
  font-family: 'Poppins', sans-serif;
  background: #fff;
  margin: 0;
  padding: 0;
}

/* Contenedor principal */
.menu-container {
  text-align: center;
  padding: 20px;
  max-width: 1000px;
  margin: auto;
}

/* Título */
.menu-container .titulo {
  font-size: 2.5rem; /* más grande */
  margin-bottom: 50px;
  color: #222;
  font-weight: 700;
}

/* Contenedor de items */
.menu-items {
  display: flex;
  justify-content: center;
  gap: 70px; /* más espacio entre opciones */
  flex-wrap: wrap;
}

/* Tarjetas de menú */
.menu-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  transition: transform 0.3s, color 0.3s;
}

/* Imágenes circulares más grandes */
.menu-card img {
  width: 150px;          /* más grande */
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  background: #f0f0f0;
  padding: 15px;
  margin-bottom: 18px;
  transition: transform 0.3s;
  box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
}

/* Texto más grande */
.menu-card span {
  font-size: 1.4rem; /* más grande */
  font-weight: 600;
  color: #333;
  letter-spacing: 0.5px;
}

/* Hover */
.menu-card:hover {
  transform: translateY(-8px);
}

.menu-card:hover img {
  transform: scale(1.1);
}

.menu-card:hover span {
  color: #555;
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
            <li><a class="dropdown-item" style="color: #6E0023;" href="productos_herbales.php">Herbales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="productos_nutricionales.php">Nutricionales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="productos_nutricosmeticos.php">Nutricosmenticos</a></li>
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
          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            
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

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<div class="menu-container">
  <h1 class="titulo">Menú</h1>

  <div class="menu-items">
    <a href="menu_registrosventa.php" class="menu-card">
      <img src="img/icons/ventas.png" alt="Registrar Ventas">
      <span>Registrar Ventas</span>
    </a>

    <a href="Ver_ventas.php" class="menu-card">
      <img src="img/icons/verventas.png" alt="Ver Ventas">
      <span>Ver Ventas</span>
    </a>

    <a href="Ver_pedidos.php" class="menu-card">
      <img src="img/icons/pedidos.png" alt="Ver Pedidos">
      <span>Ver Pedidos</span>
    </a>
  </div>
</div>

  
                <!--Footer -->
<?php include("creditos.php");?> 

</body>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>
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
  <title>Cambiar permisos</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="img/Gabcy_vector.png">
    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

</head>

<style>
  .titulo{ 
      font-size: 45px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #CC6645;
      text-decoration: underline;
  }
    .price {
        background: url(img/local.jpg) no-repeat center;
        background-attachment: fixed;
        background-size: cover;
        text-align: center;
        height: 400px;
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

    .containerCredi {
        background-color: #333333;
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

    .feature-icon {
        width: 4rem;
        height: 4rem;
        border-radius: .75rem;
    }

    .container{
        text-align: left;
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
        <img src="img/Gabcy_cafeteria.png" width="150" height="120" alt="" title="Página Principal">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
        >

        <li><a href="index.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5">INICIO</a>
        </li>


        <li>
          <a class="nav-link dropdown-toggle"
            style=" color:#6E0023; display:inline;  border-right: 2px solid  #f0cea5"  href=" #"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MENÚ
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuC2.php">Bebidas Calientes</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuF2.php">Bebidas Frías</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuA2.php">Alimentos</a></li>
          </ul>
        </li>
        <li><a href="VerEventosGabcy.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5;">EVENTOS</a>
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

      <div class="dropdown text-end">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
         >

         <a href="carrito.php" class="btn" style="font-family:'Monserrat', sans-serif;">
          Mi Carrito <span style="background:#6E0023; color:white;" id="num_cart" class="badge text-bg-secondary"><?php echo $num_cart; ?></span>
        </a>
            
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

 <!----- INVENTARIO --->


  <div class="px-4 py-3 my-3 text-center">
    <h1 class="titulo">Cambiar permisos</h1><br>
    <img class="d-block mx-auto mb-4" src="img/cambiar.png" alt="" width="110" height="110">


<div class="container" >
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
             
             <ul class=" mx-auto mb-2 mb-lg-0">      
             
             <form action="php/cambios_permisos.php" method="POST">

                          <?php 
                            require_once "php/conexion.php";
                            $conexion=conexion();

                            $idpermisouser = $_GET['id'];
                            $idpermiso = $_GET['id2'];

                            //información de la tabla 
                            $query1 = ("Select * from permisos where usuario_id='$idpermisouser' and idpermiso='$idpermiso' ");
                            $result1 = mysqli_query($conexion, $query1);

                              //analiza fila x fila
                            if (mysqli_num_rows($result1) > 0) {
                            while ($rowData = mysqli_fetch_array($result1)){ 

                              if ($rowData["estadopermiso"]==0) {
                                $estado="Inactivo";

                              }elseif ($rowData["estadopermiso"]==1) {
                                $estado="Activo";
                              }
                              ?>

                  <input class="form-control me-2" type="hidden" value="<?php echo $rowData["idpermiso"]?>" name="idpermiso1"> 


                   <h5 class="display-7 fw-normal me-2">Nombre del permiso</h5> 
                   <input class="form-control me-2" type="text" value="<?php echo $rowData["nombrepermiso"]?>" name="nombrep" readonly> 
              <br>
                   
              <h5 class="display-7 fw-normal me-2">Código del usuario:</h5> 
                   <input class="form-control me-2" type="text" value="<?php echo $rowData["usuario_id"]?>" name="usuarioid" readonly> 
              <br>
                   <h5 class="display-7 fw-normal me-2">Permiso:</h5> 
                  <input class="form-control me-2" type="text" value="<?php echo $rowData["idpermiso"]?>" name="permiso2" readonly>
               <br>

               <h5 class="display-7 fw-normal me-2">Estado del permiso:</h5> 
                   <select border-radius: 9px; input class="form-control me-2" type="text" placeholder="Ingrese su presentación" name="edopermiso" style="text-transform:uppercase;" required value>
                                                                        <option><?php echo $estado ?></option>
                                                                        <option>Inactivo</option>
                                                                        <option>Activo</option>
                  </select>
               <br>

               <?php 
                }}
               ?>
               <center> <button  type="submit" class="btn btn-outline-dark"  name="uploadBtn" >Guardar</button></center><br>
            </form>
           
             </ul>  



            </div>
</div>

<!----- PENDIENTE --->
<!----- se hacen los cambios MODIFICAR --->
<div>
  </div> <!----- /PENDIENTE --->

  </div> <!----- INVENTARIO--->
                </div>
                <!--Footer -->
<?php include("creditos.php");?> 

</body>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>
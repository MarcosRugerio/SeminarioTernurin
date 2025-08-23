<?php include "php/conexion.php"

?>

<?php error_reporting(0); ?>

<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>


<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT( productos.codigo, '..',  productos.nombre, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualización de ventas</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/logotipo_araceli.png">
  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>

</head>
<style>
   /* Tipografía general */
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
      color: #111;
      margin: 0;
      padding: 0;
    }

    /* Título */
    .titulo {
      font-size: 48px;
      text-align: center;
      font-family: 'Merriweather', serif;
      color: #111;
      text-transform: uppercase;
      margin-bottom: 20px;
      letter-spacing: 2px;
    }

    /* Numeración de pasos */
    .paso {
      font-weight: 700;
      font-size: 1.2rem;
      margin-right: 10px;
      color: #111;
    }

    /* Inputs y selects */
    form .form-control {
      border-radius: 10px;
      border: 2px solid #111;
      font-size: 1rem;
      padding: 8px;
      transition: all 0.3s ease;
    }

    form .form-control:focus {
      border-color: #cfcdbeff;
      box-shadow: 0 0 8px rgba(224, 221, 200, 0.8);
    }

    /* Botones */
    button, .btn {
      font-family: 'Merriweather', serif;
      font-weight: bold;
      letter-spacing: 1px;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
    }

    button:hover, .btn:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    /* Tabla en dorado con efecto 3D */
    .tablaventas {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      border-radius: 15px;
      overflow: hidden;
    }

    .tablaventas thead {
      background: linear-gradient(45deg, #FFD700, #C9A400);
      color: #111;
      font-size: 1.2rem;
      text-transform: uppercase;
    }

    .tablaventas th, 
    .tablaventas td {
      border: none;
      padding: 14px 18px;
      text-align: center;
      font-size: 1rem;
      font-weight: 500;
    }

    .tablaventas tbody tr:nth-child(even) {
      background-color: #f6f6f6;
    }

    .tablaventas tbody tr:hover {
      background: rgba(255, 215, 0, 0.2);
      transform: scale(1.01);
      transition: 0.3s;
    }

    /* Total con diseño */
    .total-box {
      background: #111;
      color: #FFD700;
      padding: 15px 30px;
      border-radius: 15px;
      font-size: 1.6rem;
      font-weight: bold;
      display: inline-block;
      margin-top: 20px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.4);
    }

/* Contenedor del botón */
.back-to-shop {
  display: inline-block;
  margin: 20px 0;
}

/* Estilo del enlace */
.back-to-shop .a2 {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 20px;
  background: #e0e0e0;         /* gris */
  color: #333;
  font-weight: 600;
  text-decoration: none;
  border-radius: 50px;         /* esquinas redondeadas tipo pill */
  box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
  transition: transform 0.6s ease, background 0.3s, color 0.3s;
  transform-style: preserve-3d; /* necesario para el efecto espejo */
}

/* Texto dentro */
.back-to-shop .a2 span {
  font-size: 1rem;
}

/* Hover con animación espejo */
.back-to-shop .a2:hover {
  background: #ccc;
  color: #000;
  transform: scaleX(-1);  /* efecto espejo horizontal */
}

/* Como el flip invierte todo, re-invertimos el texto para que sea legible */
.back-to-shop .a2:hover span {
  transform: scaleX(-1);
  display: inline-block;
}

.tablaventas-simple {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.9rem;
}

.tablaventas-simple th,
.tablaventas-simple td {
  border: 1px solid #ccc;
  padding: 4px 8px;
  text-align: left;
}

.tablaventas-simple th {
  background-color: #f5f5f5;
  font-weight: 500;
}

.tablaventas-simple td {
  background-color: #fff;
}
</style> <!--ESTILOS TABLA-->

<body>

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

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            <li><a href="index.php" class="nav-link px-3 text" style="color: #6E0023; display:inline; border-right: 2px solid  #36642fff">INICIO</a>
            </li>


            <li>
              <a class="nav-link dropdown-toggle" style=" color:#6E0023; display:inline;  border-right: 2px solid  #36642fff" href=" #" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MENÚ
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" style="color: #6E0023;" href="productos_herbales.php">Herbales</a></li>
                <li><a class="dropdown-item" style="color: #6E0023;" href="productos_nutricionales.php">Nutricionales</a></li>
                <li><a class="dropdown-item" style="color: #6E0023;" href="productos_nutricosmeticos.php">Nutricosmenticos</a></li>
                <li>
                  <hr class="dropdown-divider" style="color: #f0cea5">
                </li>
                <li><a class="dropdown-item" style="color: #6E0023;" href="#">Extras</a></li>
              </ul>
            </li>
           <li><a href="blog.php" class="nav-link px-3 text" style="color: #6E0023; display:inline; border-right: 2px solid  #36642fff;">BLOG</a>
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
    <!----- Ver ventas REGISTRADAS --->
<div class="px-4 py-3 my-3 text-center">
  <h1 class="titulo">Ver ventas</h1>
  <img class="d-block mx-auto mb-4" src="img/icono_ventas.png" alt="" width="110" height="110">
  <br>

    <?php
  // ALERTAS DE ESTADO
  if (isset($_GET["status"])) {
      $mensaje = "";
      $tipo = "";

      switch($_GET["status"]) {
          case "1":
              $mensaje = "¡Correcto! Venta eliminada"; 
              $tipo = "success";
              break;
          case "2":
              $mensaje = "Error al eliminar la venta";
              $tipo = "danger";
              break;
      }
  ?>
  <div class="alert alert-<?php echo $tipo ?> alert-dismissible fade show" role="alert">
      <?php echo $mensaje; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php } ?>

  <div class="datosP">
    <div class="D1">
      <div class="table-responsive">
        <table class="tablaventas">
          <thead>
            <tr>
              <th>Número</th>
              <th>Fecha</th>
              <th>Productos vendidos</th>
              <th>Total</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($ventas as $venta){ ?>
            <tr>
              <td><?php echo $venta->id ?></td>
              <td><?php echo $venta->fecha ?></td>
              <td>
                <div class="table-responsive">
                  <table class="tablaventas-simple">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                      $producto = explode("..", $productosConcatenados) ?>
                      <tr>
                        <td><?php echo $producto[0] ?></td>
                        <td><?php echo $producto[1] ?></td>
                        <td><?php echo $producto[2] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </td>
              <td><?php echo $venta->total ?></td>
              <td>
                <a class="btn btn-danger" 
                href="<?php echo 'eliminarVenta.php?id=' . $venta->id ?>" 
                onclick="return confirmarEliminar();">
                <i class="fa fa-trash"></i>
              </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <center>
        <br>
        <div class="back-to-shop" onclick="regresar()">
          <a class="a2" href="VerVentasClientes.php">&leftarrow; <span>Regresar</span></a>
        </div>
      </center>
    </div>
  </div>
</div>


    <!----- Fin de ver ventas REGISTRADAS --->
    <!--Footer -->
    <?php include("creditos.php"); ?>

  </body>
  
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
function confirmarEliminar() {
    return confirm("¿Estás seguro de que deseas eliminar esta venta?");
}
</script>

 
</html>
<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
?>


<!--Registro Gabcy -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Gabcy</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" type="text/css" href="estilos/estilosRegistro.css">

  <script type="text/javascript" src="js/pass.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">

  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>

  <link rel="shortcut icon" href="img/Gabcy_vector.png">

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

  <!-- Registro -->
  <div class="container">
    <div class="row ">
      <div class="col-lg-10 col-xl-9 mx-auto ">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden form2">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <header class="head-form">
              <h2>Registrate</h2>
              <p>Porfavor ingresa todos tus datos correctos para registrarte</p>
            </header>
            <form action="php/registro.php" method="POST">

              <?php
              if (isset($_GET['e'])) {
                switch ($_GET['e']) {
                  case '1':
                    echo '<div class="alert alert-danger" role="alert">
                        Falla del servidor
                      </div>';
                    break;
                  case '2':
                    echo '<div class="alert alert-danger" role="alert">
                          Este Correo ya esta registrado, Verifica e intenta nuevamente
                        </div>';
                    break;
                  case '3':
                    echo '<div class="alert alert-danger" role="alert">
                          Las Contraseñas no coinciden, Verifica e intenta devueno
                        </div>';
                    break;
                  default:
                    break;
                }
              }
              ?>

              <div class="field-set">
                <span class="input-item">
                  <i class="fa-solid fa-user"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Nombre(s)" required name="nombre">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-users"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Apellido(s)" required name="apellido">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="@Correo" required name="correo">
                <br>
                <span class="input-item">
                  <i class="fa fa-key"></i>
                </span>
                <input class="form-input2" type="password" placeholder="Contraseña" id="passwordV1" required name="contra">
                <span>
                  <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="Mostrar()"></i>
                </span>
                <br>
                <span class="input-item">
                  <i class="fa fa-key"></i>
                </span>
                <input class="form-input2" type="password" placeholder="Repite la Contraseña" id="passwordV2" required name="contra2">
                <span>
                  <i class="fa fa-eye" aria-hidden="true" type="button" id="eye" onclick="Mostrar2()"></i>
                </span>
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-phone"></i>
                </span>
                <input class="form-input2" id="txt-input" type="textarea" placeholder="Número telefonico" required name="telefono">
                <br>
                <span class="input-item">
                  <i class="fa-solid fa-house-user"></i>
                </span>
                <input class="form-input2" id="txt-input" type="text" placeholder="Dirección Completa" required name="domicilio">
                <br>
                <br><br>
                <div>
                  <!--Terminos y Condiciones-->
                  <p><input type="checkbox" name="File" required>"He leído y Acepto" las <a href="#ex1" data-bs-toggle="modal" data-bs-target="#exampleModal">Políticas de privacidad.</a></p>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso de Privacidad</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Te invitamos a que leas detenidamente los presentes términos y condiciones antes de utilizar el sitio www.copil.com, ya que al entrar confirmas tu entendimiento con los mismos.
                          Si no aceptas estos términos y condiciones de uso, no podrás utilizar este sitio.
                          USO DE WWW.GABCY.COM <br>
                          Para poder utilizar el sitio www.copil.com debes tener por lo menos 18 años de edad.
                          El uso comercial o el nombre de terceros están prohibidos, salvo lo expresamente permitido por nosotros con anterioridad, cualquier infracción de estos términos y condiciones dará lugar a la revocación inmediata de la licencia otorgada en este apartado, sin previo aviso.
                          Ciertos servicios y características relacionadas con los mismos, pueden estar disponibles en el sitio www.copil.com y pueden requerir el registro, si decides registrarte a nuestros servicios o funciones relacionadas, te comprometes a proporcionar información precisa y actualizada acerca de ti mismo.
                          <br>
                          LAS COMUNICACIONES DEL USUARIO<br>
                          Cualquier comunicación que envíes al sitio web www.copil.com, incluyéndose de forma enunciativa más no limitativa, preguntas, críticas, comentarios, sugerencias, se convertirán en nuestra propiedad y no serán devueltos, salvo que medie orden judicial para tal efecto, asimismo cuando remitas comentarios o críticas al sitio, también nos concedes el derecho a utilizar el nombre que envíes, únicamente en el marco de dicha revisión, comentario, o cualquier otro contenido; por último, cabe mencionar que, no debes de usar una dirección de correo electrónico falsa, es decir, pretender ser alguien que no eres.
                          <br>PROTECCIÓN DE DATOS<br>
                          Los datos proporcionados por el cliente son protegidos de acuerdo a nuestro aviso de privacidad, publicado en www.copil.com
                          Copil NO se responsabiliza por la certeza de los datos personales de sus usuarios. Los usuarios garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de sus datos personales.
                          Copil se reserva el derecho de solicitar algún comprobante y/o dato adicional a efecto de corroborar los Datos Personales.
                          Como parte del proceso para completar el formulario de inscripción, para poder utilizar su cuenta en este sitio, así como realizar cualquier función en el sitio o hacer uso de los servicios, el usuario autoriza como medios de autentificación aquellos medios electrónicos, tales como número de identificación personal, huella digital, firma electrónica o cualquier otro que determine Copil.
                          <br><br>CONTACTO:
                          clientes@gabcy.com.mx
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <center><button class=" button2 log-in" type="submit">REGISTRARME</button></center>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Creditos  -->
  <?php include("creditos.php"); ?>

</body>

</html>
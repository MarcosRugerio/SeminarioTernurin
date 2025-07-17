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

  <link rel="shortcut icon" href="img/CGABCY.jpg">

  <script type="text/javascript" src="js/main-scripts.js"> </script>
  <script type="text/javascript" src="librerias/jquery.js"></script>


  <style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    H2 {


      font-size: 45px;
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #CC6645;
      text-decoration: underline;
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
  <!---Cuerpo-->
  <h2>Terminos y Condiciones</h2>
  <div class="container marketing">

    <hr class="featurette-divider" style="color: #FFB28C;" size="2">
    <p class="text fw-lighter ">
      Te invitamos a que leas detenidamente los presentes términos y condiciones antes de utilizar el sitio www.copil.com, ya que al entrar
      confirmas tu entendimiento con los mismos. Si no aceptas estos términos y condiciones de uso, no podrás utilizar este sitio.
      <mark>USO DE WWW.GABCY.COM</mark>


    </p>
    <p class="text fw-lighter ">
      Para poder utilizar el sitio www.gabcy.com debes tener por lo menos 18 años de edad. El uso comercial o el nombre de terceros están
      prohibidos, salvo lo expresamente permitido por nosotros con anterioridad, cualquier infracción de estos términos y condiciones dará lugar a la revocación inmediata de la licencia otorgada en este apartado, sin previo aviso. Ciertos servicios y características relacionadas con los mismos, pueden estar disponibles en el sitio www.gabcy.com y pueden requerir el registro, si decides registrarte a nuestros servicios o <mark>LAS COMUNICACIONES DEL USUARIO</mark>
      Cualquier comunicación que envíes al sitio web www.copil.com, incluyéndose de forma enunciativa más no limitativa, preguntas, críticas, comentarios, sugerencias, se convertirán en nuestra propiedad y no serán devueltos, salvo que medie orden judicial para tal efecto, asimismo cuando remitas comentarios o críticas al sitio, también nos concedes el derecho a utilizar el nombre que envíes, únicamente en el marco de dicha revisión, comentario, o cualquier otro contenido; por último, cabe mencionar que, no debes de usar una dirección de correo electrónico falsa, es decir, pretender ser alguien que no eres.

    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      POLÍTICAS DE CANCELACIÓN
    </p>

    <p class="text  fw-lighter">
      Para poder solicitar la cancelación de una compra es necesario que te comuniques a nuestro centro de atención al cliente: 56-1260-3194
      dentro de las 10 minutos naturales a partir de la creación del pedido, éste sólo podrá ser cancelado si no ha sido enviado a cocina.
      En caso de retracto, GABCY no realizará el reembolso de los costos de envío del producto. El consumidor entiende y acepta que el asume la totalidad del fete de retracto.*
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      POLÍTICAS DE ACCESSO
    </p>

    <p class="text  fw-lighter">
      En Gabcy nos reservamos el derecho a restinguir el acceso <mark> restinguir el acceso</mark> a las instalaciones a personas que presenten comportamientos
      inapropiados e inmorales diriguidos a otros comensales o la nuestros trabajadores, tales actos inapropiados pueden ser:
    </p>
    <p class="text  fw-lighter">
      - Acoso sexual
    </p>
    <p class="text  fw-lighter">
      - Insultos a comensales o trabajador@s
    </p>
    <p class="text  fw-lighter">
      - Violencia presentada durante su intancia en el local.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      RESPONSABILIDAD
    </p>
    <p class="text  fw-lighter">
      Hay casos en los cuales una orden de compra pudiera no ser procesada por circunstancias ajenas a nosotros y las cuales no pueden ser previstas, circunstancias en las cuales interviene la fuerza mayor o el caso fortuito, en ese sentido www.gabcy.com informará al cliente de inmediato el motivo por el cual no fue posible procesar una orden, restituyendo cualquier cantidad cobrada al suscriptor, dejando claro que en este proceso se puede pedir información adicional para completar el proceso de reembolso. Asimismo se refere que todos los productos ofertados en el sitio www.gabcy.com, están sujetos a disponibilidad y se ofrecen a nuestros suscriptores hasta agotar existencias, por lo que puede darse el caso que un mismo producto pueda ser adquirido por varios clientes a la vez y al fnal del proceso de venta resulte que el producto ya no se encuentre disponible por haberse agotado aún y cuando aparezca en el sitio www.copil.com, en cuyo caso se le informará al suscriptor de tal situación, procediendo al reembolso de cualquier cantidad pagada por el producto adquirido si es el caso, o bien se le notificará de la imposibilidad de procesar la orden de compra.
    </p>
    <p class="text  fw-lighter">
      En caso de cumplirse el supuesto expuesto en el párrafo anterior para efectuar el reembolso de una orden de compra, deberá escogerse un único medio de reembolso mediante el cual realizar la devolución del dinero, el cual podrá ser a elección del cliente a través de: transferencia bancaria o reversión de pago a la tarjeta de crédito.
      Asimismo, una vez se haya realizado el reembolso, los suscriptores deberán enviar a “GABCY” el comprobante del reembolso entregado por el respectivo banco o cualquier documentación que acredite que se hizo efectivo dicho reembolso. Esta documentación deberá enviarse al correo electrónico ventasenlinea@gabcy.com.mx o en nuestra sucursale.
    <p class="text fw-lighter ">
      El suscriptor, antes de la compra del producto, debe aceptar las condiciones particulares de venta, siendo el caso que los presentes términos y condiciones generales podrán verse adicionados, limitados o modificados en función de las correspondientes condiciones particulares de venta del producto de que se trate. En caso de conflicto o contradicción en los presentes términos y condiciones y las condiciones particulares de venta, estas últimas prevalecerán sobre las primeras, en consecuencia el suscriptor debe leer con atención además de los presentes términos y condiciones, las condiciones particulares de venta, las cuales se entenderán aceptadas en el momento que el suscriptor proceda a la compra del producto.
    </p>
    <p class="text  fw-lighter">
      Todas las ofertas de venta, comunicaciones, solicitudes de información, entre otros, se realizan a través de la página de E-Commerce http://www.gabcy.com y/o del correo clientes@gabcy.com.mx, mi representada no será responsable de comunicaciones que se envíen fuera de este sitio, asimismo tampoco será responsable por depósitos en efectivo, transferencias o pagos mediante tarjetas de crédito que hagan los suscriptores a cuentas diversas a las autorizadas en la compra de productos, refiriéndose que jamás se hacen solicitudes de depósito a cuentas de particulares
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      PROTECCIÓN DE DATOS

    </p>
    <p class="text  fw-lighter">
      Los datos proporcionados por el cliente son protegidos de acuerdo a nuestro aviso de privacidad, publicado en www.gabcy.com GABCY NO se responsabiliza por la certeza de los datos personales de sus usuarios. Los usuarios garantizan y responden, en cualquier caso,
      de la veracidad, exactitud, vigencia y autenticidad de sus datos personales.
    </p>

    <p class="text fw-lighter">
      Cafeteria GABCY se reserva el derecho de solicitar algún comprobante y/o dato adicional a efecto de corroborar los Datos Personales.
      Como parte del proceso para completar el formulario de inscripción, para poder utilizar su cuenta en este sitio, así como realizar cualquier
      función en el sitio o hacer uso de los servicios, el usuario autoriza como medios de autentificación aquellos medios electrónicos, tales como número de identificación personal, huella digital, firma electrónica o cualquier otro que determine GABCY.

    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      POLÍTICA DE COMPRA
    </p>
    <p class="text  fw-lighter">
      Los precios de los productos, servicios, promociones, disponibilidad y fecha de venta efectiva en este sitio, pueden diferir de los dados a conocer en sucursales. Los precios de compra son en pesos mexicanos. Los precios exhibidos son válidos únicamente para compras realizadas en la página web www.gabcy.com
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      FACTURACIÓN
    </p>

    <p class="text  fw-lighter">
      Los suscriptores que adquieran productos podrán solicitar la factura de los mismos al momento de realizar la compra directamente en la
      página www.gabcy.com

    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      ENVÍOS DE PRODUCTO
    </p>

    <p class="text  fw-lighter">
      Por el momento los envíos de nuestros productos son gratis y a través de la paquetería interna, el tiempo estimado para envío de tus productos es de 1 hora una vez recibida tu confirmación de compra y será enviado al domicilio que registraste en tu cuenta al momento de hacer la compra.
    </p>


    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      REEMBOLSO DE DINERO
    </p>

    <p class="text  fw-lighter">
      Una vez que hemos recibido el producto o se haya entregado a la sucursal y se confirme la entrega del mismo, se procederá a realizar el reembolso, y este se verá reflejado 72 hrs posteriores a la confirmación de recepción del producto.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      RESTRICCIONES DE DEVOLUCIONES
    </p>
    <p class="text  fw-lighter">
      Para poder devolver cualquier compra, el cliente debe de cumplir con los siguientes requisitos:
    </p>
    <p class="text fw-lighter fs-6">
      · La pieza deberá de estar en las mismas condiciones en que fue enviada.
    </p>
    <p class="text  fw-lighter fs-6">
      · La pieza no deberá de contar con ninguna señal de haber sido manipulada o que su uso haya sido fuera de las especificaciones.
    </p>
    <p class="text fw-lighter fs-6">
      · Deberá de estar dentro de los 2 días hábiles posteriores de haber recibió la pieza.
    </p>

    <br>
    <hr class="featurette-divider" style="color: #FFB28C;" size="2">

  </div>
  <!--Header -->
  <?php include("creditos.php"); ?>

</body>

</html>
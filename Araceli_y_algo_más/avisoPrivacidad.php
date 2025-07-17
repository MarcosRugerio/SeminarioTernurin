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
      <button type="button" class="btn ">Buscar</button>
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

  <h2>Aviso de privacidad</h2>

  <div class="container marketing">
    <hr class="featurette-divider" style="color:  #CC6645;" size="2">
    <p class="text fw-lighter ">
      “Cafeteria GABCY””, con domicilio ubicado en Calle Miguel Hidalgo 18, Cañada de Cisneros, CP 54650. EdoMex, suscribe el presente aviso de privacidad en cumplimiento con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (en lo sucesivo la “Ley”). Los datos personales que usted (en lo sucesivo “el Titular”) ha proporcionado directamente, a través de medios electrónicos o en papel a “Cafeteria GABCY” (En lo sucesivo “el Responsable”), han sido recabados y serán tratados por “Cafeteria GABCY” bajo los principios de licitud, consentimiento, información, calidad, finalidad, lealtad, proporcionalidad y responsabilidad, de conformidad con lo dispuesto por la Ley.
      En “Cafeteria GABCY”, respetamos la privacidad de nuestros usuarios y estamos totalmente comprometidos con la protección de su información personal. Este aviso describe cómo podemos recopilar y utilizar información personal, así como los derechos y opciones disponibles para nuestros visitantes y usuarios con respecto a dicha información.
    </p>
    <p class="text fw-lighter ">
      Recomendamos lea este aviso y se asegure estar de acuerdo con ella, antes de acceder a o utilizar cualquiera de nuestros servicios. Si no lee, entiende completamente y está de acuerdo con este aviso, debe salir inmediatamente de este sitio web, aplicación o servicio y evitar o suspender todo uso de cualquiera de nuestras plataformas.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">

      ¿QUÉ TIPO DE INFORMACIÓN RECIBIMOS, RECOPILAMOS Y ALMACENAMOS?
    </p>

    <p class="text  fw-lighter">
      Podremos recopilar información o datos personales sensibles acerca de nuestros Visitantes y Usuarios:
      Datos que el usuario nos proporciona podremos recopilar diferentes datos del usuario o sobre este, en función de cómo utilice los servicios. A continuación, se muestran algunos ejemplos para ayudar al usuario a comprender mejor los datos que recopilamos.
      Al crear una cuenta o utilizar los servicios, incluido a través de una plataforma de terceros, podremos recopilar los datos que el usuario nos proporciona directamente, lo que incluye:
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">Datos de la cuenta: </p>
    <p class="text  fw-lighter">
      Al crear o actualizar la cuenta del usuario, recopilamos y almacenamos los datos que el usuario nos proporciona, como su dirección de correo electrónico y contraseña
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;"> Contenido compartido:</p>
    <p class="text fw-lighter">
      Algunas partes de los Servicios permiten al usuario compartir contenido públicamente, por ejemplo, al publicar reseñas en la página de un curso, al participar en foros o al publicar fotografías u otro trabajo que el usuario cargue. Dicho contenido compartido podrá estar visible públicamente para otros usuarios en función del lugar donde se publique.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">Comunicaciones y asistencias: </p>
    <p class="text  fw-lighter">
      Si el usuario se pone en contacto con nosotros para solicitar asistencia o informar de un problema o inquietud, recopilaremos y almacenaremos su información de contacto, mensajes y otros datos sobre el usuario, como su nombre, dirección de correo electrónico, ubicación, sistema operativo, dirección IP y cualquier otro dato que nos proporcione o que recopilemos a través de medios automatizados (que tratamos a continuación). Utilizamos estos datos para responder al usuario e investigar su duda o inquietud, de conformidad con esta Política de privacidad.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">Datos de sistema:</p>
    <p class="text fw-lighter">
      Datos técnicos sobre el equipo o dispositivo del usuario, como la dirección IP, el tipo de dispositivo, el tipo y la versión del sistema operativo, el identificador único del dispositivo, el navegador, el idioma del navegador, el dominio y otros datos del sistema, y los tipos de plataformas.
    </p>
    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">Datos de uso: </p>
    <p class="text  fw-lighter">
      Estadísticas de uso sobre las interacciones del usuario con los Servicios, el tiempo empleado en las páginas o el Servicio, las páginas visitadas, las funciones utilizadas, las consultas de búsqueda, los datos sobre los clicks, la fecha y la hora.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      ¿POR QUÉ RECOPILAMOS ESTA INFORMACIÓN?
    </p>
    <p class="text  fw-lighter">
      Recopilamos dicha información personal y no personal para los siguientes propósitos:

    </p>
    <p class="text fw-lighter fs-6">
    • Para proporcionar y operar los servicios y productos que pudieran llegar a ser o hayan sido solicitados.
    </p>
    <p class="text  fw-lighter fs-6">
    • Llevar a cabo la adquisición de los derechos o productos relacionados con los mismos.
    </p>
    <p class="text fw-lighter fs-6">
 
    • Llevar a cabo el análisis de líneas de crédito solicitadas por el Titular.
    </p>
    <p class="text fw-lighter fs-6">
    • Para proporcionar a nuestros Usuarios asistencia continua al cliente y soporte.
    </p>
    <p class="text  fw-lighter fs-6">
    • Para poder contactar a nuestros visitantes y usuarios con avisos generales y personalizados relacionados con el servicio y mensajes promocionales.
    </p>
    <p class="text fw-lighter fs-6">
    • Para crear datos estadísticos agregados y otra información no personal agregada y / o deducida, que nosotros o nuestros socios comerciales podamos utilizar para proporcionar y mejorar nuestros servicios respectivos.
    </p>
   <p class="text fw-lighter fs-6">
   • Para cumplir con las leyes y regulaciones aplicables
   </p> 

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      ¿CÓMO NOS COMUNICAMOS CON LOS VISITANTES DE LA WEB?
    </p>
    <p class="text  fw-lighter">
      Podemos comunicarnos contigo para notificarte sobre tu cuenta, para solucionar problemas con tu cuenta, resolver una disputa, para sondear tus opiniones a través de encuestas o cuestionarios, para enviar actualizaciones sobre nuestra empresa, promociones, o cuando sea necesario para contactarte, nos comunicaremos contigo por correo electrónico.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      CONTENIDO Y USO
    </p>
    <p class="text  fw-lighter">
      El Usuario queda informado, y acepta, que el acceso a esta página web, no supone el inicio de una relación comercial con “Punta del Cielo”, o con cualquiera de sus empresas filiales, quienes se reservan el derecho de efectuar sin previo aviso cuantas modificaciones vean oportunas en la misma, cambiando, eliminando o añadiendo contenidos y/o servicios prestados vía web a través de la misma, así como la forma en la que éstos aparezcan.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      PROPIEDAD INDUSTRIAL E INTELECTUAL
    </p>
    <p class="text  fw-lighter">
      Todos los elementos de esta web (incluyendo textos, imágenes, etc.) son titularidad de “Cafeteria GABCY” o de terceros que le han dado permiso para su uso, al igual que el logo, y cualesquiera otros contenidos protegidos como propiedad industrial.
      Salvo que expresamente se indique lo contrario, queda prohibida cualquier modalidad de explotación, reproducción, distribución, comunicación pública o trasformación sin la autorización expresa y por escrito de “Cafeteria GABCY” y empresas filiales, o lo dispuesto en las Condiciones de Uso para usuarios registrados.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      ACTUALIZACIONES DE LA POLÍTICA DE PRIVACIDAD
    </p>

    <p class="text  fw-lighter">

      Nos reservamos el derecho de modificar o actualizar esta política de privacidad en cualquier momento, por lo tanto, revísala con frecuencia. Los cambios y aclaraciones tendrán efecto inmediatamente después de su publicación en la página web. Las modificaciones que se efectúen se pondrán a disposición del público a través de anuncios visibles en nuestros establecimientos, o vía nuestra página de internet.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      LEGISLACIÓN APLICABLE

    </p>

    <p class="text  fw-lighter">

      Con carácter general las relaciones entre “Cafeteria GABCY” con los usuarios de sus servicios telemáticos, presentes en esta web, se encuentran sometidas a la legislación y jurisdicción de los Estados Unidos Mexicanos.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">

      CONTENIDO Y USO
    </p>

    <p class="text  fw-lighter">
      El Usuario queda informado, y acepta, que el acceso a esta página web, no supone el inicio de una relación comercial con “Cafeteria GABCY”, o con cualquiera de sus empresas filiales, quienes se reservan el derecho de efectuar sin previo aviso cuantas modificaciones vean oportunas en la misma, cambiando, eliminando o añadiendo contenidos y/o servicios prestados vía web a través de la misma, así como la forma en la que éstos aparezcan.
    </p>

    <p class="text fw-lighter fs-6 fw-semibold" style="  font-family: 'Playfair Display', serif;">
      PROPIEDAD INDUSTRIAL E INTELECTUAL
    </p>

    <p class="text  fw-lighter">
      Todos los elementos de esta web (incluyendo textos, imágenes, etc.) son titularidad de “Cafeteria GABCY o de terceros que le han dado permiso para su uso, al igual que el logo, y cualesquiera otros contenidos protegidos como propiedad industrial.
      Salvo que expresamente se indique lo contrario, queda prohibida cualquier modalidad de explotación, reproducción, distribución, comunicación pública o trasformación sin la autorización expresa y por escrito de “Cafeteria GABCY” y empresas filiales, o lo dispuesto en las Condiciones de Uso para usuarios registrados.
    </p>
<br>
<hr class="featurette-divider" style="color:  #CC6645;" size="2">

  </div>
  <!--Header -->
  <?php include("creditos.php"); ?>

</body>

</html>
<!--Verificación de Carrito compra Gabcy-->
<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';

$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();
if ($productos != null) {

  foreach ($productos as $clave => $cantidad) {

    $sql = $con->prepare("SELECT id, nombre,  $cantidad AS cantidad FROM productos WHERE id=?  LIMIT 1");
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
  }
}else{
  header("Location : index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <link rel="shortcut icon" href="img/CGABCY.jpg">

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="estilos/estiloCompra.css">

  <script type="text/javascript" src="js/main-scripts.js"> </script>
  <script type="text/javascript" src="librerias/jquery.js"></script>

  <title>Compra Gabcy</title>

</head>

<body>

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


  <!-- Pedido -->

 <main>
  <div class="card2">
    <div class="row">
      <div class="col-md-6 cart">
        <div class="title">
          <div class="row">
            <div class="col">
              <center>
                <h4><b>Tu pedido</b></h4>
              </center>
            </div>
          </div>
        </div>
        <div class="row border-top border-bottom" id="space-list">
          <div class="col">
            <div class="row text-muted">No hay Productos en el carrito</div>
          </div>

        </div>
        <h5 style="text-align: center;"><b>Domicilio de entrega</b></h5>

        <form action="php/actualizarUsu.php" method="POST">

          <?php
          require_once "php/conexion.php";
          $conexion = conexion();
          $usuario_id = $_SESSION['id'];
          $query = ("Select * from usuarios where id='$usuario_id'");
          $result = mysqli_query($conexion, $query);
          if (!$result) {
            die(mysqli_error($conexion));
          }

          if (mysqli_num_rows($result) > 0) {
            while ($rowData = mysqli_fetch_array($result)) {
              $nom = $rowData["nombre"];
              $ap = $rowData["apellido"];
              $correo = $rowData["correo"];
              $dom = $rowData["domicilio"];
          ?>

              <div class="form-floating mb-6">
                <input type="text" class="form-control" id="floatingInputUsername" name="nombre" required value="<?php echo $nom ?>">
                <label for="floatingInputUsername">Nombre(s):</label>
              </div>

              <div class="form-floating mb-6">
                <input type="text" class="form-control" id="floatingInputUsername" name="apellido" required value="<?php echo $ap ?>">
                <label for="floatingInputUsername">Apellido(s):</label>
              </div>
            

              <div class="form-floating mb-6">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com" name="correo" required value="<?php echo $correo ?>">
                <label for="floatingInputEmail">Correo:</label>
              </div>
            
              <center>
                <h6 style="text-align:left;">Selecciona el domicilio al que llegara el paquete:</h6>
              </center>
  
              <select class="inputNombreC" name ="tabla1">
                      <option >Selecciona un domicilio</option>
                      <option  id="floatingInputUsername" name="domicilio" ><?php echo $dom ?></option>
                     <option  id="floatingInputUsername" name="domicilio2" ><?php echo $dom2 ?></option>
              </select>

      
   
              <hr style="color: #FFB28C;">
          
        </form>
    <?php }
          }

    ?>

    <div class="back-to-shop" onclick="regresar()"><a class="a2" href="#">&leftarrow; </a><span class="text-muted">Regresar al carrito</span></div>

      </div> <!---Fin de pedido y datos-->
      <div class="col-md-6 summary" style="background-image: linear-gradient(180deg, #F9ECDC 35%, #FAFFA6 65%); text-align: center;">
        <div>
          <h5><b>Detalles de pago</b></h5>
        </div>
        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
          <div class="col"><b>TOTAL PRODUCTOS=</b></div>
          <div class="col text-right"><b>$<span id="montototal"></span></b></div>
          <hr>
        </div>
      
        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
        <div class="col"><b>TOTAL CON ENVIO=</b></div>
          <div class="col text-right"><b>$<span id="montototal2"></span></b></div>
          <hr>
        </div>
        <br>

        <!---METODO DE PAGO PAYPAL--->
        <div id="paypal-button-conteiner"></div>

      </div>
    </div>

  </div>
  </main>


  <br><br>
  <!--Creditos  -->
  <?php include("creditos.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'POST',
        url: 'php/carrito.php',
        data: {},
        success: function(data) {
          console.log(data);
          let html = '';
          let monto = 0;
          let envio = 180;
          let precio = 0;
          for (var i = 0; i < data.datos.length; i++) {
            html +=
              '<div class="row border-top border-bottom">' +
              '<div class="col-2"><img class="img-fluid" src="img/busqueda/' + data.datos[i].ruta_img + '" ></div>' +
              '<div class="col">' +
              '<div class="row text-muted"><center>' + data.datos[i].nombre + '</center></div>' +
              '</div>' +

              '</div>';
            monto += parseInt(data.datos[i].precio);
            precio = monto + envio;

          }
          ///paypal///
          paypal.Buttons({
            style: {
              color: 'blue',
              shape: 'pill',
              label: 'pay'
            },
            createOrder: function(data, actions) {
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: precio
                  }
                }]
              })
            },
            onApprove: function(data, actions) {
              let url = 'confi/captura.php'
              actions.order.capture().then(function(detalles) {
                console.log(detalles);
                alert("Pedido realizado con Exito!!");
                window.location.href = "index.php";
                console.log(data);

                let URL = 'confi/captura.php'

                return fetch(URL, {
                  method: 'post',
                  headers: {
                    'content-type': 'application/json'
                  },
                  body: JSON.stringify({
                    detalles: detalles
                  })
                })

              });
            },

            onCancel: function(data) {
              alert("Pago cancelado");
              console.log(data);
            }
          }).render('#paypal-button-conteiner')


          if (data.datos.length == 0) {
            alert("No hay productos en carrito");
            window.history.back();
          }
          document.getElementById("montototal").innerHTML = monto;
          document.getElementById("montototal2").innerHTML = precio;
          document.getElementById("space-list").innerHTML = html;

        },
        error: function(err) {
          console.error(err);
        }
      });
    });


    function regresar(regresar) {
      window.history.back();
    }
  </script>




</body>

</html>
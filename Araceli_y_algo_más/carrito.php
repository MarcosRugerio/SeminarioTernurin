<?php
session_start();
//session_destroy();
require 'php/confi.php';
require 'confi/database.php';

$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

//session_destroy();

$lista_carrito = array();
if ($productos != null) {

  foreach ($productos as $clave => $cantidad) {

    $sql = $con->prepare("SELECT id, nombre, ruta_img, precio1, precio2, precio3,  $cantidad AS cantidad FROM productos WHERE id=?  LIMIT 1");
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu pedido GABCY</title>

  <!--REFERENCIAR LIBRERIAS-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilos/estiloCarrito.css">
  <link rel="stylesheet" href="estilos/estilosHeader.css">
  <link rel="shortcut icon" href="img/CGABCY.jpg">
  <link rel="stylesheet" type="text/css" href="estilos/estilosCatalogoAretes.css">
     <link rel="stylesheet" type="text/css" href="estilos/botonTrans.css">
     <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>


  <style>
    h4 {
      font-size: 25px;
      text-align: center;
      font-family: 'Playfair Display', serif;
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

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
        >

        <li><a href="index.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5">INICIO</a>
        </li>


        <li>
          <a class="nav-link dropdown-toggle"
            style=" color:#6E0023; display:inline;  border-right: 2px solid  #f0cea5"  href=" #"
            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUCTOS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuC2.php">Hogar y limpieza</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuF2.php">Belleza y cuidados</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuA2.php">Ropa y algo más</a></li>
          </ul>
        </li>
        <li><a href="VerEventosGabcy.php" class="nav-link px-3 text"
            style="color: #6E0023; display:inline; border-right: 2px solid  #f0cea5;">MARCAS</a>
        </li>

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



  <!-- Carrito -->
  <main>
    <div class="card2">
      <div class="title">
        <div class="row text-center" style="color:#6E0023; background-image: linear-gradient(-225deg, #F9ECDC 35%, #FAFFA6 65%); ">

          <div class="col">
            <br>
            <h5><b>Tu carrito</b></h5>
          </div>
        </div>
      </div>
      <div class="row border-top border-bottom">
        <div class="table-responsive">
          <table class="table">
            <thead style="color:#6E0023;">
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php if ($lista_carrito == null) {
                echo '<tr><td colspan ="5" class = "text-center" ><b>Carrito vacio</b></td></tr>';
              } else {
                $total = 0;

                foreach ($lista_carrito as $producto) {
                  $_id = $producto['id'];
                  $nombre = $producto['nombre'];
                  $precio1 = $producto['precio1'];
                  $precio2 = $producto['precio2'];
                  $precio3 = $producto['precio3'];
                  $cantidad = $producto['cantidad'];
                  $subtotal =  $cantidad * $precio1;
                  $total += $subtotal;
              ?>

                  <tr>
                    <td><?php echo $nombre; ?></td>
                    <td>
                      <!---   <input style="border: 0.05em solid #6E0023; border-radius: 1em; " class="form-select-sm " type="text" readonly> --->
                      <?php echo $precio1; ?>
                    </td>
                    <td>
                      <input type="number" min="1" max="20" step="1" value="<?php echo $cantidad; ?>" size="4" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)" style="background: white;">
                    </td>
                    <td>
                      <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                    </td>
                    <td>
                      <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a>
                    </td>
                  </tr>
                <?php } ?>
                <tr>
                  <td colspan="4"></td>
                  <td colspan="2">
                    <p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                  </td>
                </tr>

            </tbody>
          <?php } ?>
          </table>
        </div>
        <div class="row summary" style=" background-image: linear-gradient(-225deg, #F9ECDC 35%, #FAFFA6 65%); ">
          <div>
          </div>
          <br>
          <?php if ($lista_carrito != null) {  ?>
          <div class="d-grid gap-2 col-6 mx-auto">

              <!---Validar sesion---->
            <a href="pagoPaypal.php" class="btn btn-dark">Terminar pedido</a>
           
             
              
          </div>
          <?php } ?>
          <div class="back-to-shop" onclick="regresar()"><a class="a2" href="index.php">&leftarrow; </a><span class="text-muted">Seguir comprando</span></div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <!-- Modal -->
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminaModalLabel">Eliminar producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro de que desea eliminar el producto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button id="btn-elimina" type="button" class="btn btn-dark" onclick="elimina()">Eliminar</button>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <!--Creditos  -->
  <?php include("creditos.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event) {
      let button = event.relatedTarget
      let id = button.getAttribute('data-bs-id')
      let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
      buttonElimina.value = id
    })

    function actualizaCantidad(cantidad, id) {
      let url = 'php/actualizaCarrito.php'
      let formData = new FormData()
      formData.append('action', 'agregar')
      formData.append('cantidad', cantidad)
      formData.append('id', id)

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            var divsubtotal = document.getElementById('subtotal_' + id)
            divsubtotal.innerHTML = data.subtotal

            let total = 0.00
            let list = document.getElementsByName('subtotal[]')

            for (let i = 0; i < list.length; i++) {
              total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
            }
            total = new Intl.NumberFormat('en-US', {
              minimumFractionDigits: 2
            }).format(total)
            document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
          }

        })
    }


    function elimina() {
      let botonElimina = document.getElementById('btn-elimina')
      let id = botonElimina.value

      let url = 'php/actualizaCarrito.php'
      let formData = new FormData()
      formData.append('action', 'eliminar')
      formData.append('id', id)

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            location.reload()
          
          }

        })
    }
  </script>

</body>

</html>
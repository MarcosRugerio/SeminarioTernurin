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
  <link rel="shortcut icon" href="img/logotipo_araceli.png">
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
  <div class="cart-wrapper">
    <div class="cart-header">
      <h2>🛒 Tu carrito</h2>
    </div>
    <div class="cart-body">
      <table class="cart-table">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if ($lista_carrito == null): ?>
            <tr><td colspan="6" class="empty-cart">Carrito vacío</td></tr>
          <?php else:
            $total = 0;
            foreach ($lista_carrito as $producto):
              $_id = $producto['id'];
              $nombre = $producto['nombre'];
              $precio1 = $producto['precio1'];
              $cantidad = $producto['cantidad'];
              $ruta_img = $producto['ruta_img'];

              $carpeta = isset($carpetas[$_id]) ? $carpetas[$_id] : '';
              $rutaImagen = 'img/productos/' . $carpeta . '/' . $ruta_img;

              $subtotal = $cantidad * $precio1;
              $total += $subtotal;
          ?>
            <tr data-id="<?= $_id ?>">
              <td>
              <img src="img/productos/<?= htmlspecialchars($producto['ruta_img']) ?>" 
              alt="<?= htmlspecialchars($producto['nombre']) ?>" width="80">
              </td>
              <td><?= htmlspecialchars($nombre) ?></td>
              <td><?= MONEDA . number_format($precio1, 2, '.', ',') ?></td>
              <td>
                <input type="number" min="1" max="20" value="<?= $cantidad ?>" onchange="actualizaCantidad(this.value, <?= $_id ?>)" />
              </td>
              <td>
                <div id="subtotal_<?= $_id ?>"><?= MONEDA . number_format($subtotal, 2, '.', ',') ?></div>
              </td>
              <td>
                <button class="btn-remove" data-bs-id="<?= $_id ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                  <!-- Aquí va el ícono SVG o texto eliminar -->
                  Eliminar
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
            <tr class="total-row">
              <td colspan="4" class="text-end"><strong>Total:</strong></td>
              <td colspan="2" class="total-value"><?= MONEDA . number_format($total, 2, '.', ',') ?></td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <?php if ($lista_carrito != null): ?>
      <div class="cart-actions">
        <a href="pagoPaypal.php" class="btn-finish">Finalizar compra</a>
        <a class="btn-back mt-3" href="index.php">&leftarrow; Seguir comprando</a>
      </div>
    <?php endif; ?>
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
  let url = 'php/actualizaCarrito.php';
  let formData = new FormData();
  formData.append('action', 'agregar');
  formData.append('cantidad', cantidad);
  formData.append('id', id);

  fetch(url, {
    method: 'POST',
    body: formData,
    mode: 'cors'
  }).then(response => response.json())
    .then(data => {
      if (data.ok) {
        // Actualiza el subtotal del producto cambiado
        let divsubtotal = document.getElementById('subtotal_' + id);
        divsubtotal.innerHTML = data.subtotal;

        // Recalcular el total sumando todos los subtotales
        let subtotales = document.querySelectorAll('[id^="subtotal_"]');
        let total = 0;
        subtotales.forEach(function(div) {
          // Remover símbolo de moneda y comas antes de convertir
          let val = div.textContent.replace(/[^0-9.-]+/g,"");
          total += parseFloat(val);
        });

        // Formatear total con 2 decimales y moneda
        total = total.toFixed(2);
        document.querySelector('.total-value').textContent = '<?php echo MONEDA; ?>' + total;
      }
    })
    .catch(error => console.error('Error:', error));
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
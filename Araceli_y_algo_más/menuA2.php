<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$sql = $con->prepare("SELECT id, nombre, ruta_img, precio1 FROM productos WHERE categoria_id = 3");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Alimentos Gabcy</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
  <script type="text/javascript" src="librerias/jquery.js"></script>
  <script type="text/javascript" src="js/main-scripts.js"> </script>


  <link rel="stylesheet" type="text/css" href="estilos/estilosMenuA.css">
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


  <!--Imagen  -->
  <div class="container">
    <ul class="ch-grid">
      <li>
        <div class="ch-item ch-img-1">
          <div class="ch-info">
            <h1>Alimentos</h1>
            <p>Comida / Dulceria <a href="">MENU GABCY</a></p>
          </div>
        </div>
      </li>
    </ul>
  </div>

  <!--Barra de Navegación Lateral   -->
  <div class="container">
    <div class="row g-5">
      <div class="col-md-2">
        <div class="position-sticky" style="top: 2rem;">
          <br><br>
          <h4 style="color: #6E0023; font-family: 'Playfair Display', serif;"> Alimentos</h4>
          <table class="table" id="list">

          </table>
        </div>
      </div>
      <!-- MENU    -->
      <div class="col-md-10">
        <div class="album py-5">
          <!-- Section-->
          <div class="container border-0 shadow rounded-3 overflow-hidden" style="background-color: white;">
            <section class="main row">
              <main>
                <div class="container">

                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                    <?php foreach ($resultado as $row) { ?>
                      <div class="col">
                        <div class="card shadow-sm">
                          <img class="card-img-top" src="img/productos/Alimentos/<?php echo $row['ruta_img']; ?>">
                          <div class="card-body">
                            <h3 class="card-tittle text-center"> <?php echo $row['nombre']; ?></h3>
                            <h4 style="color:#6E0023;  font-family: 'Playfair Display'; ">Precio</p>
                              <table class="table">
                                <tbody class="table-group-divider">
                                  <tr>
                                    <td><?php echo $row['precio1']; ?> MXN</td>
                                  </tr>

                                </tbody>
                              </table>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a href="detailsA.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn">Detalles</a>
                                </div>
                                <button class="btn btn" type="button" onclick="addProducto(<?php echo  $row['id']; ?>,'<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar a carrito</button>

                              </div>
                          </div>
                        </div>
                      </div> <?php } ?>
                  </div>
                </div>
              </main>
            </section>
            <br>
          </div>
          <!-- -->
          <br>
        </div>
      </div>
    </div>
  </div>

  <!--Creditos-->
  <?php include("creditos.php"); ?>


  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 

  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        type: 'POST',
        url: 'php/alimentos.php',
        data: {},
        success: function(data) {
          console.log(data);
          let html = '';
          for (var i = 0; i < data.datos.length; i++) {
            html +=
              '<tr>' +
              '<td><img src="img/coffee.png" width="20px" height="20px" >' + data.datos[i].nombre + '</td>' +
              '</tr>';
          }
          document.getElementById("list").innerHTML = html;
        },
        error: function(err) {
          console.error(err);
        }
      });
    });
  </script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    function addProducto(id, token) {
      let url = 'php/carrito.php'
      let formData = new FormData()
      formData.append('id', id)
      formData.append('token', token)

      var responseClone; // 1
      fetch('php/carrito.php')
        .then(function(response) {
          responseClone = response.clone(); // 2
          return response.json();
        })
        .then(function(data) {
          // Do something with data
        }, function(rejectionReason) { // 3
          console.log('Error parsing JSON from response:', rejectionReason, responseClone); // 4
          responseClone.text() // 5
            .then(function(bodyText) {
              console.log('Received the following instead of valid JSON:', bodyText); // 6
            });
        });

      fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'

        }).then(response => response.json())
        .then(data => {
          if (data.ok) {
            let elemento = document.getElementById("num_cart")
            elemento.innerHTML = data.numero

          }

        })
    }
  </script>
  <script type="text/javascript">
    function open_login() {
      window.location.href = "inicioSesion.php";
    }
  </script>

</body>

</html>
<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$sql = $con->prepare("SELECT id, nombre, ruta_img, precio1 FROM productos WHERE categoria_id = 2");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos Herbales</title>

  <!--REFERENCIAR LIBRERIAS-->
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    

    <link rel="shortcut icon" href="img/logotipo_araceli.png">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <link rel="stylesheet" href="estilos/estilosHeader.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


<style>

/* Tipografía general de la sección */
.herbales-section {
  font-family: 'Poppins', sans-serif;
  width: 100%;
  min-height: 40vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('img/banner_H.jpg');
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  position: relative;
  padding: 80px 20px;
}

/* Capa translúcida para mejorar la legibilidad */
.herbales-card {
  position: relative;
  z-index: 2;
  background: rgba(0, 0, 0, 0.4); /* semitransparente */
  padding: 30px 50px;
  border-radius: 12px;
  text-align: center;
  color: #fff;
  max-width: 600px;
  width: 90%;
  box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

/* Título destacado */
.herbales-card h2 {
  font-size: 2.2rem;
  margin-bottom: 15px;
  text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
}

/* Descripción */
.herbales-card p {
  font-size: 1.1rem;
  margin-bottom: 20px;
}

/* Enlace llamativo */
.herbales-card a {
  color: #ffe600;
  font-weight: 600;
  text-decoration: none;
  border-bottom: 2px solid #ffe600;
  transition: all 0.3s ease;
}

/* Hover en enlace */
.herbales-card a:hover {
  color: #ffffff;
  border-color: #ffffff;
}

/* Responsivo */
@media (max-width: 768px) {
  .herbales-card {
    padding: 20px;
  }
  .herbales-card h2 {
    font-size: 1.8rem;
  }
  .herbales-card p {
    font-size: 1rem;
  }
}

.sidebar {
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  padding: 25px;
  position: sticky;
  top: 2rem;
  transition: all 0.3s ease;
}

.sidebar h4 {
  font-family: 'Poppins', sans-serif;
  color: #3b5d23;
  font-weight: 700;
  margin-bottom: 20px;
}

/* Tabla moderna */
.table {
  width: 100%;
  border-collapse: collapse;
  font-family: 'Poppins', sans-serif;
}

.table tr {
  border-bottom: 1px solid #e0e0e0;
  transition: background 0.3s ease, transform 0.3s ease;
}

.table tr:hover {
  background: #f0f8f5;
  transform: scale(1.02);
}

.table td {
  padding: 10px;
  color: #555;
  cursor: pointer;
}

/* Animación de entrada */
.table tr {
  opacity: 0;
  transform: translateY(10px);
  animation: fadeInRow 0.4s forwards;
}

@keyframes fadeInRow {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsivo */
@media (max-width: 768px) {  
  .table td {
    font-size: 0.9rem;
  }
}

@media (max-width: 768px) {
  .sidebar {
    position: relative; /* ya no sticky */
    max-height: 400px;  /* o el tamaño que desees */
    overflow-y: auto;   /* habilita scroll vertical */
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }
}

.sidebar button#toggleFilterBtn {
  transition: background-color 0.3s ease;
}
.sidebar button#toggleFilterBtn:hover {
  background-color: #54812b;
}

#filterPanel {
  max-height: 400px;
  overflow-y: auto;
  padding-right: 10px;
}

#filterPanel form div {
  font-family: 'Poppins', sans-serif;
  font-size: 1rem;
  color: #3b5d23;
}

/* Estilos botón toggle filtro */
  #toggleFilterBtn {
    transition: background-color 0.3s ease;
  }
  #toggleFilterBtn:hover {
    background-color: #54812b !important;
    color: white !important;
  }


/* Card estilo vidrio */
.card {
  background: rgba(255, 255, 255, 0.4);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0, 128, 0, 0.15);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card:hover {
  transform: scale(1.02);
  box-shadow: 0 12px 30px rgba(0, 128, 0, 0.2);
}

/* Imagen redondeada y cuadrada */
.card-img-top {
  border-radius: 15px;
  height: 200px;
  width: 100%;
  object-fit: cover;
  margin-bottom: 1rem;
  transition: transform 0.4s ease;
}

.card:hover .card-img-top {
  transform: scale(1.05);
}

/* Título */
.card-tittle {
  font-family: 'Playfair Display', serif;
  color: #1a4d2e;
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
  text-align: center;
}

/* Precio */
h4 {
  color: #388e3c;
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 0.5rem;
  text-align: center;
}

/* Botones uniformes */
.card .btn,
.card button.btn {
  background-color: #2e7d32;
  color: white;
  border: none;
  border-radius: 25px;
  padding: 0.6rem 1.2rem;
  width: 100%;
  margin: 0.3rem 0;
  font-weight: 600;
  font-size: 0.95rem;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.card .btn:hover,
.card button.btn:hover {
  background-color: #1b5e20;
  transform: translateY(-2px);
}

/* Responsivo */
@media (max-width: 768px) {
  .card {
    padding: 1rem;
  }

  .card-img-top {
    height: 160px;
  }

  .card .btn,
  .card button.btn {
    font-size: 0.85rem;
    padding: 0.5rem 1rem;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Playfair+Display:wght@600&display=swap');


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
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuC2.php">Herbales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuF2.php">Nutricionales</a></li>
            <li><a class="dropdown-item" style="color: #6E0023;" href="menuA2.php">Nutricosmenticos</a></li>
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


<!--Imagen  -->
<section class="herbales-section">
  <div class="herbales-card">
    <div class="herbales-content">
      <h2>Herbales Naturales</h2>
      <p>Remedios frescos, orgánicos y ancestrales</p>
      <a href="#">Explora nuestros productos 🌿</a>
    </div>
  </div>
</section>

<!-- Empieza el filtro de busqueda -->
<div class="container my-4">
  <div class="row">
    <!-- FILTRO - LADO IZQUIERDO -->
    <aside class="col-md-3 mb-4">
      <div class="sidebar p-3">
        <h4>Filtrar productos</h4>
        <form method="GET" action="herbales.php" id="formFiltro">
          <div class="mb-3">
            <label for="buscar" class="form-label">Nombre</label>
            <input type="text" name="buscar" id="buscar" class="form-control" placeholder="Nombre del producto" value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="precio_min" class="form-label">Precio mínimo (MXN)</label>
            <input type="number" min="0" name="precio_min" id="precio_min" class="form-control" step="0.01" value="<?php echo isset($_GET['precio_min']) ? htmlspecialchars($_GET['precio_min']) : ''; ?>">
          </div>
          <div class="mb-3">
            <label for="precio_max" class="form-label">Precio máximo (MXN)</label>
            <input type="number" min="0" name="precio_max" id="precio_max" class="form-control" step="0.01" value="<?php echo isset($_GET['precio_max']) ? htmlspecialchars($_GET['precio_max']) : ''; ?>">
          </div>
          <button type="submit" class="btn btn-success w-100">Aplicar filtro</button>
          <button type="button" id="btnClearFilters" class="btn btn-outline-secondary w-100 mt-2">Quitar filtros</button>
        </form>
      </div>
    </aside>


<?php
$buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$precio_min = isset($_GET['precio_min']) && is_numeric($_GET['precio_min']) ? floatval($_GET['precio_min']) : null;
$precio_max = isset($_GET['precio_max']) && is_numeric($_GET['precio_max']) ? floatval($_GET['precio_max']) : null;

// Construir consulta dinámica con condiciones
$query = "SELECT id, nombre, ruta_img, precio1 FROM productos WHERE categoria_id = 2";
$params = [];

if ($buscar !== '') {
    $query .= " AND nombre LIKE ?";
    $params[] = "%$buscar%";
}

if (!is_null($precio_min)) {
    $query .= " AND precio1 >= ?";
    $params[] = $precio_min;
}

if (!is_null($precio_max)) {
    $query .= " AND precio1 <= ?";
    $params[] = $precio_max;
}

$sql = $con->prepare($query);
$sql->execute($params);
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!-- Termina el filtro de busqueda -->

    <!-- Menu / contenido derecho -->
    <div class="col-md-9">
      <div class="album py-5">
        <div class="container border-0 shadow rounded-3 overflow-hidden" style="background-color: white;">
          <section class="main row">
            <main>
              <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                  <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                      <div class="card shadow-sm">
                        <img class="card-img-top" src="img/productos/BebidasF/<?php echo $row['ruta_img']; ?>">
                        <div class="card-body">
                          <h3 class="card-tittle text-center"><?php echo $row['nombre']; ?></h3>
                          <h4 style="color:#6E0023; font-family: 'Playfair Display';">Precio</h4>
                          <table class="table">
                            <tbody class="table-group-divider">
                              <tr>
                                <td><?php echo $row['precio1']; ?> MXN</td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <a href="detailsF.php?id=<?php echo $row['id'];?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN);?>" class="btn btn">Detalles</a>
                            </div>
                            <button class="btn btn" type="button" onclick="addProducto(<?php echo  $row['id']; ?>,'<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">Agregar a carrito</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </main>
          </section>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin del menu / contenido derecho -->

<!--Creditos-->
<?php include("creditos.php");?>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript"> 
   $(document).ready(function(){
      $.ajax({
        type:'POST',
        url:'php/bebidasF.php',
        data:{},
        success:function(data){
          console.log(data);
          let html='';
          for(var i=0; i< data.datos.length; i++) {
            html+=
            '<tr>'+
            '<td><img src="img/coffee.png" width="20px" height="20px" >'+data.datos[i].nombre+'</td>'+
            '</tr>';          
          }
          document.getElementById("list").innerHTML=html;
        },
        error:function(err){
          console.error(err);
        }
      });
    });
  </script>

   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
 crossorigin="anonymous"></script>
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


<!-- Script del borrado del filtro -->
<script>
  document.getElementById('btnClearFilters').addEventListener('click', function() {
    // Limpiar inputs
    document.getElementById('buscar').value = '';
    document.getElementById('precio_min').value = '';
    document.getElementById('precio_max').value = '';
    
    // Recargar la página sin parámetros GET
    window.location.href = 'herbales.php';
  });
</script>
<!-- Fin Script del borrado del filtro -->

</body>

</html>
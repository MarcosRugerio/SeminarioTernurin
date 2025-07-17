<?php
session_start();
require 'php/confi.php';
require 'confi/database.php';
$db = new Database();
$con = $db->conectar();
//session_destroy();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

//print($valor);

if ($id == '' || $token == '') {
    echo 'Error al procesar la petición';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=?");
        $sql->execute([$id]);


        if ($sql->fetchColumn() > 0) {
            $sql = $con->prepare("SELECT nombre, ruta_img, precio1, precio2, precio3 FROM productos WHERE id=?  AND categoria_id=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $ruta_img = $row['ruta_img'];
            $precio1 = $row['precio1'];
            $precio2 = $row['precio2'];
            $precio3 = $row['precio3'];
        }
    } else {
        echo 'Error al procesar la petición';
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Bebidas Calientes Gabcy</title>

    <!--REFERENCIAR LIBRERIAS-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="estilos/estilosMenu2.css">

    <link rel="shortcut icon" href="img/Gabcy_vector.png">

    <script type="text/javascript" src="librerias/jquery.js"></script>
    <script type="text/javascript" src="js/main-scripts.js"> </script>

    <style>
        .btn2 {
            font-family: 'Monserrat', sans-serif;
            border-color: #6E0023;
            background-color: #6E0023;
            color: white;
            height: 38px;
            -webkit-transition-duration: 0.4s;
            /* Safari */
            transition-duration: 0.4s;
        }

        .btn2:hover {
            background-color: white;
            color: #6E0023;
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


    <!--Menu   -->
    <main>
        <div class="container">

            <div class="card mb-3 text-center" style="border-color: white;">
                <div class="row g-0">
                    <div class="col-md-7">
                        <h3 class="card-tittle"> <?php echo $nombre; ?></h3>
                        <h6>Elige el tamaño que desea comprar</h6>
                        <h5 style="color:#6E0023;  font-family: 'Playfair Display';  ">Tamaños:</p>
                            <select id="mySelect" class="form-select-sm " aria-label=".form-select-sm" style="border: 0.05em solid #6E0023; border-radius: 1em; background: white;">
                                <option>Selecciona el Tamaño</option>
                                <option value="<?php echo $precio1; ?>">Chico</option>
                                <option value="<?php echo $precio2; ?>">Mediano </option>
                                <option value="<?php echo $precio3; ?>">Grande </option>
                            </select>
                            <h5 style="color:#6E0023;  font-family: 'Playfair Display';  ">Precio:</p>
                                <input style="border: 0.05em solid #6E0023; border-radius: 1em; " class="form-select-sm " type="text" id="myInput" readonly>MXN
                               <br>
                               <br>
                                    <div class="d-grid gap-3 col-8 mx-auto">
                                    <a href="pagoPaypal.php" class="btn btn-dark">Comprar ahora</a>
                                        <button class="btn btn" type="button" onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Agregar a carrito</button>
                                    </div>
                                    <br>
                    </div>
                    <div class="col-md-5">
                        <img class="card-img" src="img/productos/BebidasC/<?php echo $ruta_img; ?>">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function() {
            $(document).on('change', '#mySelect', function() { //detectamos el evento change
                var value = $(this).val(); //sacamos el valor del select
                $('#myInput').val(value); //le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
            });
        });

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
    <br>
    <!--Creditos-->
    <?php include("creditos.php"); ?>




</body>

</html>
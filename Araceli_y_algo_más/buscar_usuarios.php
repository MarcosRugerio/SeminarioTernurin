<?php
$conexion = mysqli_connect("localhost", "root", "", "araceli_tienda");
$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";

$sql = "SELECT id, nombre, apellido, correo, domicilio, telefono, permiso 
        FROM usuarios 
        WHERE nombre LIKE '%$buscar%' OR apellido LIKE '%$buscar%' OR correo LIKE '%$buscar%'";
$rta = mysqli_query($conexion, $sql);

echo '<div class="table-responsive">';
echo '<table class="tablausuarios">';
echo '<thead>
        <tr>
          <th>Código</th>
          <th>Nombre(s)</th>
          <th>Apellido(s)</th>
          <th>Correo</th>
          <th>Domicilio</th>
          <th>Teléfono</th>
          <th>Permiso</th>
          <th>Opciones</th>
        </tr>
      </thead><tbody>';

while($mostrar = mysqli_fetch_assoc($rta)) {
    // Convertir permiso a texto
    $tipo_permiso = '';
    if($mostrar['permiso'] == 1) $tipo_permiso = 'Cliente';
    elseif($mostrar['permiso'] == 2) $tipo_permiso = 'Empleado';
    elseif($mostrar['permiso'] == 3) $tipo_permiso = 'Administrador';

    echo '<tr>
            <td>'.$mostrar['id'].'</td>
            <td>'.$mostrar['nombre'].'</td>
            <td>'.$mostrar['apellido'].'</td>
            <td>'.$mostrar['correo'].'</td>
            <td>'.$mostrar['domicilio'].'</td>
            <td>'.$mostrar['telefono'].'</td>
            <td>'.$tipo_permiso.'</td>
            <td>
              <div class="d-flex justify-content-center gap-2">
                <a href="EliminarUsuarios.php?id='.$mostrar['id'].'"><button class="btn btn-outline-dark">Eliminar</button></a>
                <a href="AgregarPermisos.php?id='.$mostrar['id'].'"><button class="btn btn-outline-dark">Permiso</button></a>
              </div>
            </td>
          </tr>';
}
echo '</tbody></table></div>';
?>

<?php function conexion (){

$servidor="localhost";
$usuario="root";
$password="";
$db="araceli_tienda";

$conexion=mysqli_connect($servidor,$usuario,$password,$db);
return $conexion;

}
?>
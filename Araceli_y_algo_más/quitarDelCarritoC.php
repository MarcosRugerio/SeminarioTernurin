<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ./Registro_ventasC.php?status=3");
?>
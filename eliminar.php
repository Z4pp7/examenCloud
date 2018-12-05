<?php

require_once './Modelo.php';
session_start();

$producto = new Modelo();
$codigo = $_REQUEST['eliminar'];
$producto->eliminaProducto($codigo);
$lista = $producto->getProductos();
$_SESSION['lista'] = serialize($lista);
header('Location: ./index.php');

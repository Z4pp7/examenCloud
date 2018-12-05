<?php

require_once './Modelo.php';
session_start();

$producto = new Modelo();
$codigo = $_REQUEST['actualizar'];
$lista = $producto->getProducto($codigo);
$_SESSION['pro'] = serialize($lista);
header('Location: ./actualizar.php');

<?php

require_once './Modelo.php';
session_start();

$producto = new Modelo();
$codigo = $_REQUEST['actualizar'];

    $cod = $producto->getProducto($codigo);
    
    if($cod!=null){
    $_SESSION['producto'] = serialize($cod);
    header('Location: ./actualizar.php');
    } else {
        header('Location: ./index.php');
}
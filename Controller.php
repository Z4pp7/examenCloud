<?php

require_once './Modelo.php';
session_start();

$producto = new Modelo();
$opcion = $_REQUEST['opcion'];


        


switch ($opcion) {

    case 'cargar_lista':

        $lista = $producto->getProductos();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ./index.php');

        break;
    case 'guardar':
        $codigo = $_REQUEST['codigo'];
        $descripcion = $_REQUEST['descripcion'];
        $cantidad = $_REQUEST['cantidad'];
        $precio = $_REQUEST['precio'];
        $producto->crearProductos($codigo, $descripcion, $cantidad, $precio);
        $lista = $producto->getProductos();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ./index.php');
        break;

    case 'eliminar':
        $codigo = $_REQUEST['codigo'];
        $producto->eliminaProducto($codigo);
        $lista = $producto->getProductos();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ./index.php');
        break;
    case 'cargar':
        $codigo = $_REQUEST['codigo'];
    
            $cod = $producto->getProducto($codigo);
            $_SESSION['producto'] = serialize($cod);
            header('Location: ./actualizar.php');
     
        break;
    case 'actualizar':
        $codigo = $_REQUEST['codigo'];
        $descripcion = $_REQUEST['descripcion'];
        $cantidad = $_REQUEST['cantidad'];
        $precio = $_REQUEST['precio'];
        $producto->actualizarProducto($codigo, $descripcion, $cantidad, $precio);
        $lista = $producto->getProductos();
        $_SESSION['lista'] = serialize($lista);
        header('Location: ./index.php');
        break;
    default :

        header('Location: ../index.php');
}
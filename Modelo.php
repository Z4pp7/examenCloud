<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Producto.php';

class Modelo {

    public function getProductos() {

        $pdo = Database::connect();
        $sql = "select*from productoo";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Producto();
            $atributo->setCodigo($dato['codigo']);
            $atributo->setDescripcion($dato['descripcion']);
            $atributo->setCantidad($dato['cantidad']);
            $atributo->setPrecio($dato['precio']);

            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getProducto($codigo) {

        $pdo = Database::connect();
        $sql = "select * from productoo where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Producto();
        $atributo->setCodigo($dato['codigo']);
        $atributo->setDescripcion($dato['descripcion']);
        $atributo->setCantidad($dato['cantidad']);
        $atributo->setPrecio($dato['precio']);
        Database::disconnect();
        return $atributo;
    }

    public function crearProductos($codigo, $descripcion, $cantidad, $precio) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into productoo (codigo, descripcion,cantidad,precio) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($codigo, $descripcion, $cantidad, $precio));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminaProducto($codigo) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from productoo where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        Database::disconnect();
    }

    public function actualizarProducto($codigo, $descripcion, $cantidad, $precio) {

        $pdo = Database::connect();
        $sql = "update productoo set descripcion=?,cantidad=?,precio=? where codigo=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($descripcion, $cantidad, $precio,$codigo));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}

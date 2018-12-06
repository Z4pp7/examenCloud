<?php

/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 * @author mrea
 */
class Database {

    private static $dbName = 'd85cmdg7nf0or6';
    private static $dbHost = 'ec2-54-227-249-201.compute-1.amazonaws.com';
    private static $port = '5432';
    private static $dbUsername = 'inmouglrdtgzxc';
    private static $dbUserPassword = 'fdb5d4c103cd87f1f409573e2c3e1b5da59c93cf46cdf32e53980ebe1fe2753a';
    private static $conexion=null;
    
    
//    private static $dbName = 'ejemplo';
//    private static $dbHost = 'localhost';
//    private static $port = '5433';
//    private static $dbUsername = 'postgres';
//    private static $dbUserPassword = 'zappy';
//    private static $conexion=null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     */
    public static function connect() {
        // Una sola conexion para toda la aplicacion (singleton):
        // La palabra reservada self nos ayuda a acceder a las propiedades estaticas de conexion
        if (null == self::$conexion) {
            try {
                self::$conexion = new PDO("pgsql:host=" . self::$dbHost . ";" . "port=" . self::$port . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }

}

?>

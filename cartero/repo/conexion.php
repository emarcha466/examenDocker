<?php
class GBD{
    private static $conexion;

    public static function getConexion()
    {
        if(!isset($conexion)){
            self::$conexion = new PDO('mysql:host=datos;dbname=cestaDB','root','root');
        }
        return self::$conexion;
    }
}
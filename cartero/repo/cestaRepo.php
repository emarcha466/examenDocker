<?php
require_once "conexion.php";
require_once "./entities/cesta.php";
class cestaRepo{

    public static function getCestaByNombre($nombre) {
        $conexion = GBD::getConexion();
        $stmt = $conexion->prepare("SELECT * FROM cesta WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return new Cesta($result['nombre'], $result['correo'], $result['jamon']);
        } else {
            return null;
        }
    }
}

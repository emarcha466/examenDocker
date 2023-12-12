<?php
class Cesta {
    private $nombre;
    private $correo;
    private $jamon;

    // Constructor
    public function __construct($nombre, $correo, $jamon) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->jamon = $jamon;
    }

     // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getJamon() {
        return $this->jamon;
    }
}
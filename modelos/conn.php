<?php

class Conn{

    private $dsn;
    private $usuario;
    private $pass;
    private $conexion;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=regionz";
        $this->usuario = "root";
        $this->pass = "romel123";
    }

    public function conectar(){
        $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass);
        return $this->conexion;
    }

    public function cerrar(){
        $this->conexion = NULL;
    }


}
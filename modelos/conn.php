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
        $this->pass = "123456"; //contraseña de MySQL **en caso que no haya dejar en blanco**//
    }

    public function conectar(){
        $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass);
        return $this->conexion;
    }

    public function cerrar(){
        $this->conexion = NULL;
    }


}
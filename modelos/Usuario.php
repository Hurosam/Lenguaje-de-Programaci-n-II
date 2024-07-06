<?php
require_once 'Conn.php';

class Usuario {
    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $contrasena;
    private $rol;

    public function __construct() {
        /*$this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->rol = $rol;*/
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function insertar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO Usuario (nombres, apellidos, correo, contrasena, rol) VALUES ('{$this->nombres}', '{$this->apellidos}', '{$this->correo}', '{$this->contrasena}', '{$this->rol}')";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>

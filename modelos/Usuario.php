<?php
require_once 'Conn.php';

class Usuario {
    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $contrasena;
    private $rol;

    public function __construct($nombres = null, $apellidos = null, $correo = null, $contrasena = null, $rol = null) {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->rol = $rol;
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
        $sql = "INSERT INTO Usuario (nombres, apellidos, correo, contrasena, rol) 
                VALUES ('{$this->nombres}', '{$this->apellidos}', '{$this->correo}', '{$this->contrasena}', '{$this->rol}')";
        $conexion->exec($sql);
        $conn->cerrar();
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM Usuario WHERE id = {$id}";
        $conexion->exec($sql);
        $conn->cerrar();
    }

    public function guardar() {
        if ($this->id) {
            $this->actualizar();
        } else {
            $this->insertar();
        }
    }

    public function modificar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Usuario WHERE id = {$id}";
        $resultado = $conexion->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

        $this->id = $usuario['id'];
        $this->nombres = $usuario['nombres'];
        $this->apellidos = $usuario['apellidos'];
        $this->correo = $usuario['correo'];
        $this->contrasena = $usuario['contrasena'];
        $this->rol = $usuario['rol'];

        $conn->cerrar();
    }

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE Usuario SET nombres = '{$this->nombres}', apellidos = '{$this->apellidos}', correo = '{$this->correo}', contrasena = '{$this->contrasena}', rol = '{$this->rol}' WHERE id = {$this->id}";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>

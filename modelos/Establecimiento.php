<?php
require_once 'Conn.php';

class Establecimiento {
    private $id;
    private $nombre;
    private $direccion;
    private $tipo;
    private $contacto;
    private $responsable;

    public function __construct() {
        /*$this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->tipo = $tipo;
        $this->contacto = $contacto;
        $this->responsable = $responsable;*/
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Establecimiento";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function insertar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO Establecimiento (nombre, direccion, tipo, contacto, responsable) VALUES ('{$this->nombre}', '{$this->direccion}', '{$this->tipo}', '{$this->contacto}', '{$this->responsable}')";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>

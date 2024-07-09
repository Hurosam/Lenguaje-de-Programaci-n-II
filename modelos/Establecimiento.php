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

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM Establecimiento WHERE id = {$id}";
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
        $sql = "SELECT * FROM Establecimiento WHERE id = {$id}";
        $resultado = $conexion->query($sql);
        $establecimiento = $resultado->fetch(PDO::FETCH_ASSOC);

        $this->id = $establecimiento['id'];
        $this->nombre = $establecimiento['nombre'];
        $this->direccion = $establecimiento['direccion'];
        $this->tipo = $establecimiento['tipo'];
        $this->contacto = $establecimiento['contacto'];
        $this->responsable = $establecimiento['responsable'];

        $conn->cerrar();
    }

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE Establecimiento SET nombre = '{$this->nombre}', direccion = '{$this->direccion}', tipo = '{$this->tipo}', contacto = '{$this->contacto}', responsable = '{$this->responsable}' WHERE id = {$this->id}";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>

<?php
require_once 'Conn.php';

class Reporte {
    private $id;
    private $tipo;
    private $fechaGeneracion;
    private $contenido;
    private $responsable;

    public function __construct() {
        /*$this->id = $id;
        $this->tipo = $tipo;
        $this->fechaGeneracion = $fechaGeneracion;
        $this->contenido = $contenido;
        $this->responsable = $responsable;*/
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Reporte";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function insertar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO Reporte (tipo, fechaGeneracion, contenido, responsable) VALUES ('{$this->tipo}', '{$this->fechaGeneracion}', '{$this->contenido}', '{$this->responsable}')";
        $conexion->exec($sql);
        $conn->cerrar();
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM Reporte WHERE id = {$id}";
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
        $sql = "SELECT * FROM Reporte WHERE id = {$id}";
        $resultado = $conexion->query($sql);
        $reporte = $resultado->fetch(PDO::FETCH_ASSOC);

        $this->id = $reporte['id'];
        $this->tipo = $reporte['tipo'];
        $this->fechaGeneracion = $reporte['fechaGeneracion'];
        $this->contenido = $reporte['contenido'];
        $this->responsable = $reporte['responsable'];

        $conn->cerrar();
    }

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE Reporte SET tipo = '{$this->tipo}', fechaGeneracion = '{$this->fechaGeneracion}', contenido = '{$this->contenido}', responsable = '{$this->responsable}' WHERE id = {$this->id}";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>
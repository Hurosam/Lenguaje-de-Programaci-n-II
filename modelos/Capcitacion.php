<?php
require_once 'Conn.php';

class Capacitacion {
    private $id;
    private $tema;
    private $fecha;
    private $duracion;
    private $establecimiento;

    public function __construct() {
        /*$this->id = $id;
        $this->tema = $tema;
        $this->fecha = $fecha;
        $this->duracion = $duracion;
        $this->establecimiento = $establecimiento;*/
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM Capacitacion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO Capacitacion (tema, fecha, duracion, establecimiento) VALUES ('{$this->tema}', '{$this->fecha}', '{$this->duracion}', '{$this->establecimiento}')";
        $conexion->exec($sql);
        $conn->cerrar();
    }
}
?>

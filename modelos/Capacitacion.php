<?php

require_once "Conn.php";

class Capacitacion {
    private $id_capacitacion;
    private $id_establecimiento;
    private $nombre;
    private $descripcion;
    private $fecha;
    private $duracion;
    private $estado;

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO capacitaciones (id_establecimiento, nombre, descripcion, fecha, duracion, estado) 
                VALUES ('$this->id_establecimiento', '$this->nombre', '$this->descripcion', '$this->fecha', $this->duracion, '$this->estado')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "
            SELECT c.*, e.nombre AS nombre_establecimiento, CONCAT(u.nombre, ' ', u.apellido) AS nombre_encargado
            FROM capacitaciones c
            JOIN establecimientos e ON c.id_establecimiento = e.id_establecimiento
            JOIN usuarios u ON e.id_encargado = u.id_usuario
        ";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorIdEstablecimiento($id_establecimiento) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "
            SELECT c.*, e.nombre AS nombre_establecimiento, CONCAT(u.nombre, ' ', u.apellido) AS nombre_encargado
            FROM capacitaciones c
            JOIN establecimientos e ON c.id_establecimiento = e.id_establecimiento
            JOIN usuarios u ON e.id_encargado = u.id_usuario
            WHERE c.id_establecimiento = $id_establecimiento
        ";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }    
    
    public function buscarPorId($id_capacitacion) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "
            SELECT c.*, e.nombre AS nombre_establecimiento, CONCAT(u.nombre, ' ', u.apellido) AS nombre_encargado
            FROM capacitaciones c
            JOIN establecimientos e ON c.id_establecimiento = e.id_establecimiento
            JOIN usuarios u ON e.id_encargado = u.id_usuario
            WHERE c.id_capacitacion = $id_capacitacion
        ";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    
    

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE capacitaciones SET 
                id_establecimiento = '$this->id_establecimiento',
                nombre = '$this->nombre', 
                descripcion = '$this->descripcion', 
                fecha = '$this->fecha', 
                duracion = $this->duracion,
                estado = '$this->estado'
                WHERE id_capacitacion = $this->id_capacitacion";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_capacitacion) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM capacitaciones WHERE id_capacitacion = $id_capacitacion";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    // Getters y Setters
    public function getIdCapacitacion() {
        return $this->id_capacitacion;
    }

    public function setIdCapacitacion($id_capacitacion) {
        $this->id_capacitacion = $id_capacitacion;
    }

    public function getIdEstablecimiento() {
        return $this->id_establecimiento;
    }

    public function setIdEstablecimiento($id_establecimiento) {
        $this->id_establecimiento = $id_establecimiento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}
?>

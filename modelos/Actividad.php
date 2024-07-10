<?php

require_once "Conn.php";

class Actividad {
    private $id_actividad;
    private $id_establecimiento;
    private $nombre;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $costo;

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO actividades (id_establecimiento, nombre, descripcion, fecha_inicio, fecha_fin, costo) 
                VALUES ($this->id_establecimiento, '$this->nombre', '$this->descripcion', '$this->fecha_inicio', '$this->fecha_fin', $this->costo)";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM actividades";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorId($id_actividad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM actividades WHERE id_actividad = $id_actividad";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorIdEstablecimiento($id_establecimiento) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM actividades WHERE id_establecimiento = $id_establecimiento";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE actividades SET 
                id_establecimiento = $this->id_establecimiento,
                nombre = '$this->nombre', 
                descripcion = '$this->descripcion', 
                fecha_inicio = '$this->fecha_inicio', 
                fecha_fin = '$this->fecha_fin', 
                costo = $this->costo 
                WHERE id_actividad = $this->id_actividad";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_actividad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM actividades WHERE id_actividad = $id_actividad";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    // Getters y Setters
    public function getIdActividad() {
        return $this->id_actividad;
    }

    public function setIdActividad($id_actividad) {
        $this->id_actividad = $id_actividad;
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

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }
}
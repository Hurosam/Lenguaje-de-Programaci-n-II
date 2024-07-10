<?php

require_once "Conn.php";

class Participante {
    private $id_participante;
    private $id_capacitacion;
    private $nombre;
    private $apellido;
    private $dni;
    private $email;
    private $tipo;

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO participantes (id_capacitacion, nombre, apellido, dni, email, tipo) 
                VALUES ($this->id_capacitacion, '$this->nombre', '$this->apellido', '$this->dni', '$this->email', '$this->tipo')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM participantes";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorId($id_participante) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM participantes WHERE id_participante = $id_participante";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorIdCapacitacion($id_capacitacion) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM participantes WHERE id_capacitacion = $id_capacitacion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE participantes SET 
                id_capacitacion = $this->id_capacitacion,
                nombre = '$this->nombre', 
                apellido = '$this->apellido', 
                dni = '$this->dni', 
                email = '$this->email', 
                tipo = '$this->tipo' 
                WHERE id_participante = $this->id_participante";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_participante) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM participantes WHERE id_participante = $id_participante";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    // Getters y Setters
    public function getIdParticipante() {
        return $this->id_participante;
    }

    public function setIdParticipante($id_participante) {
        $this->id_participante = $id_participante;
    }

    public function getIdCapacitacion() {
        return $this->id_capacitacion;
    }

    public function setIdCapacitacion($id_capacitacion) {
        $this->id_capacitacion = $id_capacitacion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
?>

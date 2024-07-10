<?php

require_once "Conn.php";

class Establecimiento {
    private $id_establecimiento;
    private $id_destino;
    private $id_encargado;
    private $nombre;
    private $tipo;
    private $direccion;
    private $url_maps;
    private $capacidad;
    private $ruc;
    private $num_contacto;
    private $horario_atencion;
    private $descripcion;
    private $foto;

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO establecimientos (id_destino, id_encargado, nombre, tipo, direccion, url_maps, capacidad, ruc, num_contacto, horario_atencion, descripcion, foto) 
                VALUES ($this->id_destino, $this->id_encargado, '$this->nombre', '$this->tipo', '$this->direccion', '$this->url_maps', $this->capacidad, '$this->ruc', '$this->num_contacto', '$this->horario_atencion', '$this->descripcion', '$this->foto')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM establecimientos";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorId($id_establecimiento) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM establecimientos WHERE id_establecimiento = $id_establecimiento";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorIdDestino($id_destino) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM establecimientos WHERE id_destino = $id_destino";
        $resultado = $conexion->query($sql);
        return $resultado;
    }

    public function buscarPorIdEncargado($id_encargado) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM establecimientos WHERE id_encargado = $id_encargado";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    
    

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE establecimientos SET 
                id_destino = $this->id_destino,
                id_encargado = $this->id_encargado,
                nombre = '$this->nombre', 
                tipo = '$this->tipo', 
                direccion = '$this->direccion', 
                url_maps = '$this->url_maps', 
                capacidad = $this->capacidad, 
                ruc = '$this->ruc', 
                num_contacto = '$this->num_contacto', 
                horario_atencion = '$this->horario_atencion', 
                descripcion = '$this->descripcion', 
                foto = '$this->foto' 
                WHERE id_establecimiento = $this->id_establecimiento";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_establecimiento) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM establecimientos WHERE id_establecimiento = $id_establecimiento";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    // Getters y Setters
    public function getIdEstablecimiento() {
        return $this->id_establecimiento;
    }

    public function setIdEstablecimiento($id_establecimiento) {
        $this->id_establecimiento = $id_establecimiento;
    }

    public function getIdDestino() {
        return $this->id_destino;
    }

    public function setIdDestino($id_destino) {
        $this->id_destino = $id_destino;
    }

    public function getIdEncargado() {
        return $this->id_encargado;
    }

    public function setIdEncargado($id_encargado) {
        $this->id_encargado = $id_encargado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getUrlMaps() {
        return $this->url_maps;
    }

    public function setUrlMaps($url_maps) {
        $this->url_maps = $url_maps;
    }

    public function getCapacidad() {
        return $this->capacidad;
    }

    public function setCapacidad($capacidad) {
        $this->capacidad = $capacidad;
    }

    public function getRuc() {
        return $this->ruc;
    }

    public function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    public function getNumContacto() {
        return $this->num_contacto;
    }

    public function setNumContacto($num_contacto) {
        $this->num_contacto = $num_contacto;
    }

    public function getHorarioAtencion() {
        return $this->horario_atencion;
    }

    public function setHorarioAtencion($horario_atencion) {
        $this->horario_atencion = $horario_atencion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}
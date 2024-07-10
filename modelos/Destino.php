<?php

require_once "Conn.php";

class Destino {
    private $id_destino;
    private $nombre;
    private $descripcion;
    private $ubicacion;
    private $url_maps;
    private $foto;

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO destinos (nombre, descripcion, ubicacion, url_maps, foto) VALUES ('$this->nombre', '$this->descripcion', '$this->ubicacion', '$this->url_maps', '$this->foto')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM destinos";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorId($id_destino) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM destinos WHERE id_destino = $id_destino";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE destinos SET nombre = '$this->nombre', descripcion = '$this->descripcion', ubicacion = '$this->ubicacion', url_maps = '$this->url_maps', foto = '$this->foto' WHERE id_destino = $this->id_destino";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id_destino) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM destinos WHERE id_destino = $id_destino";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }


    // Getters y Setters
    public function getIdDestino() {
        return $this->id_destino;
    }

    public function setIdDestino($id_destino) {
        $this->id_destino = $id_destino;
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

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    public function getUrlMaps() {
        return $this->url_maps;
    }

    public function setUrlMaps($url_maps) {
        $this->url_maps = $url_maps;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
    
}
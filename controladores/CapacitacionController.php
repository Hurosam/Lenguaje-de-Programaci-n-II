<?php

require_once "../modelos/Capacitacion.php";

class CapacitacionController {

    public function mostrar() {
        $capacitacion = new Capacitacion();
        return $capacitacion->mostrar();
    }

    public function buscarPorIdEstablecimiento($id_establecimiento) {
        $capacitacion = new Capacitacion();
        return $capacitacion->buscarPorIdEstablecimiento($id_establecimiento);
    }

    public function crear($id_establecimiento, $nombre, $descripcion, $fecha, $duracion, $estado) {
        $capacitacion = new Capacitacion();
        $capacitacion->setIdEstablecimiento($id_establecimiento);
        $capacitacion->setNombre($nombre);
        $capacitacion->setDescripcion($descripcion);
        $capacitacion->setFecha($fecha);
        $capacitacion->setDuracion($duracion);
        $capacitacion->setEstado($estado);
        return $capacitacion->crear();
    }

    public function buscarPorId($id_capacitacion) {
        $capacitacion = new Capacitacion();
        return $capacitacion->buscarPorId($id_capacitacion);
    }

    public function actualizar($id_capacitacion, $id_establecimiento, $nombre, $descripcion, $fecha, $duracion, $estado) {
        $capacitacion = new Capacitacion();
        $capacitacion->setIdCapacitacion($id_capacitacion);
        $capacitacion->setIdEstablecimiento($id_establecimiento);
        $capacitacion->setNombre($nombre);
        $capacitacion->setDescripcion($descripcion);
        $capacitacion->setFecha($fecha);
        $capacitacion->setDuracion($duracion);
        $capacitacion->setEstado($estado);
        return $capacitacion->actualizar();
    }

    public function eliminar($id_capacitacion) {
        $capacitacion = new Capacitacion();
        return $capacitacion->eliminar($id_capacitacion);
    }
}
?>

<?php

require_once "../modelos/Actividad.php";

class ActividadController {

    public function mostrar() {
        $actividad = new Actividad();
        return $actividad->mostrar();
    }

    public function crear($id_establecimiento, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $costo) {
        $actividad = new Actividad();
        $actividad->setIdEstablecimiento($id_establecimiento);
        $actividad->setNombre($nombre);
        $actividad->setDescripcion($descripcion);
        $actividad->setFechaInicio($fecha_inicio);
        $actividad->setFechaFin($fecha_fin);
        $actividad->setCosto($costo);
        return $actividad->crear();
    }

    public function buscarPorId($id_actividad) {
        $actividad = new Actividad();
        return $actividad->buscarPorId($id_actividad);
    }

    public function actualizar($id_actividad, $id_establecimiento, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $costo) {
        $actividad = new Actividad();
        $actividad->setIdActividad($id_actividad);
        $actividad->setIdEstablecimiento($id_establecimiento);
        $actividad->setNombre($nombre);
        $actividad->setDescripcion($descripcion);
        $actividad->setFechaInicio($fecha_inicio);
        $actividad->setFechaFin($fecha_fin);
        $actividad->setCosto($costo);
        return $actividad->actualizar();
    }

    public function eliminar($id_actividad) {
        $actividad = new Actividad();
        return $actividad->eliminar($id_actividad);
    }

    public function buscarPorIdEstablecimiento($id_establecimiento) {
        $actividad = new Actividad();
        return $actividad->buscarPorIdEstablecimiento($id_establecimiento);
    }
}

?>

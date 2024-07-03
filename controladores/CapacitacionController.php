<?php
require_once 'modelos/Capacitacion.php';

class CapacitacionController {
    private $capacitacion;

    public function __construct() {
        $this->capacitacion = new Capacitacion();
    }

    public function mostrar() {
        return $this->capacitacion->mostrar();
    }

    public function insertar($tema, $fecha, $duracion, $establecimiento) {
        $capacitacion = new Capacitacion(null, $tema, $fecha, $duracion, $establecimiento);
        $capacitacion->insertar();
    }
}
?>

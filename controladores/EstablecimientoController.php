<?php
require_once 'modelos/Establecimiento.php';

class EstablecimientoController {
    private $establecimiento;

    public function __construct() {
        $this->establecimiento = new Establecimiento();
    }

    public function mostrar() {
        return $this->establecimiento->mostrar();
    }

    public function insertar($nombre, $direccion, $tipo, $contacto, $responsable) {
        $establecimiento = new Establecimiento(null, $nombre, $direccion, $tipo, $contacto, $responsable);
        $establecimiento->insertar();
    }
}
?>

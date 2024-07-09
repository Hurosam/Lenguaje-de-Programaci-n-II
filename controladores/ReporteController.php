<?php
require_once 'modelos/Reporte.php';

class ReporteController {
    private $reporte;

    public function __construct() {
        $this->reporte = new Reporte();
    }

    public function mostrar() {
        return $this->reporte->mostrar();
    }

    public function insertar($tipo, $fechaGeneracion, $contenido, $responsable) {
        $reporte = new Reporte(null, $tipo, $fechaGeneracion, $contenido, $responsable);
        $reporte->insertar();
    }

    public function eliminar($id) {
        $this->reporte->eliminar($id);
    }

    public function guardar($id, $tipo, $fechaGeneracion, $contenido, $responsable) {
        $reporte = new Reporte($id, $tipo, $fechaGeneracion, $contenido, $responsable);
        $reporte->guardar();
    }

    public function modificar($id) {
        $this->reporte->modificar($id);
    }
}
?>

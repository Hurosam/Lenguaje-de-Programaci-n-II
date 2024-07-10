<?php

require_once "../modelos/Establecimiento.php";

class EstablecimientoController {

    public function mostrar() {
        $establecimiento = new Establecimiento();
        return $establecimiento->mostrar();
    }

    public function crear($id_destino, $id_encargado, $nombre, $tipo, $direccion, $url_maps, $capacidad, $ruc, $num_contacto, $horario_atencion, $descripcion, $foto) {
        $establecimiento = new Establecimiento();
        $establecimiento->setIdDestino($id_destino);
        $establecimiento->setIdEncargado($id_encargado);
        $establecimiento->setNombre($nombre);
        $establecimiento->setTipo($tipo);
        $establecimiento->setDireccion($direccion);
        $establecimiento->setUrlMaps($url_maps);
        $establecimiento->setCapacidad($capacidad);
        $establecimiento->setRuc($ruc);
        $establecimiento->setNumContacto($num_contacto);
        $establecimiento->setHorarioAtencion($horario_atencion);
        $establecimiento->setDescripcion($descripcion);
        $establecimiento->setFoto($foto);
        return $establecimiento->crear();
    }

    public function buscarPorId($id_establecimiento) {
        $establecimiento = new Establecimiento();
        return $establecimiento->buscarPorId($id_establecimiento);
    }

    public function actualizar($id_establecimiento, $id_destino, $id_encargado, $nombre, $tipo, $direccion, $url_maps, $capacidad, $ruc, $num_contacto, $horario_atencion, $descripcion, $foto) {
        $establecimiento = new Establecimiento();
        $establecimiento->setIdEstablecimiento($id_establecimiento);
        $establecimiento->setIdDestino($id_destino);
        $establecimiento->setIdEncargado($id_encargado);
        $establecimiento->setNombre($nombre);
        $establecimiento->setTipo($tipo);
        $establecimiento->setDireccion($direccion);
        $establecimiento->setUrlMaps($url_maps);
        $establecimiento->setCapacidad($capacidad);
        $establecimiento->setRuc($ruc);
        $establecimiento->setNumContacto($num_contacto);
        $establecimiento->setHorarioAtencion($horario_atencion);
        $establecimiento->setDescripcion($descripcion);
        $establecimiento->setFoto($foto);
        return $establecimiento->actualizar();
    }

    public function eliminar($id_establecimiento) {
        $establecimiento = new Establecimiento();
        return $establecimiento->eliminar($id_establecimiento);
    }

    public function buscarPorIdDestino($id_destino) {
        $establecimiento = new Establecimiento();
        return $establecimiento->buscarPorIdDestino($id_destino);
    }
    
    public function buscarPorIdEncargado($id_encargado) {
        $establecimiento = new Establecimiento();
        return $establecimiento->buscarPorIdEncargado($id_encargado);
    }
}

?>

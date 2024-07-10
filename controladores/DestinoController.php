<?php

require_once "../modelos/Destino.php";

class DestinoController {

    public function mostrar() {
        $destino = new Destino();
        return $destino->mostrar();
    }

    public function crear($nombre, $descripcion, $ubicacion, $url_maps, $foto) {
        $destino = new Destino();
        $destino->setNombre($nombre);
        $destino->setDescripcion($descripcion);
        $destino->setUbicacion($ubicacion);
        $destino->setUrlMaps($url_maps);
        $destino->setFoto($foto);
        return $destino->crear();
    }

    public function buscarPorId($id_destino) {
        $destino = new Destino();
        return $destino->buscarPorId($id_destino);
    }

    public function actualizar($id_destino, $nombre, $descripcion, $ubicacion, $url_maps, $foto) {
        $destino = new Destino();
        $destino->setIdDestino($id_destino);
        $destino->setNombre($nombre);
        $destino->setDescripcion($descripcion);
        $destino->setUbicacion($ubicacion);
        $destino->setUrlMaps($url_maps);
        $destino->setFoto($foto);
        return $destino->actualizar();
    }

    public function eliminar($id_destino) {
        $destino = new Destino();
        return $destino->eliminar($id_destino);
    }

}

?>

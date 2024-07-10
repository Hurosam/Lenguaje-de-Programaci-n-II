<?php

require_once __DIR__."/../modelos/Participante.php";

class ParticipanteController {

    public function mostrar() {
        $participante = new Participante();
        return $participante->mostrar();
    }

    public function buscarPorIdCapacitacion($id_capacitacion) {
        $participante = new Participante();
        return $participante->buscarPorIdCapacitacion($id_capacitacion);
    }

    public function buscarPorId($id_participante) {
        $participante = new Participante();
        return $participante->buscarPorId($id_participante);
    }

    public function crear($id_capacitacion, $nombre, $apellido, $dni, $email, $tipo) {
        $participante = new Participante();
        $participante->setIdCapacitacion($id_capacitacion);
        $participante->setNombre($nombre);
        $participante->setApellido($apellido);
        $participante->setDni($dni);
        $participante->setEmail($email);
        $participante->setTipo($tipo);
        return $participante->crear();
    }

    public function actualizar($id_participante, $id_capacitacion, $nombre, $apellido, $dni, $email, $tipo) {
        $participante = new Participante();
        $participante->setIdParticipante($id_participante);
        $participante->setIdCapacitacion($id_capacitacion);
        $participante->setNombre($nombre);
        $participante->setApellido($apellido);
        $participante->setDni($dni);
        $participante->setEmail($email);
        $participante->setTipo($tipo);
        return $participante->actualizar();
    }

    public function eliminar($id_participante) {
        $participante = new Participante();
        return $participante->eliminar($id_participante);
    }
}

?>

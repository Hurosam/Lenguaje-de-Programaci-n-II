<?php
require_once 'modelos/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function mostrar() {
        return $this->usuario->mostrar();
    }

    public function insertar($nombres, $apellidos, $correo, $contrasena, $rol) {
        $usuario = new Usuario(null, $nombres, $apellidos, $correo, $contrasena, $rol);
        $usuario->insertar();
    }
}
?>

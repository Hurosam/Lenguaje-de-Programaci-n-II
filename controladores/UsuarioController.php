<?php

require_once "../modelos/Usuario.php";

class UsuarioController {

    public function mostrar() {
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function mostrarEncargados() {
        $usuario = new Usuario();
        return $usuario->mostrarEncargados();
    }

    public function registrar($nombre, $apellido, $email, $password, $dni, $telefono, $fecha_contratacion, $sueldo, $tipo = 'Encargado') {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setDni($dni);
        $usuario->setTelefono($telefono);
        $usuario->setEmail($email);
        $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));
        $usuario->setFechaContratacion($fecha_contratacion);
        $usuario->setSueldo($sueldo);
        $usuario->setTipo($tipo);
        return $usuario->crear();
    }



    public function buscarPorId($id_usuario) {
        $usuario = new Usuario();
        return $usuario->buscarPorId($id_usuario);
    }

    public function actualizar($id_usuario, $nombre, $apellido, $dni, $telefono, $email, $fecha_contratacion, $sueldo, $tipo, $password = null) {
        $usuario = new Usuario();
        $usuario->setIdUsuario($id_usuario);
        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setDni($dni);
        $usuario->setTelefono($telefono);
        $usuario->setEmail($email);
        if ($password) { 
            $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));
        }
        $usuario->setFechaContratacion($fecha_contratacion);
        $usuario->setSueldo($sueldo);
        $usuario->setTipo($tipo);
        
        $resultado = $usuario->actualizar($password !== null);
        
        if ($resultado) {
            // Actualiza las variables de sesión
            $_SESSION['id'] = $id_usuario;
            $_SESSION['usuario'] = $nombre . " " . $apellido;
            $_SESSION['tipo'] = $tipo;
        }
    
        return $resultado;
    }
    

    public function eliminar($id_usuario) {
        $usuario = new Usuario();
        return $usuario->eliminar($id_usuario);
    }

    public function login($email, $password) {
        $usuario = new Usuario();
        $usuarioValidado = $usuario->buscarPorEmail($email);

        if ($usuarioValidado) {
            $usuario_id = $usuarioValidado['id_usuario'];
            $usuario_nombre = $usuarioValidado['nombre'] . " " . $usuarioValidado['apellido'];
            $password_bd = $usuarioValidado['password'];
            $tipo = $usuarioValidado['tipo'];

            if (password_verify($password, $password_bd)) {
                session_start();
                $_SESSION["id"] = $usuario_id;
                $_SESSION["usuario"] = $usuario_nombre;
                $_SESSION["tipo"] = $tipo;
                header("Location: ../index.php");
                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>

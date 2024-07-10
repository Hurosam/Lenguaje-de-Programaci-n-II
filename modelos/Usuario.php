<?php

require_once "Conn.php";

class Usuario {
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;
    private $email;
    private $password;
    private $fecha_contratacion;
    private $sueldo;
    private $tipo; // Nuevo campo para diferenciar entre administrador y encargado

    public function __construct() {
        // Constructor vacío
    }

    // Métodos CRUD
    public function crear() {
        $conn = new Conn();
        $conexion = $conn->conectar();

        // Uso del operador ternario para manejar valores nulos
        $dni = isset($this->dni) ? "'{$this->dni}'" : "NULL";
        $telefono = isset($this->telefono) ? "'{$this->telefono}'" : "NULL";
        $fechaContratacion = isset($this->fecha_contratacion) ? "'{$this->fecha_contratacion}'" : "NULL";
        $sueldo = isset($this->sueldo) ? $this->sueldo : "NULL";

        $sql = "INSERT INTO usuarios (nombre, apellido, dni, telefono, email, password, fecha_contratacion, sueldo, tipo)
                VALUES ('{$this->nombre}', '{$this->apellido}', $dni, $telefono, '{$this->email}', '{$this->password}', $fechaContratacion, $sueldo, '{$this->tipo}')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }


    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuarios";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarEncargados() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuarios WHERE tipo = 'Encargado'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorId($id_usuario) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorEmail($email) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        // Escapamos el email para evitar problemas con caracteres especiales
        $email = $conexion->quote($email);
        $sql = "SELECT * FROM usuarios WHERE email = $email";
        $resultado = $conexion->query($sql);
        $usuario = $resultado->fetch();
        $conn->cerrar();
        return $usuario;
    }

    public function actualizar($actualizarPassword = false) {
        $conn = new Conn();
        $conexion = $conn->conectar();
    
        // Uso del operador ternario para manejar valores nulos
        $dni = isset($this->dni) ? "'{$this->dni}'" : "NULL";
        $telefono = isset($this->telefono) ? "'{$this->telefono}'" : "NULL";
        $fechaContratacion = isset($this->fecha_contratacion) ? "'{$this->fecha_contratacion}'" : "NULL";
        $sueldo = isset($this->sueldo) ? $this->sueldo : "NULL";
    
        $sql = "UPDATE usuarios SET 
                nombre = '{$this->nombre}', 
                apellido = '{$this->apellido}', 
                dni = $dni, 
                telefono = $telefono, 
                email = '{$this->email}', 
                fecha_contratacion = $fechaContratacion, 
                sueldo = $sueldo, 
                tipo = '{$this->tipo}'";
    
        if ($actualizarPassword && !empty($this->password)) {
            $sql .= ", password = '{$this->password}'";
        }
    
        $sql .= " WHERE id_usuario = {$this->id_usuario}";
    
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
    
    

    public function eliminar($id_usuario) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    // Getters y Setters
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getFechaContratacion() {
        return $this->fecha_contratacion;
    }

    public function setFechaContratacion($fecha_contratacion) {
        $this->fecha_contratacion = $fecha_contratacion;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
?>

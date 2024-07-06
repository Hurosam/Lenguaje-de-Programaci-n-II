<?php
require_once "layout/header.php";
require_once "controladores/UsuarioController.php";
session_start();
$uc = new UsuarioController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];
    $uc->insertar($nombres, $apellidos, $correo, $contrasena, $rol);
}

$usuarios = $uc->mostrar();
?>
<h2>INSERTAR NUEVO USUARIO</h2>
<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres"  placeholder="Ingrese nombre"required>
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos"  placeholder="Ingrese apellido"required>
    <br>
    <label for="correo">Correo:</label>
    <input type="email" name="correo"  placeholder="Ingrese correo"required>
    <br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena"  placeholder="Ingrese contraseña"required>
    <br>
    <label for="rol">Rol:</label>
    <select id="rol" name="rol" required>
        <option value="ResponsableCapacitacion">Responsable de Capacitación</option>
        <option value="Administrador">Administrador</option>
    </select>
    <br>
    <input type="submit" value="Insertar">
</form>

<?php
require_once "layout/footer.php";
?>
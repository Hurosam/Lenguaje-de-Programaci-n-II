<?php
require_once "controladores/UsuarioController.php";
session_start();
$uc = new UsuarioController();

// Mostrar todos los usuarios
$usuarios = $uc->mostrar();

// Procesar el formulario de eliminar usuario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_id"])) {
    $id = $_POST["eliminar_id"];
    $uc->eliminar($id);
    // Recargar la lista de usuarios después de eliminar
    $usuarios = $uc->mostrar();
}

// Procesar el formulario de modificar usuario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificar_id"])) {
    $id = $_POST["modificar_id"];
    // Redirigir a la página de modificar usuario con el ID específico
    header("Location: modificarUsuario.php?id=" . $id);
    exit();
}
?>

<h2>VER USUARIOS</h2>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach($usuarios as $usuario){
        echo "<tr>
            <td>".$usuario["id"]."</td>
            <td>".$usuario["nombres"]."</td>
            <td>".$usuario["apellidos"]."</td>
            <td>".$usuario["correo"]."</td>
            <td>".$usuario["contrasena"]."</td>
            <td>".$usuario["rol"]."</td>
            <td>
                <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                    <input type='hidden' name='eliminar_id' value='".$usuario["id"]."'>
                    <button type='submit'>Eliminar</button>
                </form>
                <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                    <input type='hidden' name='modificar_id' value='".$usuario["id"]."'>
                    <button type='submit'>Modificar</button>
                </form>
            </td>
        </tr>";
    }
    ?>
</table>

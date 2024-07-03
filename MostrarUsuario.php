<?php
require_once "controladores/UsuarioController.php";
session_start();
$uc = new UsuarioController();

$usuarios = $uc->mostrar();
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
        </tr>";
    }
    ?>
</table>
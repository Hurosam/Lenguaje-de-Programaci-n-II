<?php
require_once "layout/header.php";

?>

<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <input type="text" name="username" placeholder="Ingrese usuario"><br>
    <input type="password" name="password" placeholder="Ingrese contraseña"><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    require_once "controladores/UsuarioController.php";
    $uc = new UsuarioController();
    $uc->login($username, $password);
}

require_once "layout/footer.php";
?>
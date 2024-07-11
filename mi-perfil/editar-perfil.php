<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/UsuarioController.php";

// Verificar si hay una sesión iniciada
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$uc = new UsuarioController();
$id_usuario = $_SESSION["id"];
$usuario = $uc->buscarPorId($id_usuario)->fetch();

if (!$usuario) {
    echo "<div class='alert alert-danger' role='alert'>Usuario no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $tipo = $usuario['tipo']; // Mantener el tipo de usuario actual

    $uc->actualizar($id_usuario, $nombre, $apellido, $dni, $telefono, $email, null, null, $tipo, $password);

    header("Location: ../index.php");
    exit();
}
?>

<div class="container mb-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="../index.php" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Mi Perfil</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $usuario['dni']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la nueva contraseña (opcional)">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Actualizar Perfil</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

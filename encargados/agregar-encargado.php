<?php
require_once __DIR__."/../layout/header.php";

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fecha_contratacion = $_POST["fecha_contratacion"];
    $sueldo = $_POST["sueldo"];
    $tipo = 'Encargado'; // Definimos el tipo como Encargado

    require_once "../controladores/UsuarioController.php";
    $uc = new UsuarioController();
    $uc->registrar($nombre, $apellido, $dni, $telefono, $email, $password, $fecha_contratacion, $sueldo, $tipo);

    header("Location: mostrar-encargados.php");
    exit();
}
?>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-encargados.php" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Agregar Encargado</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña del encargado" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_contratacion" class="form-label">Fecha de Contratación</label>
                        <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="sueldo" class="form-label">Sueldo</label>
                        <input type="number" step="0.01" class="form-control" id="sueldo" name="sueldo" placeholder="Ingrese el sueldo del encargado" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar Encargado</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

<?php
require_once "../../layout/header.php";
require_once "../../controladores/ParticipanteController.php";

// Verificar si se ha proporcionado un id_capacitacion
if (!isset($_GET['id_capacitacion'])) {
    echo "<div class='alert alert-danger' role='alert'>Capacitación no encontrada.</div>";
    require_once "../../layout/footer.php";
    exit();
}

$id_capacitacion = $_GET['id_capacitacion'];

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];

    $pc = new ParticipanteController();
    $pc->crear($id_capacitacion, $nombre, $apellido, $dni, $email, $tipo);

    header("Location: mostrar-participantes.php?id_capacitacion=$id_capacitacion");
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-participantes.php?id_capacitacion=<?php echo $id_capacitacion; ?>" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Agregar Participante</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_capacitacion=" . $id_capacitacion; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del participante" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido del participante" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI del participante">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email del participante" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option value="Interno">Interno</option>
                            <option value="Externo">Externo</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar Participante</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../../layout/footer.php"; ?>

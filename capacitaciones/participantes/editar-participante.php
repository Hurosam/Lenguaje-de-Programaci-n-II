<?php
require_once "../../layout/header.php";
require_once "../../controladores/ParticipanteController.php";

// Verificar si se ha proporcionado un id_participante
if (!isset($_GET['id_participante'])) {
    echo "<div class='alert alert-danger' role='alert'>Participante no encontrado.</div>";
    require_once "../../layout/footer.php";
    exit();
}

$id_participante = $_GET['id_participante'];
$pc = new ParticipanteController();
$participante = $pc->buscarPorId($id_participante)->fetch();

if (!$participante) {
    echo "<div class='alert alert-danger' role='alert'>Participante no encontrado.</div>";
    require_once "../../layout/footer.php";
    exit();
}

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];

    $pc->actualizar($id_participante, $participante['id_capacitacion'],$nombre, $apellido, $dni, $email, $tipo);

    header("Location: mostrar-participantes.php?id_capacitacion=" . $participante['id_capacitacion']);
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-participantes.php?id_capacitacion=<?php echo $participante['id_capacitacion']; ?>" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Editar Participante</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_participante=" . $id_participante; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $participante['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $participante['apellido']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $participante['dni']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $participante['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            <option value="Interno" <?php echo $participante['tipo'] == 'Interno' ? 'selected' : ''; ?>>Interno</option>
                            <option value="Externo" <?php echo $participante['tipo'] == 'Externo' ? 'selected' : ''; ?>>Externo</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Actualizar Participante</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../../layout/footer.php"; ?>

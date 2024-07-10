<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/EstablecimientoController.php";

$ec = new EstablecimientoController();

if ($_SESSION['tipo'] == 'Encargado') {
    $id_encargado = $_SESSION['id'];
    $establecimientos = $ec->buscarPorIdEncargado($id_encargado);
} else {
    $establecimientos = $ec->mostrar();
}

if (isset($_POST["submit"])) {
    $id_establecimiento = $_POST["id_establecimiento"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $duracion = $_POST["duracion"];
    $estado = $_POST["estado"];

    require_once "../controladores/CapacitacionController.php";
    $cc = new CapacitacionController();
    $cc->crear($id_establecimiento, $nombre, $descripcion, $fecha, $duracion, $estado);

    header("Location: mostrar-capacitaciones.php");
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-capacitaciones.php" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Agregar Capacitación</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="mb-3">
                        <label for="id_establecimiento" class="form-label">Establecimiento</label>
                        <select class="form-control" id="id_establecimiento" name="id_establecimiento" required>
                            <option value="">Seleccione un establecimiento</option>
                            <?php foreach ($establecimientos as $establecimiento): ?>
                                <option value="<?php echo $establecimiento['id_establecimiento']; ?>">
                                    <?php echo $establecimiento['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la capacitación" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la capacitación" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (horas)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="Programada">Programada</option>
                            <option value="En progreso">En progreso</option>
                            <option value="Completada">Completada</option>
                            <option value="Cancelada">Cancelada</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar Capacitación</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/CapacitacionController.php";
require_once "../controladores/EstablecimientoController.php";

// Verificar si se ha proporcionado un id_capacitacion
if (!isset($_GET['id_capacitacion'])) {
    echo "<div class='alert alert-danger' role='alert'>Capacitación no encontrada.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_capacitacion = $_GET['id_capacitacion'];
$cc = new CapacitacionController();
$capacitacion = $cc->buscarPorId($id_capacitacion)->fetch();

if (!$capacitacion) {
    echo "<div class='alert alert-danger' role='alert'>Capacitación no encontrada.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$ec = new EstablecimientoController();
$establecimientos = $ec->mostrar();

if (isset($_POST["submit"])) {
    $id_establecimiento = $_POST["id_establecimiento"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $duracion = $_POST["duracion"];
    $estado = $_POST["estado"];

    $cc->actualizar($id_capacitacion, $id_establecimiento, $nombre, $descripcion, $fecha, $duracion, $estado);

    header("Location: mostrar-capacitaciones.php?id_establecimiento=$id_establecimiento");
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-capacitaciones.php?id_establecimiento=<?php echo $capacitacion['id_establecimiento']; ?>" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Editar Capacitación</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_capacitacion=" . $id_capacitacion; ?>">
                    <div class="mb-3">
                        <label for="id_establecimiento" class="form-label">Establecimiento</label>
                        <select class="form-control" id="id_establecimiento" name="id_establecimiento" required>
                            <option value="">Seleccione un establecimiento</option>
                            <?php foreach ($establecimientos as $establecimiento): ?>
                                <option value="<?php echo $establecimiento['id_establecimiento']; ?>" <?php echo $establecimiento['id_establecimiento'] == $capacitacion['id_establecimiento'] ? 'selected' : ''; ?>>
                                    <?php echo $establecimiento['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la capacitación" value="<?php echo $capacitacion['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la capacitación" required><?php echo $capacitacion['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $capacitacion['fecha']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duración (horas)</label>
                        <input type="number" class="form-control" id="duracion" name="duracion" value="<?php echo $capacitacion['duracion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="Programada" <?php echo $capacitacion['estado'] == 'Programada' ? 'selected' : ''; ?>>Programada</option>
                            <option value="En progreso" <?php echo $capacitacion['estado'] == 'En progreso' ? 'selected' : ''; ?>>En progreso</option>
                            <option value="Completada" <?php echo $capacitacion['estado'] == 'Completada' ? 'selected' : ''; ?>>Completada</option>
                            <option value="Cancelada" <?php echo $capacitacion['estado'] == 'Cancelada' ? 'selected' : ''; ?>>Cancelada</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Actualizar Capacitación</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

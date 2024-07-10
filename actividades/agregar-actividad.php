<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/ActividadController.php";
require_once "../controladores/EstablecimientoController.php";

if (!isset($_GET['id_establecimiento'])) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no proporcionado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_establecimiento = $_GET['id_establecimiento'];
$ec = new EstablecimientoController();
$establecimiento = $ec->buscarPorId($id_establecimiento);

if (!$establecimiento) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $costo = $_POST["costo"];

    $ac = new ActividadController();
    $ac->crear($id_establecimiento, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $costo);

    header("Location: mostrar-actividades.php?id_establecimiento=$id_establecimiento");
    exit();
}
?>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-actividades.php?id_establecimiento=<?php echo $id_establecimiento; ?>" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Agregar Actividad</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_establecimiento=" . $id_establecimiento; ?>">
                    <input type="hidden" name="id_establecimiento" value="<?php echo $id_establecimiento; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la actividad" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la actividad" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>
                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" step="0.01" class="form-control" id="costo" name="costo" placeholder="Ingrese el costo de la actividad" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar Actividad</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

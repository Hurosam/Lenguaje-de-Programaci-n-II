<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/ActividadController.php";
require_once "../controladores/EstablecimientoController.php";

// Verificar si se ha proporcionado un id_actividad
if (!isset($_GET['id_actividad'])) {
    echo "<div class='alert alert-danger' role='alert'>Actividad no encontrada.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_actividad = $_GET['id_actividad'];
$ac = new ActividadController();
$actividad = $ac->buscarPorId($id_actividad)->fetch();
$id_establecimiento = $actividad["id_establecimiento"];

if (!$actividad) {
    echo "<div class='alert alert-danger' role='alert'>Actividad no encontrada.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$ec = new EstablecimientoController();
$establecimiento = $ec->buscarPorId($id_establecimiento)->fetch();

$tipo_usuario = $_SESSION['tipo'];
$id_usuario = $_SESSION['id'];


if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $costo = $_POST["costo"];

    $ac->actualizar($id_actividad, $id_establecimiento, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $costo);

    header("Location: mostrar-actividades.php?id_establecimiento=$id_establecimiento");
    exit();
}

if (isset($_POST["delete"])) {
    $ac->eliminar($id_actividad);
    header("Location: mostrar-actividades.php?id_establecimiento=$id_establecimiento");
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-actividades.php?id_establecimiento=<?php echo $actividad['id_establecimiento']; ?>" class="btn btn-outline-secondary btn-sm">X</a>
                </div>
                <h2 class="mb-4 text-center fs-4">Actividad</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_actividad=" . $id_actividad; ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre de la actividad" value="<?php echo $actividad['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción de la actividad" required><?php echo $actividad['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $actividad['fecha_inicio']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $actividad['fecha_fin']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" step="0.1" class="form-control" id="costo" name="costo" placeholder="Ingrese el costo de la actividad" value="<?php echo $actividad['costo']; ?>" required>
                    </div>
                    <?php if ($tipo_usuario == 'Administrador' || $id_usuario == $establecimiento['id_encargado']): ?>
                        <button type="submit" name="submit" class="btn btn-primary w-100 mb-2">Actualizar actividad</button>
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_actividad=" . $id_actividad; ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');">
                            <button type="submit" name="delete" class="btn btn-danger w-100">Eliminar actividad</button>
                        </form>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

<?php 
require_once __DIR__."/../layout/header.php";
require_once __DIR__."/../controladores/CapacitacionController.php";
require_once __DIR__."/../controladores/EstablecimientoController.php";

// Iniciar sesión y verificar el tipo de usuario
if (!isset($_SESSION["tipo"])) {
    echo "<div class='alert alert-danger' role='alert'>Acceso no autorizado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
} 

$tipo_usuario = $_SESSION["tipo"];
$id_usuario = $_SESSION["id"]; 

$cc = new CapacitacionController();
$ec = new EstablecimientoController();

if ($tipo_usuario == "Administrador") {
    // Mostrar todas las capacitaciones
    $capacitaciones = $cc->mostrar();
} else if ($tipo_usuario == "Encargado") {
    // Mostrar solo las capacitaciones de los establecimientos a su cargo
    $establecimientos = $ec->buscarPorIdEncargado($id_usuario);
    $capacitaciones = [];
    foreach ($establecimientos as $establecimiento) {
        $capacitaciones_establecimiento = $cc->buscarPorIdEstablecimiento($establecimiento['id_establecimiento']);
        foreach ($capacitaciones_establecimiento as $capacitacion) {
            $capacitaciones[] = $capacitacion;
        }
    }
}

if (isset($_POST['delete'])) {
    $id_capacitacion = $_POST['id_capacitacion'];
    $cc->eliminar($id_capacitacion);
    header("Location: mostrar-capacitaciones.php");
    exit();
}
?>

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-capacitacion.php" class="btn btn-primary">Agregar capacitación</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Duración</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Establecimiento</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($capacitaciones as $capacitacion): ?>
                        <tr>
                            <td><?php echo $capacitacion['nombre']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($capacitacion['fecha'])); ?></td>
                            <td><?php echo $capacitacion['duracion']; ?> horas</td>
                            <td><?php echo $capacitacion['estado']; ?></td>
                            <td><?php echo $capacitacion['nombre_establecimiento']; ?></td>
                            <td><?php echo $capacitacion['nombre_encargado']; ?></td>
                            <td>
                                <a href="editar-capacitacion.php?id_capacitacion=<?php echo $capacitacion['id_capacitacion']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <form method="post" action="" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta capacitación?');">
                                    <input type="hidden" name="id_capacitacion" value="<?php echo $capacitacion['id_capacitacion']; ?>">
                                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                                <a href="./participantes/mostrar-participantes.php?id_capacitacion=<?php echo $capacitacion['id_capacitacion']; ?>" class="btn btn-sm btn-secondary">Participantes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__."/../layout/footer.php"; ?>

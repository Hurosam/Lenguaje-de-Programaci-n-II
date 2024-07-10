<?php 
require_once __DIR__."/../layout/header.php";
require_once __DIR__."/../controladores/ActividadController.php";

// Verificar si se ha proporcionado un id_establecimiento
if (!isset($_GET['id_establecimiento'])) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_establecimiento = $_GET['id_establecimiento'];
$ac = new ActividadController();
$actividades = $ac->buscarPorIdEstablecimiento($id_establecimiento);
?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-actividad.php?id_establecimiento=<?php echo $id_establecimiento; ?>" class="btn btn-primary">Agregar actividad</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($actividades as $actividad): ?>
            <div class="col-md-4 mb-4">
                <a href="editar-actividad.php?id_actividad=<?php echo $actividad['id_actividad']; ?>" class="text-decoration-none text-dark">
                    <div class="card card-custom shadow-sm h-100" style="transition: transform 0.3s;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $actividad['nombre']; ?></h5>
                                <p class="card-text"><?php echo $actividad['descripcion']; ?></p>
                                <p class="card-text"><strong>Costo:</strong> S/. <?php echo $actividad['costo']; ?></p>
                                <p class="card-text"><strong>Fecha de inicio:</strong> <?php echo date('d-m-Y', strtotime($actividad['fecha_inicio'])); ?></p>
                                <p class="card-text"><strong>Fecha de fin:</strong> <?php echo date('d-m-Y', strtotime($actividad['fecha_fin'])); ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .card-custom:hover {
        transform: translateY(-10px);
    }
    .card-custom {
        height: 100%;
    }
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>

<?php require_once __DIR__."/../layout/footer.php"; ?>

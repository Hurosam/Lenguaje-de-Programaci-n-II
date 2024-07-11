<?php 
require_once __DIR__."/../layout/header.php";
require_once __DIR__."/../controladores/EstablecimientoController.php";

// Verificar si se ha proporcionado un id_destino
if (!isset($_GET['id_destino'])) {
    echo "<div class='alert alert-danger' role='alert'>Destino no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_destino = $_GET['id_destino'];
$ec = new EstablecimientoController();
$establecimientos = $ec->buscarPorIdDestino($id_destino);
?>

<div class="container ">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-establecimiento.php?id_destino=<?php echo $id_destino; ?>" class="btn btn-primary">Agregar establecimiento</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($establecimientos as $establecimiento): ?>
            <div class="col-md-4 mb-4">
                <a href="editar-establecimiento.php?id_establecimiento=<?php echo $establecimiento['id_establecimiento']; ?>" class="text-decoration-none text-dark">
                    <div class="card card-custom shadow-sm h-100" style="transition: transform 0.3s;">
                        <?php 
                        $foto = !empty($establecimiento['foto']) ? $establecimiento['foto'] : '../archivos/imagenes/default.png';
                        ?>
                        <img src="<?php echo $foto; ?>" class="card-img-top" alt="<?php echo $establecimiento['nombre']; ?>" style="height: 180px; object-fit: cover;">
                        <div class="card-body card-body-custom d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $establecimiento['nombre']; ?></h5>
                                <p class="card-text"><?php echo $establecimiento['descripcion']; ?></p>
                                <p class="card-text"><strong>Tipo:</strong> <?php echo $establecimiento['tipo']; ?></p>
                                <p class="card-text"><strong>Capacidad:</strong> <?php echo $establecimiento['capacidad']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="<?php echo $establecimiento['url_maps']; ?>" target="_blank" class="btn btn-secondary w-100">Google Maps</a>
                                <a href="../actividades/mostrar-actividades.php?id_establecimiento=<?php echo $establecimiento['id_establecimiento']; ?>" class="ms-2 btn btn-primary w-100">Actividades</a>
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

<?php require_once __DIR__."/../layout/footer.php" ?>

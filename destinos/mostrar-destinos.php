<?php 
require_once __DIR__."/../layout/header.php";
require_once __DIR__."/../controladores/DestinoController.php";

$dc = new DestinoController();
$destinos = $dc->mostrar();
?>

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-destino.php" class="btn btn-primary">Agregar destino</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($destinos as $destino): ?>
            <div class="col-md-4 mb-4">
                <a href="editar-destino.php?id_destino=<?php echo $destino['id_destino']; ?>" class="text-decoration-none text-dark">
                    <div class="card card-custom shadow-sm h-100" style="transition: transform 0.3s;">
                        <?php 
                        $foto = !empty($destino['foto']) ? $destino['foto'] : '../archivos/imagenes/default.png';
                        ?>
                        <img src="<?php echo $foto; ?>" class="card-img-top" alt="<?php echo $destino['nombre']; ?>" style="height: 180px; object-fit: cover;">
                        <div class="card-body card-body-custom d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><?php echo $destino['nombre']; ?></h5>
                                <p class="card-text"><?php echo $destino['descripcion']; ?></p>
                                <p class="card-text"><strong>Ubicación:</strong> <?php echo $destino['ubicacion']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="<?php echo $destino['url_maps']; ?>" target="_blank" class="btn btn-secondary w-100">Google Maps</a>
                                <a href="../establecimientos/mostrar-establecimientos.php?id_destino=<?php echo $destino['id_destino']; ?>" class="ms-2 btn btn-primary w-100">Establecimientos</a>
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

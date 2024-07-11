<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/DestinoController.php";

// Verificar si se ha proporcionado un id_destino
if (!isset($_GET['id_destino'])) {
    echo "<div class='alert alert-danger' role='alert'>ID de destino no proporcionado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_destino = $_GET['id_destino'];
$dc = new DestinoController();
$destino = $dc->buscarPorId($id_destino)->fetch();

if (!$destino) {
    echo "<div class='alert alert-danger' role='alert'>Destino no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $ubicacion = $_POST["ubicacion"];
    $url_maps = $_POST["url_maps"];
    $foto = $_FILES["foto"]["name"];

    // Procesar la subida de la imagen
    $carpeta_imagenes = "../archivos/imagenes/destinos/";
    $direccion_foto = $carpeta_imagenes . basename($_FILES["foto"]["name"]);
    
    // Verificar si el directorio 'archivos/imagenes/' existe, si no, crearlo
    if (!is_dir($carpeta_imagenes)) {
        mkdir($carpeta_imagenes, 0777, true);
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $direccion_foto)) {
        $foto = $direccion_foto;
    } else {
        $foto = $destino['foto']; // Mantener la foto anterior si no se ha subido una nueva
    }

    $dc->actualizar($id_destino, $nombre, $descripcion, $ubicacion, $url_maps, $foto);

    header("Location: mostrar-destinos.php");
    exit();
}

if (isset($_POST["delete"])) {
    $dc->eliminar($id_destino);
    header("Location: mostrar-destinos.php");
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-destinos.php" class="btn btn-outline-secondary btn-sm">x</a>
                </div>
                <h2 class="mb-4 fs-4">Destino</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_destino=" . $id_destino; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del destino" value="<?php echo $destino['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del destino" required><?php echo $destino['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación del destino" value="<?php echo $destino['ubicacion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_maps" class="form-label">URL de Google Maps</label>
                        <input type="text" class="form-control" id="url_maps" name="url_maps" placeholder="Ingrese el enlace de Google Maps" value="<?php echo $destino['url_maps']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <small class="form-text text-muted">Dejar en blanco para mantener la foto actual.</small>
                    </div>
                    <?php if ($_SESSION['tipo'] == 'Administrador'): ?>
                        <button type="submit" name="submit" class="btn btn-primary w-100 mb-2">Actualizar destino</button>
                    <?php endif; ?>
                </form>
                <?php if ($_SESSION['tipo'] == 'Administrador'): ?>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_destino=" . $id_destino; ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este destino?');">
                        <button type="submit" name="delete" class="btn btn-danger w-100">Eliminar destino</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

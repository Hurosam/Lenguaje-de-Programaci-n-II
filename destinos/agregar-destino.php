<?php
require_once __DIR__."/../layout/header.php";

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

        require_once "../controladores/DestinoController.php";
        $dc = new DestinoController();
        $dc->crear($nombre, $descripcion, $ubicacion, $url_maps, $foto);

        // Redireccionar a la página de mostrar destinos
        header("Location: mostrar-destinos.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al subir el archivo.</div>";
    }
}
?>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <h2 class="mb-4 text-center fs-4">Agregar destino</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del destino" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del destino" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación del destino" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_maps" class="form-label">URL de Google Maps</label>
                        <input type="text" class="form-control" id="url_maps" name="url_maps" placeholder="Ingrese el enlace de Google Maps" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar destino</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

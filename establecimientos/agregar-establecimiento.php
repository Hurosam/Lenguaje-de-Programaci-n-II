<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/UsuarioController.php";

if (!isset($_GET['id_destino'])) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no encontrado en este destino.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_destino = $_GET['id_destino'];

$uc = new UsuarioController();
$encargados = $uc->mostrarEncargados();

if (isset($_POST["submit"])) {
    $id_encargado = $_POST["id_encargado"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $direccion = $_POST["direccion"];
    $url_maps = $_POST["url_maps"];
    $capacidad = $_POST["capacidad"];
    $ruc = $_POST["ruc"];
    $num_contacto = $_POST["num_contacto"];
    $horario_atencion = $_POST["horario_atencion"];
    $descripcion = $_POST["descripcion"];
    $foto = $_FILES["foto"]["name"];

    // Procesar la subida de la imagen
    $carpeta_imagenes = "../archivos/imagenes/establecimientos/";
    $direccion_foto = $carpeta_imagenes . basename($_FILES["foto"]["name"]);

    if (!is_dir($carpeta_imagenes)) {
        mkdir($carpeta_imagenes, 0777, true);
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $direccion_foto)) {
        $foto = $direccion_foto;
    } else {
        $foto = ""; // No se subió ninguna foto
    }

    require_once "../controladores/EstablecimientoController.php";
    $ec = new EstablecimientoController();
    $ec->crear($id_destino, $id_encargado, $nombre, $tipo, $direccion, $url_maps, $capacidad, $ruc, $num_contacto, $horario_atencion, $descripcion, $foto);

    // Redireccionar a la página de mostrar establecimientos
    header("Location: mostrar-establecimientos.php?id_destino=$id_destino");
    exit();
}
?>

<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5 position-relative">
                <a href="mostrar-establecimientos.php?id_destino=<?php echo $id_destino; ?>" class="position-absolute top-0 end-0 mt-1 me-4 fs-3" style="text-decoration: none; font-size: 24px;">
                    x
                </a>
                <h2 class="mb-4 text-center fs-4">Agregar Establecimiento</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_destino=" . $id_destino; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_encargado" class="form-label">Encargado</label>
                        <select class="form-control" id="id_encargado" name="id_encargado" required>
                            <option value="">Seleccione un encargado</option>
                            <?php foreach ($encargados as $encargado): ?>
                                <option value="<?php echo $encargado['id_usuario']; ?>"><?php echo $encargado['nombre'] . " " . $encargado['apellido']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo de establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_maps" class="form-label">URL de Google Maps</label>
                        <input type="text" class="form-control" id="url_maps" name="url_maps" placeholder="Ingrese el enlace de Google Maps" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese la capacidad del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="ruc" class="form-label">RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Ingrese el RUC del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_contacto" class="form-label">Número de Contacto</label>
                        <input type="text" class="form-control" id="num_contacto" name="num_contacto" placeholder="Ingrese el número de contacto del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="horario_atencion" class="form-label">Horario de Atención</label>
                        <input type="text" class="form-control" id="horario_atencion" name="horario_atencion" placeholder="Ingrese el horario de atención del establecimiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del establecimiento" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Agregar Establecimiento</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

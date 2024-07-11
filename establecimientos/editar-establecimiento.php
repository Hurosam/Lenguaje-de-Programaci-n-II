<?php
require_once __DIR__."/../layout/header.php";
require_once "../controladores/EstablecimientoController.php";
require_once "../controladores/UsuarioController.php";

// Verificar si se ha proporcionado un id_establecimiento
if (!isset($_GET['id_establecimiento'])) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no encontrado en este destino.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$id_establecimiento = $_GET['id_establecimiento'];
$ec = new EstablecimientoController();
$establecimiento = $ec->buscarPorId($id_establecimiento)->fetch();

if (!$establecimiento) {
    echo "<div class='alert alert-danger' role='alert'>Establecimiento no encontrado.</div>";
    require_once __DIR__."/../layout/footer.php";
    exit();
}

$uc = new UsuarioController();
$encargados = $uc->mostrarEncargados();

$tipo_usuario = $_SESSION['tipo'];
$id_usuario = $_SESSION['id'];

if (isset($_POST["submit"])) {
    $id_destino = $_POST["id_destino"];
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
    $carpeta_imagenes = "../archivos/imagenes/";
    $direccion_foto = $carpeta_imagenes . basename($_FILES["foto"]["name"]);

    if (!is_dir($carpeta_imagenes)) {
        mkdir($carpeta_imagenes, 0777, true);
    }

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $direccion_foto)) {
        $foto = $direccion_foto;
    } else {
        $foto = $establecimiento['foto']; // Mantener la foto anterior si no se ha subido una nueva
    }

    if ($tipo_usuario != 'Administrador') {
        $id_encargado = $establecimiento['id_encargado']; // No permitir cambiar el encargado si no es administrador
    }

    $ec->actualizar($id_establecimiento, $id_destino, $id_encargado, $nombre, $tipo, $direccion, $url_maps, $capacidad, $ruc, $num_contacto, $horario_atencion, $descripcion, $foto);

    header("Location: mostrar-establecimientos.php?id_destino=$id_destino");
    exit();
}

if (isset($_POST["delete"])) {
    $ec->eliminar($id_establecimiento);
    header("Location: mostrar-establecimientos.php?id_destino=" . $establecimiento['id_destino']);
    exit();
}
?>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="d-flex justify-content-end">
                    <a href="mostrar-establecimientos.php?id_destino=<?php echo $establecimiento['id_destino']; ?>" class="btn btn-outline-secondary btn-sm">x</a>
                </div>
                <h2 class="mb-4 fs-4">Establecimiento</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_establecimiento=" . $id_establecimiento; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_destino" value="<?php echo $establecimiento['id_destino']; ?>">
                    <?php if ($tipo_usuario == 'Administrador'): ?>
                    <div class="mb-3">
                        <label for="id_encargado" class="form-label">Encargado</label>
                        <select class="form-control" id="id_encargado" name="id_encargado" required>
                            <option value="">Seleccione un encargado</option>
                            <?php foreach ($encargados as $encargado): ?>
                                <option value="<?php echo $encargado['id_usuario']; ?>" <?php echo $encargado['id_usuario'] == $establecimiento['id_encargado'] ? 'selected' : ''; ?>>
                                    <?php echo $encargado['nombre'] . " " . $encargado['apellido']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php else: ?>
                        <input type="hidden" name="id_encargado" value="<?php echo $establecimiento['id_encargado']; ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del establecimiento" value="<?php echo $establecimiento['nombre']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo de establecimiento" value="<?php echo $establecimiento['tipo']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección del establecimiento" value="<?php echo $establecimiento['direccion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_maps" class="form-label">URL de Google Maps</label>
                        <input type="text" class="form-control" id="url_maps" name="url_maps" placeholder="Ingrese el enlace de Google Maps" value="<?php echo $establecimiento['url_maps']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese la capacidad del establecimiento" value="<?php echo $establecimiento['capacidad']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ruc" class="form-label">RUC</label>
                        <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Ingrese el RUC del establecimiento" value="<?php echo $establecimiento['ruc']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_contacto" class="form-label">Número de Contacto</label>
                        <input type="text" class="form-control" id="num_contacto" name="num_contacto" placeholder="Ingrese el número de contacto del establecimiento" value="<?php echo $establecimiento['num_contacto']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="horario_atencion" class="form-label">Horario de Atención</label>
                        <input type="text" class="form-control" id="horario_atencion" name="horario_atencion" placeholder="Ingrese el horario de atención del establecimiento" value="<?php echo $establecimiento['horario_atencion']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del establecimiento" required><?php echo $establecimiento['descripcion']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <small class="form-text text-muted">Dejar en blanco para mantener la foto actual.</small>
                    </div>
                    <?php if ($tipo_usuario == 'Administrador' || $id_usuario == $establecimiento['id_encargado']): ?>
                        <button type="submit" name="submit" class="btn btn-primary w-100 mb-2">Actualizar Establecimiento</button>
                    <?php endif; ?>
                </form>
                <?php if ($tipo_usuario == 'Administrador' || $id_usuario == $establecimiento['id_encargado']): ?>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id_establecimiento=" . $id_establecimiento; ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este establecimiento?');">
                        <button type="submit" name="delete" class="btn btn-danger w-100">Eliminar Establecimiento</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__."/../layout/footer.php";
?>

<?php
require_once "layout/header.php";
require_once "controladores/EstablecimientoController.php";
session_start();
$ec = new EstablecimientoController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $tipo = $_POST["tipo"];
    $contacto = $_POST["contacto"];
    $responsable = $_POST["responsable"];
    $ec->insertar($nombre, $direccion, $tipo, $contacto, $responsable);
}

$establecimientos = $ec->mostrar();
?>

<h2>INSETAR NUEVO ESTABLECIMIENTO</h2>
<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese nombre" required>
    <br>
    <label for="direccion">Dirección</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese dirección" required>
    
    <br>
    <label for="tipo">Tipo</label>
    <select class="form-select" aria-label="Default select example" id="tipo" name="tipo" required>
        <option value="Hotel">Hotel</option>
        <option value="Campo">Campo</option>
        <option value="Resorts">Resorts</option>
        <option value="Cabañas">Cabañas</option>
    </select>

    <br>
    <label for="contacto">Contacto</label>
    <input type="text" name="contacto" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese contacto" required>
    <br>
    <label for="responsable">Responsable</label>
    <input type="number" name="responsable" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese ID del responsable" required>
    <br>
    <input type="submit" value="Insertar">
</form>
<?php
require_once "layout/footer.php";
?>


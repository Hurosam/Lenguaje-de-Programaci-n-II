<?php
require_once "controladores/CapacitacionController.php";
session_start();
$cc = new CapacitacionController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema = $_POST["tema"];
    $fecha = $_POST["fecha"];
    $duracion = $_POST["duracion"];
    $establecimiento = $_POST["establecimiento"];
    $cc->insertar($tema, $fecha, $duracion, $establecimiento);
}

$capacitaciones = $cc->mostrar();
?>

<h2>INSERTAR NUEVA CAPACITACION</h2>
<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <label for="tema">Tema:</label>
    <input type="text" name="tema" placeholder="Ingrese tema" required>
    <br>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required>
    <br>
    <label for="duracion">Duración (en horas):</label>
    <input type="number" name="duracion" placeholder="Ingrese duración" required>
    <br>
    <label for="establecimiento">Establecimiento:</label>
    <input type="number" name="establecimiento" placeholder="Ingrese ID del establecimiento" required>
    <br>
    <input type="submit" value="Insertar">
</form>

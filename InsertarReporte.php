<?php
require_once "controladores/ReporteController.php";
session_start();
$rc = new ReporteController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $fechaGeneracion = $_POST["fechaGeneracion"];
    $contenido = $_POST["contenido"];
    $responsable = $_POST["responsable"];
    $rc->insertar($tipo, $fechaGeneracion, $contenido, $responsable);
}

$reportes = $rc->mostrar();
?>
<h2>INSERTAR NUEVO REPORTE</h2>
<form method="post" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="Hotel">Hotel</option>
        <option value="Campo">Campo</option>
        <option value="Resorts">Resorts</option>
        <option value="Cabañas">Cabañas</option>
    </select>
    <br>
    <label for="fechaGeneracion">Fecha de Generación:</label>
    <input type="date" name="fechaGeneracion" required>
    <br>
    <label for="contenido">Contenido:</label>
    <textarea name="contenido" placeholder="Ingrese contenido" required></textarea>
    <br>
    <label for="responsable">Responsable:</label>
    <input type="number" name="responsable" placeholder="ID del responsable" required>
    <br>
    <input type="submit" value="Insertar">
</form>

<h2>LISTA DE REPORTES</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Fecha de Generación</th>
        <th>Contenido</th>
        <th>Responsable</th>
    </tr>
    <?php foreach ($reportes as $reporte) { ?>
        <tr>
            <td><?php echo $reporte["id"]; ?></td>
            <td><?php echo $reporte["tipo"]; ?></td>
            <td><?php echo $reporte["fechaGeneracion"]; ?></td>
            <td><?php echo $reporte["contenido"]; ?></td>
            <td><?php echo $reporte["responsable"]; ?></td>
        </tr>
    <?php } ?>
</table>

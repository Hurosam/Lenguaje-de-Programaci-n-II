<?php
require_once "controladores/ReporteController.php";
session_start();
$rc = new ReporteController();

// Mostrar todos los reportes
$reportes = $rc->mostrar();

// Procesar el formulario de eliminar reporte si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_id"])) {
    $id = $_POST["eliminar_id"];
    $rc->eliminar($id);
    // Recargar la lista de reportes después de eliminar
    $reportes = $rc->mostrar();
}

// Procesar el formulario de modificar reporte si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificar_id"])) {
    $id = $_POST["modificar_id"];
    // Redirigir a la página de modificar reporte con el ID específico
    header("Location: modificarReporte.php?id=" . $id);
    exit();
}
?>

<h2>VER REPORTES</h2>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Fecha de Generación</th>
        <th>Contenido</th>
        <th>Responsable</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach($reportes as $reporte){
        echo "<tr>
            <td>".$reporte["id"]."</td>
            <td>".$reporte["tipo"]."</td>
            <td>".$reporte["fechaGeneracion"]."</td>
            <td>".$reporte["contenido"]."</td>
            <td>".$reporte["responsable"]."</td>
            <td>
                <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                    <input type='hidden' name='eliminar_id' value='".$reporte["id"]."'>
                    <button type='submit'>Eliminar</button>
                </form>
                <form method='post' action='".$_SERVER["PHP_SELF"]."'>
                    <input type='hidden' name='modificar_id' value='".$reporte["id"]."'>
                    <button type='submit'>Modificar</button>
                </form>
            </td>
        </tr>";
    }
    ?>
</table>

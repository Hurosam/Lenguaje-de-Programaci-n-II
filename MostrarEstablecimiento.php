<?php
require_once "layout/header.php";
require_once "controladores/EstablecimientoController.php";
session_start();
$ec = new EstablecimientoController();

$establecimientos = $ec->mostrar();
?>

<h2>MOSTRAR LOS ESTABLECIMIENTOS</h2>
<table class="table table-hover">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Tipo</th>
        <th>Contacto</th>
        <th>Responsable</th>
    </tr>
    <?php
    foreach($establecimientos as $establecimiento){
        echo "<tr>
            <td>".$establecimiento["id"]."</td>
            <td>".$establecimiento["nombre"]."</td>
            <td>".$establecimiento["direccion"]."</td>
            <td>".$establecimiento["tipo"]."</td>
            <td>".$establecimiento["contacto"]."</td>
            <td>".$establecimiento["responsable"]."</td>
        </tr>";
    }
    ?>
</table>

<?php
require_once "layout/footer.php";
?>
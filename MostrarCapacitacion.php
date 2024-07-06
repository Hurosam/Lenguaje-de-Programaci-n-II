<?php
require_once "layout/header.php";
require_once "controladores/CapacitacionController.php";
session_start();
$cc = new CapacitacionController();

$capacitaciones = $cc->mostrar();
?>

<h2>MOSTAR CAPACITACIONES</h2>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Tema</th>
        <th>Fecha</th>
        <th>Duración</th>
        <th>Establecimiento</th>
    </tr>
    <?php
    foreach($capacitaciones as $capacitacion){
        echo "<tr>
            <td>".$capacitacion["id"]."</td>
            <td>".$capacitacion["tema"]."</td>
            <td>".$capacitacion["fecha"]."</td>
            <td>".$capacitacion["duracion"]."</td>
            <td>".$capacitacion["establecimiento"]."</td>
        </tr>";
    }
    ?>
</table>
<?php
require_once "layout/footer.php";
?>
<?php 
require_once "../../layout/header.php";
require_once "../../controladores/ParticipanteController.php";

// Verificar si se ha proporcionado un id_capacitacion
if (!isset($_GET['id_capacitacion'])) {
    echo "<div class='alert alert-danger' role='alert'>Capacitación no encontrada.</div>";
    require_once "../../layout/footer.php";
    exit();
}

$id_capacitacion = $_GET['id_capacitacion'];
$pc = new ParticipanteController();

if (isset($_POST['delete'])) {
    $id_participante = $_POST['id_participante'];
    $pc->eliminar($id_participante);
    header("Location: mostrar-participantes.php?id_capacitacion=$id_capacitacion");
    exit();
}

$participantes = $pc->buscarPorIdCapacitacion($id_capacitacion);
?>

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-participante.php?id_capacitacion=<?php echo $id_capacitacion; ?>" class="btn btn-primary">Agregar participante</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($participantes as $participante): ?>
                        <tr>
                            <td><?php echo $participante['nombre']; ?></td>
                            <td><?php echo $participante['apellido']; ?></td>
                            <td><?php echo $participante['dni']; ?></td>
                            <td><?php echo $participante['email']; ?></td>
                            <td><?php echo $participante['tipo']; ?></td>
                            <td>
                                <a href="editar-participante.php?id_participante=<?php echo $participante['id_participante']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <form method="post" action="" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este participante?');">
                                    <input type="hidden" name="id_participante" value="<?php echo $participante['id_participante']; ?>">
                                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "../../layout/footer.php"; ?>

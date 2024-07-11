<?php 
require_once __DIR__."/../layout/header.php";
require_once __DIR__."/../controladores/UsuarioController.php";

$uc = new UsuarioController();
$encargados = $uc->mostrarEncargados();
?>

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <a href="agregar-encargado.php" class="btn btn-primary">Agregar Encargado</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Sueldo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($encargados as $encargado): ?>
                        <tr>
                            <td><?php echo $encargado['id_usuario']; ?></td>
                            <td><?php echo $encargado['nombre']; ?></td>
                            <td><?php echo $encargado['apellido']; ?></td>
                            <td><?php echo $encargado['dni']; ?></td>
                            <td><?php echo $encargado['telefono']; ?></td>
                            <td><?php echo $encargado['email']; ?></td>
                            <td><?php echo $encargado['sueldo']; ?></td>
                            <td>
                                <a href="editar-encargado.php?id_usuario=<?php echo $encargado['id_usuario']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="eliminar-encargado.php?id_usuario=<?php echo $encargado['id_usuario']; ?>" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Se eliminará la cuenta de este encargado. ¿Desea continuar?');">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__."/../layout/footer.php"; ?>

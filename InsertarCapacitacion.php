<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Capacitación</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Ingresar Capacitación</h2>
            <?php
            // Ejemplo de mensaje de error
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger" role="alert">Error al insertar la capacitación. Por favor, intente nuevamente.</div>';
            }
            ?>
            <form action="capacitacion-insertar.php" method="post">
                <div class="form-group">
                    <label for="tema">Tema</label>
                    <input type="text" class="form-control" id="tema" name="tema" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group">
                    <label for="duracion">Duración en horas</label>
                    <input type="number" class="form-control" id="duracion" name="duracion" required>
                </div>
                <div class="form-group">
                    <label for="establecimiento">Establecimiento</label>
                    <input type="text" class="form-control" id="establecimiento" name="establecimiento" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Insertar</button>
            </form>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

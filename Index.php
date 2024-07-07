<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Gestión Turística</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .index-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php include 'layout/header.php'; ?>

    <div class="container">
        <div class="index-container">
            <h1 class="text-center">Bienvenido al Sistema de Gestión Turística de la Región Z</h1>
            <p class="text-center">Este sistema tiene como objetivo impulsar el turismo en nuestra región, gestionando eficientemente los establecimientos turísticos y organizando actividades de capacitación para mejorar la experiencia de nuestros visitantes.</p>
            <hr>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-hotel fa-3x"></i>
                    <h3>Gestión de Establecimientos</h3>
                    <p>Registra y administra los diferentes establecimientos turísticos en la región.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-user-tie fa-3x"></i>
                    <h3>Asignación de Responsables</h3>
                    <p>Asigna responsables para la gestión y operación de cada establecimiento.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    <h3>Capacitaciones</h3>
                    <p>Organiza y gestiona actividades de capacitación para mejorar la calidad del servicio.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>

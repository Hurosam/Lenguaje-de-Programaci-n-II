<?php
  session_start();
  $sesion_iniciada = isset($_SESSION['id']);
  $es_administrador = $sesion_iniciada && $_SESSION['tipo'] === 'Administrador';
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión Provincial del Turismo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="../archivos/imagenes/logo.png" type="image/x-icon">
    <style>
      html, body {
        height: 100%;
      }

      body {
        display: flex;
        flex-direction: column;
      }

      .content {
        flex: 1;
      }

      .footer {
        background-color: #f8f9fa; 
        text-align: center;
        padding: 15px 0;
      }
    </style>
  </head>
  <body>
    <nav data-bs-theme="" class="navbar navbar-expand-lg px-3 py-3 mb-3" style="background-color: white; border-bottom: 1px solid #ccc;">
      <div class="container-fluid text-black">
        <a class="navbar-brand fw-bolder" href="/gestion_turismo/index.php">GestorTurismo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav d-flex justify-content-between w-100">
            <div class="d-flex">
              <li class="nav-item">
                <a class="nav-link active" href="/gestion_turismo/destinos/mostrar-destinos.php">Destinos</a>
              </li>
              <?php if ($es_administrador): ?>
              <li class="nav-item">
                <a class="nav-link active" href="/gestion_turismo/encargados/mostrar-encargados.php">Encargados</a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link active" href="/gestion_turismo/capacitaciones/mostrar-capacitaciones.php">Capacitaciones</a>
              </li>
            </div>
            
            <li class="nav-item d-flex gap-2">
              <?php if ($sesion_iniciada): ?>
                <a href="/gestion_turismo//mi-perfil/editar-perfil.php" class="d-flex h-100 align-items-center mb-0"><?php echo $_SESSION['usuario'] . " (" . $_SESSION['tipo'] . ")" ?></a>
                <a class="nav-link active text-danger" href="/gestion_turismo/inicio/logout.php">Cerrar Sesión</a>
              <?php else: ?>
                <a class="nav-link active" href="/gestion_turismo/inicio/login.php">Iniciar Sesión</a>
                <a class="nav-link active" href="/gestion_turismo/inicio/registro.php">Registrarse</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-3 content">

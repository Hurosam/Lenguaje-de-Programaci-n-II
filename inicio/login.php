<?php
session_start();
require_once "../controladores/UsuarioController.php";

if (isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

$uc = new UsuarioController();
$error = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!$uc->login($email, $password)) {
        $error = 'Credenciales incorrectas';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión del Turismo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="p-4 shadow rounded" style="width: 400px;">
        <h2 class="text-center mb-4">Login</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
        <div class="text-center mt-3">
            <p>¿No tienes una cuenta? <a href="registro.php">Registrarse</a></p>
        </div>
    </div>
</div>
</body>
</html>

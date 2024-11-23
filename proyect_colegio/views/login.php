<?php
session_start();
require_once '../controllers/AuthController.php';

$auth = new AuthController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth->login();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Inicio de Sesión</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <a href="register.php" class="btn btn-secondary">Registrarse</a>
        </form>
    </div>
</body>
</html>
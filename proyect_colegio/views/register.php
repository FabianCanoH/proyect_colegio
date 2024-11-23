<?php
session_start();
require_once '../controllers/AuthController.php';

$auth = new AuthController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth->register();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
            </div>
            <div class="form-group">
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
            </div>
            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <div class="form-group">
                <label for="numero_contacto">Número de Contacto:</label>
                <input type="text" class="form-control" id="numero_contacto" name="numero_contacto" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>
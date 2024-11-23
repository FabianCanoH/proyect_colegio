<?php
session_start();
require_once '../controllers/AcudienteController.php';

$controller = new AcudienteController();
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->delete($id);
    header("Location: Acudiente_List.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Registro de Acudiente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Eliminar Registro de Acudiente</h2>
        <p>¿Estás seguro de que deseas eliminar este registro?</p>
        <form action="Acudiente_Eliminar.php?id=<?php echo $id; ?>" method="POST">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="Acudiente_List.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
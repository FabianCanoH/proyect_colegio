<?php
session_start();
require_once '../controllers/AcudienteController.php';

$controller = new AcudienteController();
$records = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Acudientes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Acudientes</h2>
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
        <a href="Acudiente_Create.php" class="btn btn-primary">Crear Nuevo Registro</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Gestión Usuarios</th>
                    <th>ID Solicitud Cupo</th>
                    <th>Número de Identificación del Acudiente</th>
                    <th>Primer Nombre Acudiente</th>
                    <th>Primer Apellido Acudiente</th>
                    <!-- Agregar los demás encabezados de columna -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record): ?>
                <tr>
                    <td><?php echo $record['Id_Informacion_Acudiente_Aspirante']; ?></td>
                    <td><?php echo $record['Id_Gestion_Usuarios']; ?></td>
                    <td><?php echo $record['Id_Solicitud_Cupo']; ?></td>
                    <td><?php echo $record['Numero_Identificacion_Acudiente']; ?></td>
                    <td><?php echo $record['Primer_Nombre_Acudiente']; ?></td>
                    <td><?php echo $record['Primer_Apellido_Acudiente']; ?></td>
                    <!-- Agregar los demás campos -->
                    <td>
                        <a href="Acudiente_Edit.php?id=<?php echo $record['Id_Informacion_Acudiente_Aspirante']; ?>" class="btn btn-warning">Editar</a>
                        <a href="Acudiente_Eliminar.php?id=<?php echo $record['Id_Informacion_Acudiente_Aspirante']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
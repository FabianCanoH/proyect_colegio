<?php
session_start();
require_once '../controllers/AcudienteController.php';

$controller = new AcudienteController();
$id = $_GET['id'];
$record = $controller->readOne($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->update($id);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro de Acudiente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Registro de Acudiente</h2>
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
        <form action="Acudiente_Edit.php?id=<?php echo $id; ?>" method="POST">
            <!-- Campos del formulario con valores prellenados -->
             
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Identificacion_Acudiente">Número de Identificación del Acudiente:</label>
                        <input type="text" class="form-control" id="Numero_Identificacion_Acudiente" name="Numero_Identificacion_Acudiente" value="<?php echo $record['Numero_Identificacion_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Identificacion_Acudiente">Tipo de Identificación del Acudiente:</label>
                        <input type="text" class="form-control" id="Tipo_Identificacion_Acudiente" name="Tipo_Identificacion_Acudiente" value="<?php echo $record['Tipo_Identificacion_Acudiente']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Nombre_Acudiente">Primer Nombre del Acudiente:</label>
                        <input type="text" class="form-control" id="Primer_Nombre_Acudiente" name="Primer_Nombre_Acudiente" value="<?php echo $record['Primer_Nombre_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Nombre_Acudiente">Segundo Nombre del Acudiente:</label>
                        <input type="text" class="form-control" id="Segundo_Nombre_Acudiente" name="Segundo_Nombre_Acudiente" value="<?php echo $record['Segundo_Nombre_Acudiente']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Apellido_Acudiente">Primer Apellido del Acudiente:</label>
                        <input type="text" class="form-control" id="Primer_Apellido_Acudiente" name="Primer_Apellido_Acudiente" value="<?php echo $record['Primer_Apellido_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Apellido_Acudiente">Segundo Apellido del Acudiente:</label>
                        <input type="text" class="form-control" id="Segundo_Apellido_Acudiente" name="Segundo_Apellido_Acudiente" value="<?php echo $record['Segundo_Apellido_Acudiente']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Fecha_Nacimiento_Acudiente">Fecha de Nacimiento del Acudiente:</label>
                        <input type="date" class="form-control" id="Fecha_Nacimiento_Acudiente" name="Fecha_Nacimiento_Acudiente" value="<?php echo $record['Fecha_Nacimiento_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Genero_Acudiente">Género del Acudiente:</label>
                        <input type="text" class="form-control" id="Genero_Acudiente" name="Genero_Acudiente" value="<?php echo $record['Genero_Acudiente']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Parentesco_Acudiente">Parentesco del Acudiente:</label>
                        <input type="text" class="form-control" id="Parentesco_Acudiente" name="Parentesco_Acudiente" value="<?php echo $record['Parentesco_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Contacto_Acudiente">Número de Contacto del Acudiente:</label>
                        <input type="text" class="form-control" id="Numero_Contacto_Acudiente" name="Numero_Contacto_Acudiente" value="<?php echo $record['Numero_Contacto_Acudiente']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Correo_Electronico_Acudiente">Correo Electrónico del Acudiente:</label>
                        <input type="email" class="form-control" id="Correo_Electronico_Acudiente" name="Correo_Electronico_Acudiente" value="<?php echo $record['Correo_Electronico_Acudiente']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_discapacidad_Acudiente">Tipo de Discapacidad del Acudiente:</label>
                        <input type="text" class="form-control" id="Tipo_discapacidad_Acudiente" name="Tipo_discapacidad_Acudiente" value="<?php echo $record['Tipo_discapacidad_Acudiente']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Identificacion_Aspirante">Número de Identificación del Aspirante:</label>
                        <input type="text" class="form-control" id="Numero_Identificacion_Aspirante" name="Numero_Identificacion_Aspirante" value="<?php echo $record['Numero_Identificacion_Aspirante']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Identificacion_Aspirante">Tipo de Identificación del Aspirante:</label>
                        <input type="text" class="form-control" id="Tipo_Identificacion_Aspirante" name="Tipo_Identificacion_Aspirante" value="<?php echo $record['Tipo_Identificacion_Aspirante']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Nombre_Aspirante">Primer Nombre del Aspirante:</label>
                        <input type="text" class="form-control" id="Primer_Nombre_Aspirante" name="Primer_Nombre_Aspirante" value="<?php echo $record['Primer_Nombre_Aspirante']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Nombre_Aspirante">Segundo Nombre del Aspirante:</label>
                        <input type="text" class="form-control" id="Segundo_Nombre_Aspirante" name="Segundo_Nombre_Aspirante" value="<?php echo $record['Segundo_Nombre_Aspirante']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Apellido_Aspirante">Primer Apellido del Aspirante:</label>
                        <input type="text" class="form-control" id="Primer_Apellido_Aspirante" name="Primer_Apellido_Aspirante" value="<?php echo $record['Primer_Apellido_Aspirante']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Apellido_Aspirante">Segundo Apellido del Aspirante:</label>
                        <input type="text" class="form-control" id="Segundo_Apellido_Aspirante" name="Segundo_Apellido_Aspirante" value="<?php echo $record['Segundo_Apellido_Aspirante']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Fecha_Nacimiento_Aspirante">Fecha de Nacimiento del Aspirante:</label>
                        <input type="date" class="form-control" id="Fecha_Nacimiento_Aspirante" name="Fecha_Nacimiento_Aspirante" value="<?php echo $record['Fecha_Nacimiento_Aspirante']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Genero_Aspirante">Genero del Aspirante:</label>
                        <input type="text" class="form-control" id="Genero_Aspirante" name="Genero_Aspirante" value="<?php echo $record['Genero_Aspirante']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Parentesco_Aspirante">Parentesco del Aspirante:</label>
                        <input type="text" class="form-control" id="Parentesco_Aspirante" name="Parentesco_Aspirante" value="<?php echo $record['Parentesco_Aspirante']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Contacto_Aspirante">Número Contacto del Aspirante:</label>
                        <input type="text" class="form-control" id="Numero_Contacto_Aspirante" name="Numero_Contacto_Aspirante" value="<?php echo $record['Numero_Contacto_Aspirante']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Correo_Electronico_Aspirante">Correo Electronico del Aspirante:</label>
                        <input type="text" class="form-control" id="Correo_Electronico_Aspirante" name="Correo_Electronico_Aspirante" value="<?php echo $record['Correo_Electronico_Aspirante']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_discapacidad_Aspirante">Tipo Discapacidad del Aspirante:</label>
                        <input type="text" class="form-control" id="Tipo_discapacidad_Aspirante" name="Tipo_discapacidad_Aspirante" value="<?php echo $record['Tipo_discapacidad_Aspirante']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Eleccion_Grado">Elección del Grado:</label>
                        <input type="text" class="form-control" id="Eleccion_Grado" name="Eleccion_Grado" value="<?php echo $record['Eleccion_Grado']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Traslado_Colegio">Traslado Colegio:</label>
                        <input type="text" class="form-control" id="Traslado_Colegio" name="Traslado_Colegio" value="<?php echo $record['Traslado_Colegio']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Direccion_Residencia">Dirección de Residencia:</label>
                        <input type="text" class="form-control" id="Direccion_Residencia" name="Direccion_Residencia" value="<?php echo $record['Direccion_Residencia']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Estrato">Estrato:</label>
                        <input type="text" class="form-control" id="Estrato" name="Estrato" value="<?php echo $record['Estrato']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Barrio">Barrio:</label>
                        <input type="text" class="form-control" id="Barrio" name="Barrio" value="<?php echo $record['Barrio']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Comuna">Comuna:</label>
                        <input type="text" class="form-control" id="Comuna" name="Comuna" value="<?php echo $record['Comuna']; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Victima_Conflicto">¿Es usted victima del conflicto?:</label>
                        <input type="text" class="form-control" id="Victima_Conflicto" name="Victima_Conflicto" value="<?php echo $record['Victima_Conflicto']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Desplazamiento">Tipo Desplazamiento:</label>
                        <input type="text" class="form-control" id="Tipo_Desplazamiento" name="Tipo_Desplazamiento" value="<?php echo $record['Tipo_Desplazamiento']; ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>

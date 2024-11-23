<?php
session_start();
require_once '../controllers/AcudienteController.php';

$controller = new AcudienteController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Registro de Acudiente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script>
        function validateForm() {
            var idGestionUsuarios = document.getElementById("Id_Gestion_Usuarios").value;
            var idSolicitudCupo = document.getElementById("Id_Solicitud_Cupo").value;
            

            if (isNaN(idGestionUsuarios) || isNaN(idSolicitudCupo)) {
                alert("Por favor, ingrese solo números en los campos de identificación.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Crear Registro de Acudiente</h2>
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
        <form action="Acudiente_Create.php" method="POST">
            <!-- Campos del formulario -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Id_Gestion_Usuarios">ID Gestión Usuarios:</label>
                        <input type="text" class="form-control" id="Id_Gestion_Usuarios" name="Id_Gestion_Usuarios" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Id_Solicitud_Cupo">ID Solicitud Cupo:</label>
                        <input type="text" class="form-control" id="Id_Solicitud_Cupo" name="Id_Solicitud_Cupo" required>
                    </div>
                </div>
            </div>
             <!-- Información del Acudiente -->
            <h3>Información del Acudiente</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Identificacion_Acudiente">Número de Identificación del Acudiente:</label>
                        <input type="text" class="form-control" id="Numero_Identificacion_Acudiente" name="Numero_Identificacion_Acudiente" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Identificacion_Acudiente">Tipo de Identificación del Acudiente:</label>
                        <select name="Tipo_Identificacion_Acudiente" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Tipo de Identificación</option>
                            <option value="Cedula Ciudadania">Cédula Ciudadanía</option>
                            <option value="Tarjeta Identidad">Tarjeta Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Registro de Nacimiento">Registro de Nacimiento</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
            <!-- Nombres -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Nombre_Acudiente">Primer Nombre Acudiente:</label>
                        <input type="text" class="form-control" id="Primer_Nombre_Acudiente" name="Primer_Nombre_Acudiente" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Nombre_Acudiente">Segundo Nombre Acudiente:</label>
                        <input type="text" class="form-control" id="Segundo_Nombre_Acudiente" name="Segundo_Nombre_Acudiente" maxlength="250">
                    </div>
                </div>
            </div>
            <!-- Apellidos -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Primer_Apellido_Acudiente">Primer Apellido Acudiente:</label>
                        <input type="text" class="form-control" id="Primer_Apellido_Acudiente" name="Primer_Apellido_Acudiente" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Segundo_Apellido_Acudiente">Segundo Apellido Acudiente:</label>
                        <input type="text" class="form-control" id="Segundo_Apellido_Acudiente" name="Segundo_Apellido_Acudiente" maxlength="250">
                    </div>
                </div>
            </div>
             <!-- Fecha Nacimiento y Genero -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Fecha_Nacimiento_Acudiente">Fecha de Nacimiento Acudiente:</label>
                        <input type="date" class="form-control" id="Fecha_Nacimiento_Acudiente" name="Fecha_Nacimiento_Acudiente" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Genero_Acudiente">Género Acudiente:</label>
                        <select name="Genero_Acudiente" class="form-control" required>
                        <option value="Sin Seleccion">Seleccione un Género</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                    </div>
                </div>
            </div>
             <!-- Parentesco y Número de contacto -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Parentesco_Acudiente">Parentesco Acudiente:</label>
                        <select name="Parentesco_Acudiente" class="form-control" required>
                        <option value="Sin Seleccion">Seleccione un Parentesco</option>
                        <option value="Padre">hija(o)</option>
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Abuelo(a)">Abuelo(a)</option>
                        <option value="Tía">Tía</option>
                        <option value="Tío">Tío</option>
                        <option value="Acudiente">Acudiente</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Contacto_Acudiente">Número de Contacto Acudiente:</label>
                        <input type="text" class="form-control" id="Numero_Contacto_Acudiente" name="Numero_Contacto_Acudiente" maxlength="250" required>
                    </div>
                </div>
            </div>
            <!-- Corero Electrónico y Tipo de Discapacidad -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Correo_Electronico_Acudiente">Correo Electrónico Acudiente:</label>
                        <input type="email" class="form-control" id="Correo_Electronico_Acudiente" name="Correo_Electronico_Acudiente" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_discapacidad_Acudiente">Tipo de Discapacidad Acudiente:</label>
                        <select id="Tipo_discapacidad_Acudiente" name="Tipo_discapacidad_Acudiente" class="form-control" maxlength="10" required>
                            <option value="">Seleccione el tipo de dsicapacidad:</option>
                        </select>
                    </div>
                </div>
            </div>
             <!-- Información del Aspirante -->
            <h3>Información del Aspirante</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Identificacion_Aspirante">Número de Identificación Aspirante:</label>
                        <input type="text" class="form-control" id="Numero_Identificacion_Aspirante" name="Numero_Identificacion_Aspirante" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Identificacion_Aspirante">Tipo de Identificación Aspirante:</label>
                        <select name="Tipo_Identificacion_Aspirante" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Tipo de Identificación</option>
                            <option value="Cedula Ciudadania">Cédula Ciudadanía</option>
                            <option value="Tarjeta Identidad">Tarjeta Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Registro de Nacimiento">Registro de Nacimiento</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Nombres -->
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="Primer_Nombre_Aspirante">Primer Nombre Aspirante:</label>
                            <input type="text" class="form-control" id="Primer_Nombre_Aspirante" name="Primer_Nombre_Aspirante" maxlength="250" required>
                        </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Segundo_Nombre_Aspirante">Segundo Nombre Aspirante:</label>
                            <input type="text" class="form-control" id="Segundo_Nombre_Aspirante" name="Segundo_Nombre_Aspirante" maxlength="250">
                        </div>
                    </div>
                
            </div>
            <!-- Apellidos -->
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="Primer_Apellido_Aspirante">Primer Apellido Aspirante:</label>
                            <input type="text" class="form-control" id="Primer_Apellido_Aspirante" name="Primer_Apellido_Aspirante" maxlength="250" required>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="Segundo_Apellido_Aspirante">Segundo Apellido Aspirante:</label>
                            <input type="text" class="form-control" id="Segundo_Apellido_Aspirante" name="Segundo_Apellido_Aspirante" maxlength="250">
                        </div>
                </div>
            </div>
            <!-- Fecha Nacimiento y Genero -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Fecha_Nacimiento_Aspirante">Fecha de Nacimiento Aspirante:</label>
                        <input type="date" class="form-control" id="Fecha_Nacimiento_Aspirante" name="Fecha_Nacimiento_Aspirante" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Genero_Aspirante">Género Aspirante:</label>
                        <select name="Genero_Aspirante" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Género</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </div>
                </div>
            </div>
             <!-- Parentesco y Número de contacto -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Parentesco_Aspirante">Parentesco Aspirante:</label>
                        <select name="Parentesco_Aspirante" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Parentesco</option>
                            <option value="Padre">hija(o)</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Abuelo(a)">Abuelo(a)</option>
                            <option value="Tía">Tía</option>
                            <option value="Tío">Tío</option>
                            <option value="Acudiente">Acudiente</option>
                        </select>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Numero_Contacto_Aspirante">Número de Contacto Aspirante:</label>
                        <input type="text" class="form-control" id="Numero_Contacto_Aspirante" name="Numero_Contacto_Aspirante" maxlength="250" required>
                    </div>
                </div>
            </div>
            <!-- Corero Electrónico y Tipo de Discapacidad -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Correo_Electronico_Aspirante">Correo Electrónico Aspirante:</label>
                        <input type="email" class="form-control" id="Correo_Electronico_Aspirante" name="Correo_Electronico_Aspirante" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_discapacidad_Aspirante">Tipo de Discapacidad Aspirante:</label>
                        <select id="Tipo_discapacidad_Aspirante" name="Tipo_discapacidad_Aspirante" class="form-control" maxlength="10" required>
                            <option value="">Seleccione el tipo de dsicapacidad:</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Información del Colegio -->
            <h3>Información del Colegio</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Eleccion_Grado">Elección de Grado:</label>
                        <select name="Eleccion_Grado" class="form-control" required>
                            <option value="Sin Seleccion"> Seleccione un Grado </option>
                            <option value="Jardín"> Jardín </option>
                            <option value="Primero"> Primero </option>
                            <option value="Segundo"> Segundo </option>
                            <option value="Tercero"> Tercero </option>
                            <option value="Cuarto"> Cuarto </option>
                            <option value="Quinto"> Quinto </option>
                            <option value="Sexto"> Sexto </option>
                            <option value="Septimo"> Séptimo </option>
                            <option value="Octavo"> Octavo </option>
                            <option value="Noveno"> Noveno </option>
                            <option value="Decimo"> Décimo </option>
                            <option value="Once"> Once </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Traslado_Colegio">Traslado de Colegio:</label>
                        <select name="Traslado_Colegio" class="form-control" required>
                            <option value="Sin Seleccion"> Es trasladado de un colegio </option>
                            <option value="Si"> Si </option>
                            <option value="No"> No </option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Información de Residencia -->
            <h3>Información de Residencia</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Direccion_Residencia">Dirección de Residencia:</label>
                        <input type="text" class="form-control" id="Direccion_Residencia" name="Direccion_Residencia" maxlength="250" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Estrato">Estrato:</label>
                        <select name="Estrato" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Estrato</option>
                            <option value="1 Uno">1 Uno</option>
                            <option value="2 Dos">2 Dos</option>
                            <option value="3 Tres">3 Tres</option>
                            <option value="4 Cuatro">4 Cuatro</option>
                            <option value="5 Cinco">5 Cinco</option>
                            <option value="6 Seis">6 Seis</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Barrio">Barrio:</label>
                        <select id="Barrio" name="Barrio" class="form-control" maxlength="10" required>
                            <option value="">Seleccione un Barrio:</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Comuna" class="form-label">Comuna:</label>
                        <select id="Comuna" name="Comuna" class="form-control" maxlength="10" required>
                            <option value="">Seleccione una comuna:</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Información General -->
            <h3>Información General</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Victima_Conflicto">¿Víctima del Conflicto?:</label>
                        <select id="Victima_Conflicto" name="Victima_Conflicto" class="form-control" required>
                            <option value=""> Seleccione una opción </option>
                            <option value="Si"> Sí </option>
                            <option value="No"> No </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Tipo_Desplazamiento">Tipo de Desplazamiento:</label>
                        <select name="Tipo_Desplazamiento" class="form-control" required>
                            <option value="Sin Seleccion">Seleccione un Tipo de Desplazamiento</option>
                            <option value="Conflicto Armado">Conflicto Armado</option>
                            <option value="Amenazas">Amenazas</option>
                            <option value="Despojo Tierras">Despojo de Tierras</option>
                            <option value="Reclutamiento Forzado">Reclutamiento Forzado</option>
                            <option value="Violencia Sexual">Violencia Sexual</option>
                            <option value="Homicidio">Homicidio de Familiar o líder comunitario</option>
                            <option value="Ninguna">Ninguna</option>
                        </select>
                    </div>  
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <script>
        fetch('../barrios.json')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('Barrio');
                data.forEach(Barrio => {
                    const option = document.createElement('option');
                    option.value = Barrio.nombre;
                    option.textContent = Barrio.nombre;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar los barrios:', error));

        fetch('../comunas.json')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('Comuna');
                data.forEach(Comuna => {
                    const option = document.createElement('option');
                    option.value = Comuna.nombre;
                    option.textContent = `${Comuna.nombre} (${Comuna.tipo})`;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar las comunas:', error));

        fetch('../discapacidades.json')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('Tipo_discapacidad_Aspirante');
                data.forEach(Tipo_discapacidad_Aspirante => {
                    const option = document.createElement('option');
                    option.value = Tipo_discapacidad_Aspirante.nombre;
                    option.textContent = Tipo_discapacidad_Aspirante.nombre;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar las discapacidades:', error));

            fetch('../discapacidades.json')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('Tipo_discapacidad_Acudiente');
                data.forEach(Tipo_discapacidad_Acudiente => {
                    const option = document.createElement('option');
                    option.value = Tipo_discapacidad_Acudiente.nombre;
                    option.textContent = Tipo_discapacidad_Acudiente.nombre;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error al cargar las discapacidades:', error));
    </script>
</body>
</html>

   

   
    

   
   

<?php
class AcudienteModel {
    private $conn;
    private $table_name = "Informacion_Acudiente_Aspirante";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo registro
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (Id_Gestion_Usuarios, Id_Solicitud_Cupo, Numero_Identificacion_Acudiente, Tipo_Identificacion_Acudiente, Primer_Nombre_Acudiente, Segundo_Nombre_Acudiente, Primer_Apellido_Acudiente, Segundo_Apellido_Acudiente, Fecha_Nacimiento_Acudiente, Genero_Acudiente, Parentesco_Acudiente, Numero_Contacto_Acudiente, Correo_Electronico_Acudiente, Tipo_discapacidad_Acudiente, Numero_Identificacion_Aspirante, Tipo_Identificacion_Aspirante, Primer_Nombre_Aspirante, Segundo_Nombre_Aspirante, Primer_Apellido_Aspirante, Segundo_Apellido_Aspirante, Fecha_Nacimiento_Aspirante, Genero_Aspirante, Parentesco_Aspirante, Numero_Contacto_Aspirante, Correo_Electronico_Aspirante, Tipo_discapacidad_Aspirante, Eleccion_Grado, Traslado_Colegio, Direccion_Residencia, Estrato, Barrio, Comuna, Victima_Conflicto, Tipo_Desplazamiento) VALUES (:Id_Gestion_Usuarios, :Id_Solicitud_Cupo, :Numero_Identificacion_Acudiente, :Tipo_Identificacion_Acudiente, :Primer_Nombre_Acudiente, :Segundo_Nombre_Acudiente, :Primer_Apellido_Acudiente, :Segundo_Apellido_Acudiente, :Fecha_Nacimiento_Acudiente, :Genero_Acudiente, :Parentesco_Acudiente, :Numero_Contacto_Acudiente, :Correo_Electronico_Acudiente, :Tipo_discapacidad_Acudiente, :Numero_Identificacion_Aspirante, :Tipo_Identificacion_Aspirante, :Primer_Nombre_Aspirante, :Segundo_Nombre_Aspirante, :Primer_Apellido_Aspirante, :Segundo_Apellido_Aspirante, :Fecha_Nacimiento_Aspirante, :Genero_Aspirante, :Parentesco_Aspirante, :Numero_Contacto_Aspirante, :Correo_Electronico_Aspirante, :Tipo_discapacidad_Aspirante, :Eleccion_Grado, :Traslado_Colegio, :Direccion_Residencia, :Estrato, :Barrio, :Comuna, :Victima_Conflicto, :Tipo_Desplazamiento)";
        
        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        foreach ($data as $key => $value) {
            $stmt->bindParam(':' . $key, $value);
        }

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer todos los registros
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Leer un solo registro por ID
    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Id_Informacion_Acudiente_Aspirante = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un registro
    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET Id_Gestion_Usuarios = :Id_Gestion_Usuarios, Id_Solicitud_Cupo = :Id_Solicitud_Cupo, Numero_Identificacion_Acudiente = :Numero_Identificacion_Acudiente, Tipo_Identificacion_Acudiente = :Tipo_Identificacion_Acudiente, Primer_Nombre_Acudiente = :Primer_Nombre_Acudiente, Segundo_Nombre_Acudiente = :Segundo_Nombre_Acudiente, Primer_Apellido_Acudiente = :Primer_Apellido_Acudiente, Segundo_Apellido_Acudiente = :Segundo_Apellido_Acudiente, Fecha_Nacimiento_Acudiente = :Fecha_Nacimiento_Acudiente, Genero_Acudiente = :Genero_Acudiente, Parentesco_Acudiente = :Parentesco_Acudiente, Numero_Contacto_Acudiente = :Numero_Contacto_Acudiente, Correo_Electronico_Acudiente = :Correo_Electronico_Acudiente, Tipo_discapacidad_Acudiente = :Tipo_discapacidad_Acudiente, Numero_Identificacion_Aspirante = :Numero_Identificacion_Aspirante, Tipo_Identificacion_Aspirante = :Tipo_Identificacion_Aspirante, Primer_Nombre_Aspirante = :Primer_Nombre_Aspirante, Segundo_Nombre_Aspirante = :Segundo_Nombre_Aspirante, Primer_Apellido_Aspirante = :Primer_Apellido_Aspirante, Segundo_Apellido_Aspirante = :Segundo_Apellido_Aspirante, Fecha_Nacimiento_Aspirante = :Fecha_Nacimiento_Aspirante, Genero_Aspirante = :Genero_Aspirante, Parentesco_Aspirante = :Parentesco_Aspirante, Numero_Contacto_Aspirante = :Numero_Contacto_Aspirante, Correo_Electronico_Aspirante = :Correo_Electronico_Aspirante, Tipo_discapacidad_Aspirante = :Tipo_discapacidad_Aspirante, Eleccion_Grado = :Eleccion_Grado, Traslado_Colegio = :Traslado_Colegio, Direccion_Residencia = :Direccion_Residencia, Estrato = :Estrato, Barrio = :Barrio, Comuna = :Comuna, Victima_Conflicto = :Victima_Conflicto, Tipo_Desplazamiento = :Tipo_Desplazamiento WHERE Id_Informacion_Acudiente_Aspirante = :id";
        
        $stmt = $this->conn->prepare($query);

        // Vincular los parámetros
        foreach ($data as $key => $value) {
            $stmt->bindParam(':' . $key, $value);
        }
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar un registro
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE Id_Informacion_Acudiente_Aspirante = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
<?php
class User {
    private $conn;
    private $table_name = "Gestion_Usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear un nuevo usuario
    public function create($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo_electronico, $contraseña, $numero_contacto) {
        $query = "INSERT INTO " . $this->table_name . " (Primer_Nombre, Segundo_Nombre, Primer_Apellido, Segundo_Apellido, Correo_Electronico, Contraseña, Numero_Contacto) VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :correo_electronico, :contraseña, :numero_contacto)";
        
        $stmt = $this->conn->prepare($query);

        // Encriptar la contraseña
        $hashed_password = password_hash($contraseña, PASSWORD_BCRYPT);

        // Vincular los parámetros
        $stmt->bindParam(':primer_nombre', $primer_nombre);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre);
        $stmt->bindParam(':primer_apellido', $primer_apellido);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido);
        $stmt->bindParam(':correo_electronico', $correo_electronico);
        $stmt->bindParam(':contraseña', $hashed_password);
        $stmt->bindParam(':numero_contacto', $numero_contacto);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Buscar un usuario por correo electrónico
    public function findByEmail($correo_electronico) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Correo_Electronico = :correo_electronico LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':correo_electronico', $correo_electronico);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
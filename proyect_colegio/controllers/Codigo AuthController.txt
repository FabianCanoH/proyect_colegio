<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../models/db.php';
require_once '../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Registro de usuario
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $primer_nombre = $_POST['primer_nombre'];
            $segundo_nombre = $_POST['segundo_nombre'];
            $primer_apellido = $_POST['primer_apellido'];
            $segundo_apellido = $_POST['segundo_apellido'];
            $correo_electronico = $_POST['correo_electronico'];
            $contraseña = $_POST['contraseña'];
            $numero_contacto = $_POST['numero_contacto'];

            if ($this->user->create($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo_electronico, $contraseña, $numero_contacto)) {
                $_SESSION['success'] = "Usuario registrado exitosamente.";
                header("Location: login.php");
            } else {
                $_SESSION['error'] = "Error al registrar el usuario.";
            }
        }
    }

    // Inicio de sesión
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo_electronico = $_POST['correo_electronico'];
            $contraseña = $_POST['contraseña'];

            $user = $this->user->findByEmail($correo_electronico);

            if ($user && password_verify($contraseña, $user['Contraseña'])) {
                $_SESSION['user_id'] = $user['Id_Gestion_Usuarios'];
                $_SESSION['user_name'] = $user['Primer_Nombre'];
                header("Location: Solicitud_Cupo.php");
            } else {
                $_SESSION['error'] = "Correo electrónico o contraseña incorrectos.";
            }
        }
    }

    // Cierre de sesión
    public function logout() {
        session_destroy();
        header("Location: login.php");
    }
}
?>
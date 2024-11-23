<?php
require_once '../models/db.php';
require_once '../models/AcudienteModel.php';

class AcudienteController {
    private $db;
    private $model;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new AcudienteModel($this->db);
    }

    // Crear un nuevo registro
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
    
            // Convertir los valores a enteros
            $data['Id_Gestion_Usuarios'] = intval($data['Id_Gestion_Usuarios']);
            $data['Id_Solicitud_Cupo'] = intval($data['Id_Solicitud_Cupo']);
    
            if ($this->model->create($data)) {
                $_SESSION['success'] = "Registro creado exitosamente.";
                header("Location: Acudiente_List.php");
            } else {
                $_SESSION['error'] = "Error al crear el registro.";
            }
        }
    }

    // Leer todos los registros
    public function read() {
        return $this->model->read();
    }

    // Leer un solo registro por ID
    public function readOne($id) {
        return $this->model->readOne($id);
    }

    // Actualizar un registro
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            if ($this->model->update($id, $data)) {
                $_SESSION['success'] = "Registro actualizado exitosamente.";
                header("Location: Acudiente_List.php");
            } else {
                $_SESSION['error'] = "Error al actualizar el registro.";
            }
        }
    }

    // Eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model->delete($id)) {
                $_SESSION['success'] = "Registro eliminado exitosamente.";
                header("Location: Acudiente_List.php");
            } else {
                $_SESSION['error'] = "Error al eliminar el registro.";
            }
        }
    }
}
?>
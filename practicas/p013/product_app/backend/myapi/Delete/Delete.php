<?php
namespace TECWEB\MYAPI\Delete;
require_once __DIR__ ."/../Database.php";
use TECWEB\MYAPI\Database\Database;

class Delete extends Database {
    public function __construct($db,$user = 'root', $pass = 'Carlos2003') {
        parent::__construct($db,$user,$pass);
    }
    public function delete($id) {
        $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
        if ($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto eliminado'];
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se pudo eliminar el producto: ' . mysqli_error($this->conexion)];
        }
    }

}
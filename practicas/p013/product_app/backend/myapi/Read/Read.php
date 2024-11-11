<?php
namespace TECWEB\MYAPI\Read;
require_once __DIR__ ."/../Database.php";
use TECWEB\MYAPI\Database\Database;

class Read extends Database {
    public function __construct($db,$user = 'root', $pass = 'Carlos2003') {
        parent::__construct($db,$user,$pass);
    }
    public function list() {
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se encontraron productos'];
        }
    }
    public function search($searchTerm) {
        $sql = "SELECT * FROM productos WHERE (id = '{$searchTerm}' OR nombre LIKE '%{$searchTerm}%' 
                OR marca LIKE '%{$searchTerm}%' OR detalles LIKE '%{$searchTerm}%') AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $this->response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se encontraron productos'];
        }
    }
    public function single($id) {
        $sql = "SELECT * FROM productos WHERE id = {$id} AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $this->response = $result->fetch_assoc();
        } else {
            $this->response = ['status' => 'error', 'message' => 'Producto no encontrado'];
        }
    }
    public function singleByName($name) {
        $sql = "SELECT * FROM productos WHERE nombre LIKE '%{$name}%' AND eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            $this->response = $result->fetch_assoc();
        } else {
            $this->response = ['status' => 'error', 'message' => 'Producto no encontrado'];
        }
    }
}
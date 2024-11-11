<?php
namespace TECWEB\MYAPI\Update;
require_once __DIR__ ."/../Database.php";
use TECWEB\MYAPI\Database\Database;

class Update extends Database {
    public function __construct($db,$user = 'root', $pass = 'Carlos2003') {
        parent::__construct($db,$user,$pass);
    }
    public function edit($product) {
        $sql = "UPDATE productos SET nombre = '{$product->name}', marca = '{$product->brand}', 
                modelo = '{$product->model}', precio = {$product->price}, detalles = '{$product->details}', 
                unidades = {$product->units} WHERE id = {$product->id}";
        
        if ($this->conexion->query($sql)) {
            $this->response = ['status' => 'success', 'message' => 'Producto modificado'];
        } else {
            $this->response = ['status' => 'error', 'message' => 'No se pudo modificar el producto: ' . mysqli_error($this->conexion)];
        }
    }
}
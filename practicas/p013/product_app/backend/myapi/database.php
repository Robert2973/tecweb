<?php
namespace TECWEB\MYAPI\Database;
abstract class database {
    protected $conexion;
    protected $response = [];

    public function __construct($db,$user,$pass) {
        $this->conexion = new \mysqli('localhost', 'root', 'Carlos2003', 'marketzone');
        if ($this->conexion->connect_error) {
            die("Connection failed: " . $this->conexion->connect_error);
        }
    }
    public function getData() {
        return json_encode($this->response, JSON_PRETTY_PRINT);
    }
    public function closeConnection() {
        $this->conexion->close();
    }
}
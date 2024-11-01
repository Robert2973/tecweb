<?php
include_once __DIR__ . '/database.php';

$producto = file_get_contents('php://input');
$data = array(
    'status' => 'Error',
    'message' => 'Edición fallida del producto'
);

if (!empty($producto)) {
    $jsonOBJ = json_decode($producto);
    $idProducto = $jsonOBJ->id;
    $sqlSelect = "SELECT * FROM productos WHERE id = '{$idProducto}'";
    $resultado = $conexion->query($sqlSelect);
    
    if ($resultado && $resultado->num_rows > 0) {
        $productoActual = $resultado->fetch_assoc();

        if ($productoActual['nombre'] == $jsonOBJ->nombre && 
            $productoActual['marca'] == $jsonOBJ->marca && 
            $productoActual['modelo'] == $jsonOBJ->modelo && 
            $productoActual['precio'] == $jsonOBJ->precio && 
            $productoActual['detalles'] == $jsonOBJ->detalles && 
            $productoActual['unidades'] == $jsonOBJ->unidades) {
            $data['message'] = "Edición fallida: los datos siguen siendo los mismos.";
        } else {
            $sqlUpdate = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades} WHERE id = '{$idProducto}'";

            $result = $conexion->query($sqlUpdate);

            if ($result) {
                $data['status'] = "Success";
                $data['message'] = "Producto Modificado";
            } else {
                $data['message'] = "ERROR: No se ejecutó $sqlUpdate. " . mysqli_error($conexion);
            }
        }
    } else {
        $data['message'] = "ERROR: Producto no encontrado.";
    }
    $conexion->close();
}
echo json_encode($data, JSON_PRETTY_PRINT);
?>
<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto);

    // VALIDAR SI EL PRODUCTO YA EXISTE
    $nombreProducto = $jsonOBJ->nombre;
    $query = "SELECT COUNT(*) FROM productos WHERE nombre = ? AND eliminado = 0";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $nombreProducto);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // El producto ya existe
        echo json_encode(['mensaje' => 'Error: El producto ya existe.']);
    } else {
        // EL PRODUCTO NO EXISTE, REALIZAR INSERCIÓN
        $queryInsert = "INSERT INTO productos (nombre, marca, detalles, precio, unidades, modelo, imagen, eliminado) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
$stmtInsert = $conexion->prepare($queryInsert);
$stmtInsert->bind_param("sssdiss", $jsonOBJ->nombre, $jsonOBJ->marca, $jsonOBJ->detalles, $jsonOBJ->precio, $jsonOBJ->unidades, $jsonOBJ->modelo, $jsonOBJ->imagen);

        if ($stmtInsert->execute()) {
            // Inserción exitosa
            echo json_encode(['mensaje' => 'Éxito: Producto insertado correctamente.']);
        } else {
            // Error en la inserción
            echo json_encode(['mensaje' => 'Error: No se pudo insertar el producto.']);
        }
        
        $stmtInsert->close();
    }
}
?>

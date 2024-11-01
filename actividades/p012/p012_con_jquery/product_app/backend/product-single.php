<?php
include_once __DIR__.'/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM productos WHERE id = ?";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die('Query Failed: ' . mysqli_error($conexion));
}

$json = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json[] = array(
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'unidades' => $row['unidades'],
        'modelo' => $row['modelo'],
        'marca' => $row['marca'],
        'detalles' => $row['detalles']
    );
}
if (!empty($json)) {
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
} else {
    echo json_encode(['error' => 'Product not found.']);
}
mysqli_stmt_close($stmt);
?>
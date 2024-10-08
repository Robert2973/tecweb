<?php
header("Content-Type: application/xhtml+xml; charset=utf-8"); 

// Obtener y validar el parámetro 'tope'
if (isset($_GET['tope']) && is_numeric($_GET['tope']) && $_GET['tope'] >= 0) {
    $tope = intval($_GET['tope']);
} else {
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
    echo '<head><title>Error</title></head>';
    echo '<body><p>Parámetro "tope" no válido.</p></body>';
    echo '</html>';
    exit();
}

// Crear conexión con la base de datos
$link = new mysqli('localhost', 'root', 'Carlos2003', 'marketzone');

// Verificar la conexión
if ($link->connect_errno) {
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
    echo '<head><title>Error de Conexión</title></head>';
    echo '<body><p>Falló la conexión: '.$link->connect_error.'</p></body>';
    echo '</html>';
    exit();
}

// Consulta preparada
$stmt = $link->prepare("SELECT * FROM productos WHERE unidades <= ? AND eliminado = 0");
$stmt->bind_param("i", $tope);
$stmt->execute();
$result = $stmt->get_result();

// Crear la salida XHTML
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
echo '<head><title>Productos</title>';
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />';
echo '</head>';
echo '<body>';
echo '<h3>Productos con Unidades Menores o Iguales a '.$tope.'</h3>';

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">#</th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Marca</th>';
    echo '<th scope="col">Modelo</th>';
    echo '<th scope="col">Precio</th>';
    echo '<th scope="col">Unidades</th>';
    echo '<th scope="col">Detalles</th>';
    echo '<th scope="col">Imagen</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<th scope="row">'.htmlspecialchars($row['id']).'</th>';
        echo '<td>'.htmlspecialchars($row['nombre']).'</td>';
        echo '<td>'.htmlspecialchars($row['marca']).'</td>';
        echo '<td>'.htmlspecialchars($row['modelo']).'</td>';
        echo '<td>'.htmlspecialchars($row['precio']).'</td>';
        echo '<td>'.htmlspecialchars($row['unidades']).'</td>';
        echo '<td>'.htmlspecialchars(utf8_encode($row['detalles'])).'</td>';
        echo '<td><img src="'.htmlspecialchars($row['imagen']).'" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;" /></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No se encontraron productos.</p>';
}

// Cerrar conexión
$stmt->close();
$link->close();

echo '</body>';
echo '</html>';
?>

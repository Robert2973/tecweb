<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h3>Productos Vigentes  </h3>

    <br/>

    <?php
    // SE CREA EL OBJETO DE CONEXION
    @$link = new mysqli('localhost', 'root', 'Carlos2003', 'marketzone');

    if ($link->connect_errno) {
        die('Fallo en la conexión: ' . $link->connect_error . '<br/>');
    }

    // Consulta a la base de datos para obtener productos no eliminados (eliminado = 0)
    $sql = "SELECT * FROM productos WHERE eliminado = 0";
    if ($result = $link->query($sql)) {
        if ($result->num_rows > 0) {
            echo '
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>';

                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo '
                    <tr>
                        <th scope="row">' . $row['id'] . '</th>
                        <td>' . $row['nombre'] . '</td>
                        <td>' . $row['marca'] . '</td>
                        <td>' . $row['modelo'] . '</td>
                        <td>' . $row['precio'] . '</td>
                        <td>' . $row['unidades'] . '</td>
                        <td>' . utf8_encode($row['detalles']) . '</td>
                        <td><img src="' . $row['imagen'] . '" alt="Imagen del producto" width="100"></td>
                        <td>
                            <form action="formulario_productos_v3.php" method="GET">
                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                <input type="hidden" name="nombre" value="' . $row['nombre'] . '">
                                <input type="hidden" name="marca" value="' . $row['marca'] . '">
                                <input type="hidden" name="modelo" value="' . $row['modelo'] . '">
                                <input type="hidden" name="precio" value="' . $row['precio'] . '">
                                <input type="hidden" name="unidades" value="' . $row['unidades'] . '">
                                <input type="hidden" name="detalles" value="' . utf8_encode($row['detalles']) . '">
                                <input type="hidden" name="imagen" value="' . $row['imagen'] . '">
                                <input type="submit" value="Editar">
                            </form>
                        </td>
                    </tr>';
                }

            echo '
                </tbody>
            </table>';
        } else {
            echo '<p>No existen productos vigentes.</p>';
        }

        $result->free();
    } else {
        echo '<p>Error al realizar la consulta: ' . $link->error . '</p>';
    }

    // Cerrar conexión
    $link->close();
    ?>
</body>
</html>

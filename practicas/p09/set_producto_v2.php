<?php
// Definir el encabezado para devolver un documento XHTML
header('Content-type: application/xhtml+xml; charset=utf-8');

// Iniciar la salida del documento XHTML
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <title>Resultado del Registro de Producto</title>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<?php
// Conexión a la base de datos (igual que antes)
$servername = "localhost";
$username = "root";
$password = "Carlos2003";
$dbname = "marketzone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "<p>Error de conexión: " . htmlspecialchars($conn->connect_error) . "</p>";
    echo "</body></html>";
    exit();
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_FILES['imagen']['name'];

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($marca) || empty($modelo)) {
    echo "<p>Error: Todos los campos son obligatorios.</p>";
    echo "</body></html>";
    exit();
}

// Comprobar si ya existe un producto con el mismo nombre, modelo y marca
$sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND modelo = '$modelo' AND marca = '$marca'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si existe, mostrar un mensaje de error
    echo "<p>Error: El producto ya existe en la base de datos.</p>";
} else {
    // Subir la imagen al servidor
    $directorio = "uploads/";
    $ruta_imagen = $directorio . basename($_FILES["imagen"]["name"]);

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
        // Insertar los datos en la base de datos
        // Esta consulta inserta un nuevo producto en la tabla 'productos'.
        // Se especifican las columnas 'nombre', 'marca', 'modelo', 'precio', 'detalles', 'unidades', 'imagen' y 'eliminado'.
        // Se asigna un valor de 0 a la columna 'eliminado' de forma manual para indicar que el producto no está eliminado.
        // Sin embargo, el campo 'id' se genera automáticamente y no se incluye en esta consulta.
        /*
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
                VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen', 0)";
        */

         // Nueva consulta 
         $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
         VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen')";

        if ($conn->query($sql) === TRUE) {
            // Mostrar resumen de los datos insertados en formato XHTML
            echo "<p>Producto insertado con éxito.</p>";
            echo "<ul>";
            echo "<li><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</li>";
            echo "<li><strong>Marca:</strong> " . htmlspecialchars($marca) . "</li>";
            echo "<li><strong>Modelo:</strong> " . htmlspecialchars($modelo) . "</li>";
            echo "<li><strong>Precio:</strong> " . htmlspecialchars($precio) . "</li>";
            echo "<li><strong>Detalles:</strong> " . htmlspecialchars($detalles) . "</li>";
            echo "<li><strong>Unidades:</strong> " . htmlspecialchars($unidades) . "</li>";
            echo "<li><strong>Imagen:</strong> " . htmlspecialchars($imagen) . "</li>";
            echo "</ul>";
        } else {
            echo "<p>Error al insertar el producto: " . htmlspecialchars($conn->error) . "</p>";
        }
    } else {
        echo "<p>Error al subir la imagen.</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>
</body>
</html>

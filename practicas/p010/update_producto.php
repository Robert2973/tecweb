<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "Carlos2003", "marketzone");

// Verificar la conexión
if($link === false){
    die("ERROR: No pudo conectarse a la base de datos. " . mysqli_connect_error());
}

// Verificar los valores recibidos desde el formulario
var_dump($_POST);
var_dump($_FILES);  // Esto nos mostrará información sobre el archivo subido

// Obtener los valores del formulario
$id = mysqli_real_escape_string($link, $_POST['id']);
$nombre = mysqli_real_escape_string($link, $_POST['nombre']);
$marca = mysqli_real_escape_string($link, $_POST['marca']);
$modelo = mysqli_real_escape_string($link, $_POST['modelo']);
$precio = mysqli_real_escape_string($link, $_POST['precio']);
$unidades = mysqli_real_escape_string($link, $_POST['unidades']);
$detalles = mysqli_real_escape_string($link, $_POST['detalles']);

// Procesar la imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
    // Definir el directorio donde se guardarán las imágenes subidas
    $upload_dir = 'uploads/';
    
    // Nombre del archivo subido
    $imagen = basename($_FILES['imagen']['name']);
    
    // Ruta completa del archivo en el servidor
    $upload_file = $upload_dir . $imagen;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $upload_file)) {
        echo "El archivo ha sido subido correctamente.<br>";
    } else {
        die("ERROR: No se pudo subir la imagen.");
    }

    // Escapar el nombre de la imagen para almacenarlo en la base de datos
    $imagen = mysqli_real_escape_string($link, $upload_file); // Guardamos la ruta completa
} else {
    // Si no se sube una imagen, usar la imagen por defecto
    $imagen = 'uploads/defecto.png';
}

// Verificar si todos los datos están presentes
if (empty($id) || empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($unidades) || empty($detalles) || empty($imagen)) {
    die("ERROR: Todos los campos deben estar completos.");
}

// Crear la consulta de actualización
$sql = "UPDATE productos SET 
    nombre = '$nombre', 
    marca = '$marca', 
    modelo = '$modelo', 
    precio = '$precio', 
    unidades = '$unidades', 
    detalles = '$detalles', 
    imagen = '$imagen' 
    WHERE id = '$id'";

// Ejecutar la consulta
if (mysqli_query($link, $sql)) {
    echo "Producto actualizado correctamente.";
} else {
    echo "ERROR: No se pudo actualizar el producto. " . mysqli_error($link);
}

// Cerrar la conexión
mysqli_close($link);
?>

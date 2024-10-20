<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "Carlos2003", "marketzone");

// Verificar la conexión
if($link === false){
    die("ERROR: No pudo conectarse a la base de datos. " . mysqli_connect_error());
}

// Verificar los valores recibidos desde el formulario
// var_dump($_POST);

// Obtener los valores del formulario
$id = mysqli_real_escape_string($link, $_POST['id']);
$nombre = mysqli_real_escape_string($link, $_POST['nombre']);
$marca = mysqli_real_escape_string($link, $_POST['marca']);
$modelo = mysqli_real_escape_string($link, $_POST['modelo']);
$precio = mysqli_real_escape_string($link, $_POST['precio']);
$unidades = mysqli_real_escape_string($link, $_POST['unidades']);
$detalles = mysqli_real_escape_string($link, $_POST['detalles']);

// Obtener la URL de la imagen
$imagen = mysqli_real_escape_string($link, $_POST['imagen']);

// Si no se proporciona una URL de imagen, asignar la imagen por defecto
if (empty($imagen)) {
    $imagen = 'uploads/defecto.png';
}

// Verificar si todos los datos están presentes
if (empty($id) || empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || !isset($unidades) || empty($detalles)) {
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

if (mysqli_query($link, $sql)) {
    echo "Producto actualizado correctamente.";
    echo "<script>
        setTimeout(function(){
            window.location.href = 'get_productos_vigentes_v2.php'; 
        }, 2000); // Espera 2 segundos antes de redirigir
    </script>"; 
} else {
    echo "ERROR: No se pudo actualizar el producto. " . mysqli_error($link);
}

// Cerrar la conexión
mysqli_close($link);
?>

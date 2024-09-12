<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <h2>Edad y Sexo</h2>
    <form action="Formulario1.php" method="post">
        Edad: <input type="number" name="edad">
        Sexo:
        <select name="sexo">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
        <input type="submit" value="Verificar">
    </form>

    <?php
    include 'C:\xampp\htdocs\tecweb\practicas\p07\scr\funciones.php';
    if (isset($_POST['edad']) && isset($_POST['sexo'])) {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        echo '<h3>' . Control($edad, $sexo) . '</h3>';
    }
    ?>
</body>

</html>
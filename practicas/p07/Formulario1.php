<?php
function Letras(){
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++){
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}

function Control($edad, $sexo) {
    if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
        return 'Bienvenida, usted está en el rango de edad permitido.';
    } else {
        return 'No tiene acceso.';
    }
}

?>

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
    if (isset($_POST['edad']) && isset($_POST['sexo'])) {
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        echo '<h3>' . Control($edad, $sexo) . '</h3>';
    }
    ?>
    
</body>

</html>
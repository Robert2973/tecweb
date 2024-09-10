<?php
include 'src/funciones.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    
    <form action="index.php" method="get">
        Número: <input type="text" name="numero">
        <input type="submit" value="Comprobar">
    </form>

    <?php
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
         echo '<h3>R= ' .esMultiplo($num). '/h3';
        }
    ?>
</body>
</html>
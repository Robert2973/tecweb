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
    include 'C:\xampp\htdocs\tecweb\practicas\p07\scr\funciones.php';
    if (isset($_GET['numero'])) {
        $num = $_GET['numero'];
        echo '<h3>R= ' . esMultiplo($num) . '</h3>';
    }
    ?>

    <h2> Ejercicio 2</h2>
    <?php
    $resultado = generarSecuencia();
    $numeros = $resultado['numeros'];
    $iteraciones = $resultado['iteraciones'];
    $todosLosNumeros = $resultado['todosLosNumeros'];
    $totalNumerosGenerados = $resultado['totalNumerosGenerados'];

    // Mostrar todos los números en renglones de 3 números
    echo '<p>Números generados:</p>';
    echo '<table border="1">';
    echo '<tr>';
    foreach ($todosLosNumeros as $index => $num) {
        // Cada 3 números, se inicia una nueva fila
        if ($index > 0 && $index % 3 == 0) {
            echo '</tr><tr>';
        }
        echo '<td>' . $num . '</td>';
    }
    echo '</tr>';
    echo '</table>';
    echo '<p>' . $totalNumerosGenerados . ' numeros obtenidos en ' . $iteraciones . ' iteraciones </p>';
    ?>

    <h2>Ejercicio 3</h2>
    <form action="index.php" method="get">
        Número: <input type="text" name="multiplo">
        <input type="submit" value="Encontrar múltiplo">
    </form>

    <?php
    if (isset($_GET['multiplo'])) {
        $multi = $_GET['multiplo'];
        echo '<h3>Resultado ciclo while: ' . MultiploWhile($multi) . '</h3>';
        echo '<h3>Resultado ciclo do-while: ' . MultiploDoWhile($multi) . '</h3>';
    }
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    $abecedario = Letras();
    echo '<table border="1">';
    foreach ($abecedario as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo '</table>';
    ?>



</body>

</html>
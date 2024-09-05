<?php
//Ejercicio 1: Determinar si las variables son validas o invalidas
$variables = [
    '$_myvar' => 'válida,   porque contiene el símbolo $ al inicio',
    '$_7var' => 'válida,    porque contiene el símbolo $ al inicio',
    'myvar' => 'inválida,    porque no contiene el símbolo $ al inicio',
    '$myvar' => 'válida,     porque contiene el símbolo $ al inicio',
    '$var7' => 'válida,     porque contiene el símbolo $ al inicio',
    '$_element1' => 'válida,     porque contiene el símbolo $ al inicio',
    '$house*5' => 'inválida,        porque contiene un carácter no permitido',
];
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Práctica PHP</title>
</head>

<body>
    <h1>Práctica PHP 'Charly'</h1>

    <!-- Ejercicio 1 -->
    <h2>Ejercicio 1: Variables válidas e inválidas</h2>
    <ul>
        <?php foreach ($variables as $var => $status): ?>
            <li><?php echo htmlentities($var) . " es $status."; ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- Ejercicio 2 -->
    <h2>Ejercicio 2: Asignaciones</h2>
    <?php
    // Primera asignacion 
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    // Contenido de cada variable
    echo "<p>Contenido de variables:</p>";
    echo "<p>\$a = $a</p>"; // ManejadorSQL
    echo "<p>\$b = $b</p>"; // MySQL
    echo "<p>\$c = $c</p>"; // ManejadorSQL

    // Modificacion de variables
    $a = "PHP server";
    $b = &$a;

    // Mostrar de variables
    echo "<p>Contenido de variables modificadas:</p>";
    echo "<p>\$a = $a</p>"; // PHP server
    echo "<p>\$b = $b</p>"; // PHP server (porque $b es una referencia a $a)
    echo "<p>\$c = $c</p>"; // PHP server (porque $c también es una referencia a $a)

    // Descripción de lo que ocurrió
    echo "<p><strong>Descripción:</strong> En el segundo bloque de asignaciones, cambiamos el valor de \$a a 
    'PHP server'. Como \$b es una referencia a \$a, el valor de \$b también cambió automáticamente. Lo mismo 
    ocurre con \$c, que es otra referencia a \$a, por lo que ahora todas las variables (\$a, \$b, y \$c) tienen 
    el mismo valor: 'PHP server'.</p>";
    ?>

</body>

</html>
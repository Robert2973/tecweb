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




    <!-- Ejercicio 2: Manipulación de variables -->
    <h2>Ejercicio 2: Manipulación de variables</h2>
    <?php
    // Función para el Ejercicio 2
    function ejercicio2()
    {
        // Primer bloque de asignaciones
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        // Mostrar valores después del primer bloque
        echo "<p>Después del primer bloque de asignaciones:</p>";
        echo "<p>\$a = $a</p>"; // ManejadorSQL
        echo "<p>\$b = $b</p>"; // MySQL
        echo "<p>\$c = $c</p>"; // ManejadorSQL

        // Segundo bloque de asignaciones
        $a = "PHP server";
        $b = &$a;

        // Mostrar valores después del segundo bloque
        echo "<p>Después del segundo bloque de asignaciones:</p>";
        echo "<p>\$a = $a</p>"; // PHP server
        echo "<p>\$b = $b</p>"; // PHP server (porque $b es una referencia a $a)
        echo "<p>\$c = $c</p>"; // PHP server (porque $c también es una referencia a $a)

        // Descripción de lo que ocurrió
        echo "<p><strong>Descripción:</strong> En el segundo bloque de asignaciones, cambiamos el valor de \$a a 'PHP server'. Como \$b es una referencia a \$a, el valor de \$b también cambió automáticamente. Lo mismo ocurre con \$c, que es otra referencia a \$a, por lo que ahora todas las variables (\$a, \$b, y \$c) tienen el mismo valor: 'PHP server'.</p>";
    }
    // Llamar a la función del Ejercicio 2
    ejercicio2();
    ?>




    <!-- Ejercicio 3: Evolución de las variables -->
    <h2>Ejercicio 3: Evolución de las variables</h2>
    <?php
    // Función para el Ejercicio 3
    function ejercicio3()
    {
        // Inicializar las variables del ejercicio 3
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";

        // Corregir las operaciones aritméticas extrayendo la parte numérica de $b
        $c = intval($b) * 10; // Extraer la parte numérica de $b y multiplicar por 10

        // Concatenar $a con $b
        $a .= $b;

        // Multiplicar la parte numérica de $b por $c
        $b = intval($b) * $c;

        // Cambiar el valor de $z[0]
        $z[0] = "MySQL";

        // Imprimir los resultados del ejercicio 3
        echo "<p>\$a = $a</p>"; // PHP55a version de PHP
        echo "<p>\$b = $b</p>"; // Parte numérica de $b multiplicada por $c
        echo "<p>\$c = $c</p>"; // Parte numérica de $b multiplicada por 10
        echo "<p>\$z[0] = {$z[0]}</p>"; // MySQL
    }
    // Llamar a la función del Ejercicio 3
    ejercicio3();
    ?>




    <!-- Ejercicio 4: Uso de $GLOBALS -->
    <h2>Ejercicio 4: Uso de $GLOBALS</h2>
    <?php
    // Función para el Ejercicio 4
    function ejercicio4()
    {
        global $a, $b, $c, $z;

        // Inicializar las variables del ejercicio 3
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a version de PHP";


        $c = intval($b) * 10; // Extraer la parte numérica de $b y multiplicar por 10

        // Concatenar $a con $b
        $a .= $b;

        // Multiplicar la parte numérica de $b por $c
        $b = intval($b) * $c;

        // Cambiar el valor de $z[0]
        $z[0] = "MySQL";

        // Imprimir los resultados usando $GLOBALS
        echo "<p>\$GLOBALS['a'] = " . $GLOBALS['a'] . "</p>"; // PHP55a version de PHP
        echo "<p>\$GLOBALS['b'] = " . $GLOBALS['b'] . "</p>"; // Parte numérica de $b multiplicada por $c
        echo "<p>\$GLOBALS['c'] = " . $GLOBALS['c'] . "</p>"; // Parte numérica de $b multiplicada por 10
        echo "<p>\$GLOBALS['z'][0] = " . $GLOBALS['z'][0] . "</p>"; // MySQL
    }
    // Llamar a la función del Ejercicio 4
    ejercicio4();
    ?>




    <!-- Ejercicio 5: Nuevas variables -->
    <h2>Ejercicio 5: Nuevas variables</h2>
    <?php
    // Función para el Ejercicio 5
    function ejercicio5()
    {
        // Inicializar las variables
        $a = "7 personas";
        $b = (int) $a;
        $a = "9E3";
        $c = (float) $a;

        // Imprimir los valores y tipos
        echo "<p>\$a = $a </p>";
        echo "<p>\$b = $b </p>";
        echo "<p>\$c = $c </p>";
    }
    // Llamar a la función del Ejercicio 5
    ejercicio5();
    ?>




    <!-- Ejercicio 6: Valores booleanos -->
    <h2>Ejercicio 6: Valores booleanos</h2>
    <?php
    // Función para el Ejercicio 6
    function ejercicio6()
    {
        // Inicializar las variables del ejercicio 6
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a or $b);
        $e = ($a and $c);
        $f = ($a xor $b);

        // Convertir valores booleanos a cadenas para mostrar con echo
        $c_string = $c ? 'true' : 'false';
        $e_string = $e ? 'true' : 'false';

        // Imprimir resultados usando var_dump
        echo "<p>Resultado de var_dump para \$a:</p>";
        var_dump($a);
        echo "<p>Resultado de var_dump para \$b:</p>";
        var_dump($b);
        echo "<p>Resultado de var_dump para \$c:</p>";
        var_dump($c);
        echo "<p>Resultado de var_dump para \$d:</p>";
        var_dump($d);
        echo "<p>Resultado de var_dump para \$e:</p>";
        var_dump($e);
        echo "<p>Resultado de var_dump para \$f:</p>";
        var_dump($f);

        // Convertir valores booleanos para mostrar con echo
        echo "<p><strong>Valores booleanos convertidos:</strong></p>";
        echo "<p>\$c (booleano) convertido a cadena: " . ($c ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p>\$e (booleano) convertido a cadena: " . ($e ? 'TRUE' : 'FALSE') . "</p>";
    }
    // Llamar a la función del Ejercicio 6
    ejercicio6();
    ?>




    <!-- Ejercicio 7: Uso de $_SERVER -->
    <h2>Ejercicio 7: Uso de $_SERVER</h2>
    <?php
    // Función para el Ejercicio 7
    function ejercicio7()
    {
        $apache_version = $_SERVER['SERVER_SOFTWARE'];
        $php_version = phpversion();
        $server_os = PHP_OS;
        $client_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

        echo "<p>Versión de Apache: $apache_version</p>";
        echo "<p>Versión de PHP: $php_version</p>";
        echo "<p>Nombre del sistema operativo: $server_os</p>";
        echo "<p>Idioma del navegador: $client_language</p>";
    }

    // Llamar a la función del Ejercicio 7
    ejercicio7();
    ?>
</body>

</html>
<?php
// Ejercicio 1: Determinar si las variables son válidas o inválidas
$variables = [
    '$_myvar' => 'válida, porque contiene el símbolo $ al inicio',
    '$_7var' => 'válida, porque contiene el símbolo $ al inicio',
    'myvar' => 'inválida, porque no contiene el símbolo $ al inicio',
    '$myvar' => 'válida, porque contiene el símbolo $ al inicio',
    '$var7' => 'válida, porque contiene el símbolo $ al inicio',
    '$_element1' => 'válida, porque contiene el símbolo $ al inicio',
    '$house*5' => 'inválida, porque contiene un carácter no permitido',
];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
    function ejercicio2() {
        // Primer bloque de asignaciones
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        // Mostrar valores después del primer bloque
        echo "<p>Después del primer bloque de asignaciones:</p>";
        echo "<p>\$a = " . htmlspecialchars($a) . "</p>"; // ManejadorSQL
        echo "<p>\$b = " . htmlspecialchars($b) . "</p>"; // MySQL
        echo "<p>\$c = " . htmlspecialchars($c) . "</p>"; // ManejadorSQL

        // Segundo bloque de asignaciones
        $a = "PHP server";
        $b = &$a;

        // Mostrar valores después del segundo bloque
        echo "<p>Después del segundo bloque de asignaciones:</p>";
        echo "<p>\$a = " . htmlspecialchars($a) . "</p>"; // PHP server
        echo "<p>\$b = " . htmlspecialchars($b) . "</p>"; // PHP server
        echo "<p>\$c = " . htmlspecialchars($c) . "</p>"; // PHP server

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
    function ejercicio3() {
        // Inicializar las variables del ejercicio 3
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a versión de PHP";

        // Corregir las operaciones aritméticas extrayendo la parte numérica de $b
        $c = intval($b) * 10; // Extraer la parte numérica de $b y multiplicar por 10

        // Concatenar $a con $b
        $a .= $b;

        // Multiplicar la parte numérica de $b por $c
        $b = intval($b) * $c;

        // Cambiar el valor de $z[0]
        $z[0] = "MySQL";

        // Imprimir los resultados del ejercicio 3
        echo "<p>\$a = " . htmlspecialchars($a) . "</p>";
        echo "<p>\$b = " . htmlspecialchars($b) . "</p>"; // Parte numérica de $b multiplicada por $c
        echo "<p>\$c = " . htmlspecialchars($c) . "</p>"; // Parte numérica de $b multiplicada por 10
        echo "<p>\$z[0] = " . htmlspecialchars($z[0]) . "</p>"; // MySQL
    }
    // Llamar a la función del Ejercicio 3
    ejercicio3();
    ?>

    <!-- Ejercicio 4: Uso de $GLOBALS -->
    <h2>Ejercicio 4: Uso de $GLOBALS</h2>
    <?php
    // Función para el Ejercicio 4
    function ejercicio4() {
        global $a, $b, $c, $z;

        // Inicializar las variables del ejercicio 3
        $a = "PHP5";
        $z[] = &$a;
        $b = "5a versión de PHP";

        $c = intval($b) * 10; // Extraer la parte numérica de $b y multiplicar por 10

        // Concatenar $a con $b
        $a .= $b;

        // Multiplicar la parte numérica de $b por $c
        $b = intval($b) * $c;

        // Cambiar el valor de $z[0]
        $z[0] = "MySQL";

        // Imprimir los resultados usando $GLOBALS
        echo "<p>\$GLOBALS['a'] = " . htmlspecialchars($GLOBALS['a']) . "</p>";
        echo "<p>\$GLOBALS['b'] = " . htmlspecialchars($GLOBALS['b']) . "</p>"; // Parte numérica de $b multiplicada por $c
        echo "<p>\$GLOBALS['c'] = " . htmlspecialchars($GLOBALS['c']) . "</p>"; // Parte numérica de $b multiplicada por 10
        echo "<p>\$GLOBALS['z'][0] = " . htmlspecialchars($GLOBALS['z'][0]) . "</p>"; // MySQL
    }
    // Llamar a la función del Ejercicio 4
    ejercicio4();
    ?>

    <!-- Ejercicio 5: Nuevas variables -->
    <h2>Ejercicio 5: Nuevas variables</h2>
    <?php
    // Función para el Ejercicio 5
    function ejercicio5() {
        // Inicializar las variables
        $a = "7 personas";
        $b = (int)$a;
        $a = "9E3";
        $c = (float)$a;

        // Imprimir los valores y tipos
        echo "<p>\$a = " . htmlspecialchars($a) . "</p>";
        echo "<p>\$b = " . htmlspecialchars($b) . "</p>";
        echo "<p>\$c = " . htmlspecialchars($c) . "</p>";
    }
    // Llamar a la función del Ejercicio 5
    ejercicio5();
    ?>

    <!-- Ejercicio 6: Valores booleanos -->
    <h2>Ejercicio 6: Valores booleanos</h2>
    <?php
    // Función para el Ejercicio 6
    function ejercicio6() {
        // Inicializar las variables del ejercicio 6
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a or $b);
        $e = ($a and $c);
        $f = ($a xor $b);

        // Imprimir resultados usando var_dump dentro de <pre> para evitar errores
        echo "<p>Resultado de var_dump para \$a:</p><pre>";
        var_dump($a);
        echo "</pre>";
        echo "<p>Resultado de var_dump para \$b:</p><pre>";
        var_dump($b);
        echo "</pre>";
        echo "<p>Resultado de var_dump para \$c:</p><pre>";
        var_dump($c);
        echo "</pre>";
        echo "<p>Resultado de var_dump para \$d:</p><pre>";
        var_dump($d);
        echo "</pre>";
        echo "<p>Resultado de var_dump para \$e:</p><pre>";
        var_dump($e);
        echo "</pre>";
        echo "<p>Resultado de var_dump para \$f:</p><pre>";
        var_dump($f);
        echo "</pre>";

        // Convertir valores booleanos para mostrar con echo
        echo "<p><strong>Valores booleanos convertidos:</strong></p>";
        echo "<p>\$c (booleano) convertido a cadena: " . ($c ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p>\$e (booleano) convertido a cadena: " . ($e ? 'TRUE' : 'FALSE') . "</p>";
        echo "<p>\$f (booleano) convertido a cadena: " . ($f ? 'TRUE' : 'FALSE') . "</p>";
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

  

<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
  

</body>
</html>

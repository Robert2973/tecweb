<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once __DIR__ .'/Operacion.php';

    $suma = new Suma;
    $suma->setValor(10);
    $suma->setValor2(10);
    $suma->operar();

    echo 'El resultado es :'.$suma->getResultado().'</br>';

    $resta = new Resta;
    $resta->setValor(10);
    $resta->setValor2(20);
    $resta->operar();

    echo 'El resultado es :'.$resta->getResultado().'</br>';
    ?>
</body>
</html>
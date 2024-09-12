<?php
$vehiculos = array(
    'ABC1234' => array(
        'Auto' => array('marca' => 'HONDA','modelo' => 2020,'tipo' => 'camioneta'),
        'Propietario' => array('nombre' => 'Alfonzo Esparza','ciudad' => 'Puebla, Pue.','direccion' => 'C.U., Jardines de San Manuel')
    ),
    'XYZ5678' => array(
        'Auto' => array('marca' => 'MAZDA','modelo' => 2019,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Ma. del Consuelo Molina','ciudad' => 'Puebla, Pue.','direccion' => '97 oriente')
    ),
    'DEF4321' => array(
        'Auto' => array('marca' => 'TOYOTA','modelo' => 2021,'tipo' => 'hatchback'),
        'Propietario' => array('nombre' => 'Juan Perez','ciudad' => 'Monterrey, NL','direccion' => 'Av. Constituyentes 500')
    ),
    'GHI8765' => array(
        'Auto' => array('marca' => 'FORD','modelo' => 2018,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Luis Martínez','ciudad' => 'Guadalajara, Jal.','direccion' => 'Col. Americana 200')
    ),
    'JKL0987' => array(
        'Auto' => array('marca' => 'CHEVROLET','modelo' => 2017,'tipo' => 'camioneta'),
        'Propietario' => array('nombre' => 'Roberto Garcia','ciudad' => 'Querétaro, Qro.','direccion' => 'Av. Corregidora 101')
    ),
    'MNO6543' => array(
        'Auto' => array('marca' => 'VOLKSWAGEN','modelo' => 2020,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Sara Gómez','ciudad' => 'Tijuana, BC','direccion' => 'Blvd. Insurgentes 305')
    ),
    'PQR8765' => array(
        'Auto' => array('marca' => 'NISSAN','modelo' => 2019,'tipo' => 'hatchback'),
        'Propietario' => array('nombre' => 'Marta Lopez','ciudad' => 'Culiacán, Sin.','direccion' => 'Av. Revolución 15')
    ),
    'STU3210' => array(
        'Auto' => array('marca' => 'MITSUBISHI','modelo' => 2021,'tipo' => 'camioneta'),
        'Propietario' => array('nombre' => 'Pedro Fernandez','ciudad' => 'Cancún, QRoo.','direccion' => 'Col. Centro, Calle 10')
    ),
    'VWX9876' => array(
        'Auto' => array('marca' => 'KIA','modelo' => 2022,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Claudia Martínez','ciudad' => 'Chihuahua, Chih.','direccion' => 'Av. Universidad 123')
    ),
    'YZA5432' => array(
        'Auto' => array('marca' => 'HYUNDAI','modelo' => 2020,'tipo' => 'hatchback'),
        'Propietario' => array('nombre' => 'Esteban Rodríguez','ciudad' => 'Mexicali, BC','direccion' => 'Calle Morelos 450')
    ),
    'BCD1234' => array(
        'Auto' => array('marca' => 'TESLA','modelo' => 2022,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Rosa Sánchez','ciudad' => 'Guadalajara, Jal.','direccion' => 'Av. Vallarta 800')
    ),
    'EFG5678' => array(
        'Auto' => array('marca' => 'BMW','modelo' => 2021,'tipo' => 'camioneta'),
        'Propietario' => array('nombre' => 'Miguel Ramirez','ciudad' => 'León, Gto.','direccion' => 'Blvd. Aeropuerto 550')
    ),
    'HIJ9012' => array(
        'Auto' => array('marca' => 'AUDI','modelo' => 2020,'tipo' => 'sedan'),
        'Propietario' => array('nombre' => 'Andrea Villarreal','ciudad' => 'Toluca, Edomex','direccion' => 'Calle Hidalgo 102')
    ),
    'KLM3456' => array(
        'Auto' => array('marca' => 'MERCEDES-BENZ','modelo' => 2022,'tipo' => 'camioneta'),
        'Propietario' => array('nombre' => 'Fernando Rivera','ciudad' => 'Saltillo, Coah.','direccion' => 'Col. Centro, Calle Juárez')
    ),
    'NOP7890' => array(
        'Auto' => array('marca' => 'PEUGEOT','modelo' => 2021,'tipo' => 'hatchback'),
        'Propietario' => array('nombre' => 'Verónica Torres','ciudad' => 'Aguascalientes, Ags.','direccion' => 'Calle Madero 600')
    )
);

function Matricula($matricula) {
    global $vehiculos;
    if (isset($vehiculos[$matricula])) {
        echo '<h2>Información del vehículo con matrícula ' . $matricula . ':</h2>';
        print_r($vehiculos[$matricula]);
    } else {
        echo '<h2>No se encontró un vehículo con la matrícula ' . $matricula . '.</h2>';
    }
}

function Carros() {
    global $vehiculos;
    echo '<h2>Información de todos los vehículos registrados:</h2>';
    print_r($vehiculos);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque Vehicular</title>
</head>

<body>

    <h1>Parque Vehicular</h1>

    <form action= "Formulario2.php" method="post">
        <label for="matricula">Consulta por matrícula:</label>
        <input type="text" id="matricula" name="matricula" required>
        <button type="submit" name="consulta" value="matricula">Consultar</button>
    </form>

    <form method="post" action="">
        <button type="submit" name="consulta" value="todos">Mostrar todos los autos</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $consulta = $_POST['consulta'];

        if ($consulta === 'matricula') {
            $matricula = strtoupper($_POST['matricula']);
            Matricula($matricula);
        } elseif ($consulta === 'todos') {
            Carros();
        }
    }
    ?>

</body>

</html>
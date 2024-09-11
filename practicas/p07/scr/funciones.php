<?php
function esMultiplo($num)
{
    if ($num % 5 == 0 && $num % 7 == 0) {
        return 'El número ' . $num . ' SÍ es múltiplo de 5 y 7.';
    } else {
        return 'El número ' . $num . ' NO es múltiplo de 5 y 7.';
    }
}

function generarSecuencia(){
    $numeros = [];
    $iteraciones = 0;
    $todosLosNumeros = [];

    while(true){
        $temp = []; 

        for($i = 0; $i < 3; $i++) {
            $num = rand(1, 1000);
            $temp[] = $num;
        }
        
        $todosLosNumeros = array_merge($todosLosNumeros, $temp); 
    
        if($temp[0] % 2 != 0 && $temp[1] % 2 == 0 && $temp[2] % 2 != 0) {
            $numeros = $temp; 
            $iteraciones++;
            break; 
        }
        
        $iteraciones++; 
    }

    return ['numeros' => $numeros, 'iteraciones' => $iteraciones, 'todosLosNumeros' => $todosLosNumeros,  'totalNumerosGenerados' => count($todosLosNumeros)];
}


function MultiploWhile($multi) {
    $random = rand(1, 100);
    while ($random % $multi !== 0) {
        $random = rand(1, 100);
    }
    return $random;
}

function MultiploDoWhile($multi) {
    do {
        $random = rand(1, 100);
    } while ($random % $multi !== 0);
    return $random;
}

?>

//FUNICOND E EJEMPLO
function getDatos() {
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre ' + nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';
}


//Ejemplo 1
function impresion() {
    var Hola = document.createElement('div');
    Hola.textContent = 'Hola Mundo';
    document.getElementById('resultados').appendChild(Hola);
}

//Ejemplo 2
function variables() {
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    // Insertar las respuestas en los elementos div
    document.getElementById('ejercicio1').innerHTML += nombre;
    document.getElementById('ejercicio2').innerHTML += edad;
    document.getElementById('ejercicio3').innerHTML += altura;
    document.getElementById('ejercicio4').innerHTML += casado;
}

//Ejemplo 3
function Entrada() {
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad: ', '');
    document.getElementById('Resultado').innerHTML = 'Hola ' + nombre + ', así que tienes ' + edad + ' años.';
}

//Ejemplo 4
function Estructurada2() {
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);
    document.getElementById('Suma').innerHTML = 'La suma es ' + suma + '<br> El producto es ' + producto;
}

//Ejemplo 5
function if3() {
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');
    if (nota >= 4) {
        document.getElementById('if3').innerHTML = nombre + ' esta aprovada con un ' + nota;
    }
}

//Ejemplo 6
function ifelse() {
    var num1, num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    if (num1 > num2) {
        document.getElementById('ifelse').innerHTML = ' el mayor es ' + num1;
    }
    else {
        document.getElementById('ifelse').innerHTML = ' el menor es ' + num1;
    }

}

//Ejemplo 7
function ifelseanidada() {
    var nota1, nota2, nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro;
    pro = (nota1 + nota2 + nota3) / 3;
    if (pro >= 7) {
        document.getElementById('ifelseanidada').innerHTML = ' aprovado';
    }
    else {
        if (pro >= 4) {
            document.getElementById('ifelseanidada').innerHTML = ' regular';
        }
        else {
            document.getElementById('ifelseanidada').innerHTML = ' reprobado';
        }
    }

}

//Ejemplo 8
function switc() {
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '');
    //Convertimos a entero
    valor = parseInt(valor);
    switch (valor) {
        case 1: document.getElementById('switc').innerHTML = ' uno ';

            break;

        case 2: document.getElementById('switc').innerHTML = ' dos ';

            break;

        case 3: document.getElementById('switc').innerHTML = ' tres ';

            break;

        case 4: document.getElementById('switc').innerHTML = ' cuatro ';

            break;

        case 5: document.getElementById('switc').innerHTML = ' cinco ';

            break;

        default: document.getElementById('switc').innerHTML = ' debe ingresar un valor comprendido entre 1 y 5. ';
    }
}

//Ejemplo 9
function color() {
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)', '');
    switch (col) {
        case 'rojo': document.bgColor = '#ff0000';

            break;

        case 'verde': document.bgColor = '#00ff00';

            break;

        case 'azul': document.bgColor = '#0000ff';

            break;

    }
}

function wile() {
    var x;
    x = 1;
    while (x <= 100) {
        document.getElementById('wile').innerHTML = x + '<br>';
        x = x + 1;
    }
}

function acumulador() {
    var x = 1;
    var suma = 0;
    var valor;
    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    document.getElementById('acumulador').innerHTML = suma + '<br>';
}

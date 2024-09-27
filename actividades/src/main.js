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
    document.getElementById('Suma').innerHTML = 'La suma es ' + suma + '<br> El producto es '+ producto;
}

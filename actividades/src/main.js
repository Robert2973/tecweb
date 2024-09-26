//FUNICOND E EJEMPLO
function getDatos()
{
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML= '<h3> Nombre '+ nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML='<h3> Edad: '+ edad + '</h3>';
}


//Ejemplo 1
function impresion() {
    var Hola = document.createElement('div');
    Hola.textContent = 'Hola Mundo';
    document.getElementById('resultados').appendChild(Hola);
}


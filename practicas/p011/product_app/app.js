// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "uploads/defecto.png"
  };

// Función para validar el JSON antes de enviarlo, con las validaciones específicas
function validarProducto(producto) {
    if (producto.nombre === "" || producto.nombre.length > 100) {
        alert("El nombre es obligatorio y debe tener 100 caracteres o menos.");
        return false;
    }

    if (producto.marca === "") {
        alert("La marca es obligatoria. Selecciona una opción.");
        return false;
    }

    var regexModelo = /^[a-zA-Z0-9]+$/;
    if (producto.modelo === "" || producto.modelo.length > 25 || !regexModelo.test(producto.modelo)) {
        alert("El modelo es obligatorio, debe ser alfanumérico y tener 25 caracteres o menos.");
        return false;
    }

    if (producto.precio === "" || parseFloat(producto.precio) <= 99.99) {
        alert("El precio es obligatorio y debe ser mayor a 99.99.");
        return false;
    }

    if (producto.detalles.length > 250) {
        alert("Los detalles deben tener 250 caracteres o menos.");
        return false;
    }

    if (producto.unidades === "" || parseInt(producto.unidades) < 0) {
        alert("Las unidades son obligatorias y deben ser 0 o más.");
        return false;
    }

    if (producto.imagen === "") {
        // Asigna la imagen por defecto si no se selecciona ninguna imagen
        producto.imagen = 'uploads/defecto.png';
    }

    return true;
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TÉRMINO DE BÚSQUEDA Y SE ELIMINAN ESPACIOS EN BLANCO
    var search = document.getElementById('search').value.trim();

    // Si el término de búsqueda está vacío, no se hace la petición
    if (search === "") {
        document.getElementById("productos").innerHTML = '<tr><td colspan="3">Por favor, ingrese un término de búsqueda.</td></tr>';
        return;
    }

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState === 4) {
            if (client.status === 200) {
                console.log('[CLIENTE]\n' + client.responseText);
                
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                let productos = JSON.parse(client.responseText);

                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if (Array.isArray(productos) && productos.length > 0) {
                    // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    let template = '';
                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: ' + producto.precio + '</li>';
                        descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                        descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                        descripcion += '<li>marca: ' + producto.marca + '</li>';
                        descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                        // SE CREA UNA PLANTILLA PARA CREAR LA FILA A INSERTAR EN EL DOCUMENTO HTML
                        template += `
                            <tr>
                                <td>${producto.id}</td>
                                <td>${producto.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;
                    });

                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    document.getElementById("productos").innerHTML = template;
                } else {
                    // Manejar caso en que no hay productos encontrados
                    document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
                }
            } else {
                // Manejo de errores del servidor
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">Error al obtener productos. Intente de nuevo más tarde.</td></tr>';
            }
        }
    };
    client.send("search=" + encodeURIComponent(search));
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    // Validar el JSON
    if (!validarProducto(finalJSON)) {
        return; // No enviar si hay errores
    }

    // SE OBTIENE EL STRING DEL JSON FINAL
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);

            // Manejar la respuesta del servidor
            let response = JSON.parse(client.responseText);
            alert(response.mensaje); // Muestra el mensaje de éxito o error
        }
    };
    client.send(productoJsonString);
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}
$(document).ready(function () {
  let edit = false;
  $('#product-result').hide();
  fetchProducts();

  // Función para verificar el nombre del producto en la base de datos al escribir
  $('#name').on('keyup', function () {
    const nombre = $(this).val().trim();
    if (nombre.length > 0) {
      $.ajax({
        url: './backend/product-list.php',  // Usamos el mismo archivo de productos
        type: 'GET',
        success: function (response) {
          const products = JSON.parse(response);
          const exists = products.some(product => product.nombre.toLowerCase() === nombre.toLowerCase());

          if (exists) {
            mostrarStatus("Este nombre ya está registrado en la base de datos.", '#name', 'error');
          } else {
            ocultarStatus('#name');
          }
        }
      });
    } else {
      ocultarStatus('#name');
    }
  });

  $('#search').keyup(function () {
    const search = $('#search').val();
    if (search) {
      $.ajax({
        url: './backend/product-search.php',
        type: 'GET',
        data: { search },
        success: function (response) {
          const products = JSON.parse(response);
          let template = '';
          let templateLista = '';

          products.forEach(product => {
            template += `<li>${product.nombre}</li>`;
            templateLista += `
              <tr productId="${product.id}">
                <td>${product.id}</td>
                <td>
                  <ul>
                    <li>Precio: ${product.precio}</li>
                    <li>Unidades: ${product.unidades}</li>
                    <li>Modelo: ${product.modelo}</li>
                    <li>Marca: ${product.marca}</li>
                    <li>Detalles: ${product.detalles}</li>
                    <li>Imagen: ${product.imagen}</li>
                  </ul>
                </td>
                <td>
                  <button class="product-delete btn btn-danger"> 
                    Delete 
                  </button>
                </td>
              </tr>`;
          });

          $('#container').html(template);
          $('#products').html(templateLista);
          $('#product-result').show();
        }
      });
    } else {
      fetchProducts();
      $('#product-result').hide();
    }
  });

  $('#product-form').submit(function (e) {
    e.preventDefault();
    if (!validarFormulario()) return;

    const productoData = {
      id: $('#productId').val(),
      nombre: $('#name').val(),
      marca: $('#marca').val(),
      modelo: $('#modelo').val(),
      precio: parseFloat($('#precio').val()),
      detalles: $('#detalles').val(),
      unidades: parseInt($('#unidades').val()),
      imagen: $('#imagen').val() || 'uploads/defecto.png'
    };

    // Validar que el nombre del producto no exista antes de enviar el formulario
    const nombre = $('#name').val().trim();
    if (nombre.length > 0) {
      $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        success: function (response) {
          const products = JSON.parse(response);
          const exists = products.some(product => product.nombre.toLowerCase() === nombre.toLowerCase());

          if (exists) {
            mostrarStatus("Este nombre ya está registrado en la base de datos.", '#name', 'error');
          } else {
            ocultarStatus('#name');
            mostrarStatus("Correcto", '#name'); // Mensaje indicando que la validación es correcta

            const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

            $.ajax({
              url: url,
              type: 'POST',
              data: JSON.stringify(productoData),
              contentType: 'application/json',
              success: function (response) {
                const respuesta = JSON.parse(response);
                const template = `Status: ${respuesta.status} <br />Message: ${respuesta.message} <br />`;
                $('#container').html(template);
                $('#product-result').show();
                fetchProducts();
              }
            });
          }
        }
      });
    }
  });

  function fetchProducts() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function (response) {
        const products = JSON.parse(response);
        let template = '';

        products.forEach(product => {
          template += `
            <tr productId="${product.id}">
              <td>${product.id}</td>
              <td>
                <a href="#" class="product-item">${product.nombre}</a>
              </td>
              <td>
                <ul>
                  <li>Precio: ${product.precio}</li>
                  <li>Unidades: ${product.unidades}</li>
                  <li>Modelo: ${product.modelo}</li>
                  <li>Marca: ${product.marca}</li>
                  <li>Detalles: ${product.detalles}</li>
                </ul>
              </td>
              <td>
                <button class="product-delete btn btn-danger"> 
                  Delete 
                </button>
              </td>
            </tr>`;
        });

        $('#products').html(template);
      }
    });
  }

  $(document).on('click', '.product-delete', function () {
    if (confirm('¿Estás seguro que deseas eliminar el elemento?')) {
      const element = $(this).closest('tr');
      const id = element.attr('productId');
      $.get('backend/product-delete.php', { id }, function (response) {
        fetchProducts();
        const respuesta = JSON.parse(response);
        const template = `Status: ${respuesta.status} <br />Message: ${respuesta.message} <br />`;
        $('#container').html(template);
        $('#product-result').show();
      });
    } else {
      $('#product-result').hide();
    }
  });

  $(document).on('click', '.product-item', function () {
    const element = $(this).closest('tr');
    const id = element.attr('productId');
    $.get('./backend/product-single.php', { id }, function (response) {
      const product = JSON.parse(response);
      $('#name').val(product.nombre);
      $('#precio').val(product.precio);
      $('#unidades').val(product.unidades);
      $('#modelo').val(product.modelo);
      $('#marca').val(product.marca);
      $('#detalles').val(product.detalles);
      $('#imagen').val(product.imagen);
      $('#productId').val(product.id);
      edit = true;
    });
  });

  // Funciones de ayuda para mostrar/ocultar mensajes de estatus
  function mostrarStatus(mensaje, selector, tipo) {
    $(selector).next('.status-message').remove(); // Remueve el mensaje previo
    const clase = tipo === 'error' ? 'error' : 'success'; // Clase basada en el tipo
    $(selector).after(`<span class="status-message ${clase}">${mensaje}</span>`);
  }

  function ocultarStatus(selector) {
    $(selector).next('.status-message').remove();
  }

  // Validaciones individuales
  function validarNombre() {
    const nombre = $('#name').val();
    if (!nombre || nombre.length > 100) {
      mostrarStatus("El nombre es obligatorio y debe tener 100 caracteres o menos.", '#name', 'error');
      return false;
    }
    ocultarStatus('#name');
    mostrarStatus("Correcto", '#name');
    return true;
  }

  function validarMarca() {
    const marca = $('#marca').val();
    if (!marca) {
      mostrarStatus("La marca es obligatoria. Selecciona una opción.", '#marca', 'error');
      return false;
    }
    ocultarStatus('#marca');
    mostrarStatus("Correcto", '#marca');
    return true;
  }

  function validarModelo() {
    const modelo = $('#modelo').val();
    const regexModelo = /^[a-zA-Z0-9]+$/;
    if (!modelo || modelo.length > 25 || !regexModelo.test(modelo)) {
      mostrarStatus("El modelo es obligatorio, debe ser alfanumérico y tener 25 caracteres o menos.", '#modelo', 'error');
      return false;
    }
    ocultarStatus('#modelo');
    mostrarStatus("Correcto", '#modelo');
    return true;
  }

  function validarPrecio() {
    const precio = $('#precio').val();
    if (!precio || parseFloat(precio) <= 99.99) {
      mostrarStatus("El precio es obligatorio y debe ser mayor a 99.99.", '#precio', 'error');
      return false;
    }    
    ocultarStatus('#precio');
    mostrarStatus("Correcto", '#precio');
    return true;
  }

  function validarDetalles() {
    const detalles = $('#detalles').val();
    if (detalles.length > 250) {
      mostrarStatus("Los detalles deben tener 250 caracteres o menos.", '#detalles', 'error');
      return false;
    }
    ocultarStatus('#detalles');
    mostrarStatus("Correcto", '#detalles');
    return true;
  }

  function validarUnidades() {
    const unidades = $('#unidades').val();
    if (!unidades || unidades < 0) { // Cambiado de '>' a '<'
        mostrarStatus("Las unidades son obligatorias y deben ser mayores o iguales a 0.", '#unidades', 'error');
        return false;
    }
    ocultarStatus('#unidades');
    mostrarStatus("Correcto", '#unidades');
    return true;
}

  // Validar el formulario completo
  function validarFormulario() {
    const isNombreValido = validarNombre();
    const isMarcaValida = validarMarca();
    const isModeloValido = validarModelo();
    const isPrecioValido = validarPrecio();
    const isDetallesValido = validarDetalles();
    const isUnidadesValido = validarUnidades();
    return isNombreValido && isMarcaValida && isModeloValido && isPrecioValido && isDetallesValido && isUnidadesValido;
  }

  // Validaciones al perder el foco
  $('#name').blur(validarNombre).focus(function () { mostrarStatus("Introduce el nombre del producto.", '#name'); });
  $('#marca').blur(validarMarca).focus(function () { mostrarStatus("Selecciona la marca del producto.", '#marca'); });
  $('#modelo').blur(validarModelo).focus(function () { mostrarStatus("Introduce el modelo del producto.", '#modelo'); });
  $('#precio').blur(validarPrecio).focus(function () { mostrarStatus("Introduce el precio del producto.", '#precio'); });
  $('#detalles').blur(validarDetalles).focus(function () { mostrarStatus("Introduce detalles sobre el producto.", '#detalles'); });
  $('#unidades').blur(validarUnidades).focus(function () { mostrarStatus("Introduce la cantidad de unidades del producto.", '#unidades'); });
});

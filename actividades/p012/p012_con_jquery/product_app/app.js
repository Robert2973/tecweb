var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "uploads/defecto.png"
  };
  
  function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
  
  }
  
  $(document).ready(function () {
    let edit = false;
    $('#product-result').hide();
    fetchProducts();
  
    $('#search').keyup(function (e) {
      if ($('#search').val()) {
        let search = $('#search').val();
        $.ajax({
          url: './backend/product-search.php',
          type: 'GET',
          data: { search },
          success: function (response) {
            let products = JSON.parse(response);
            let template = '';
            let templateLista = '';
  
            products.forEach(product => {
              template += `<li>
                ${product.nombre}
              </li>`;
  
              templateLista += `
                  <tr productId="${product.id}">
                      <td>${product.id}</td>
                      <td>${product.nombre}</td>
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
  
            $('#container').html(template);
            $('#products').html(templateLista);
            $('#product-result').show();
          }
        })
      } else {
        fetchProducts();
        $('#product-result').hide();
      }
    })
  
    $('#product-form').submit(function (e) {
      e.preventDefault();
      const data = {
        name: $('#name').val(),
        description: $('#description').val(),
        id: $('#productId').val()
      }
  
      let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
  
      var descripcionObj = JSON.parse(data.description);
  
      var productoData = {
        id: data.id,
        nombre: data.name,
        marca: descripcionObj.marca,
        modelo: descripcionObj.modelo,
        precio: descripcionObj.precio,
        detalles: descripcionObj.detalles,
        unidades: descripcionObj.unidades,
        imagen: descripcionObj.imagen
      };
  
      $.ajax({
        url: url,
        type: 'POST', 
        data: JSON.stringify(productoData), 
        contentType: 'application/json', 
        success: function (response) {      
          let respuesta = JSON.parse(response);
          let template = '';
          template += `
               Status: ${respuesta.status} <br />
               Message: ${respuesta.message} <br />
              `;
          $('#container').html(template);
          $('#product-result').show();
          fetchProducts();
        }
      });
  
    });
  
    function fetchProducts() {
      $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        success: function (response) {
          let products = JSON.parse(response);
  
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
  
      if (confirm('¿Estas seguro que deseas eliminar el elemento?')) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        $.get('backend/product-delete.php', { id }, function (response) {
          fetchProducts();
          let respuesta = JSON.parse(response);
          let template = '';
          template += `
               Status: ${respuesta.status} <br />
               Message: ${respuesta.message} <br />
              `;
          $('#container').html(template);
          $('#product-result').show();
        })
  
      } else {
        $('#product-result').hide();
      }
  
    })
  
    $(document).on('click', '.product-item', function () {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('productId');
      $.get('./backend/product-single.php', { id }, function (response) {
        let template = '';
        const product = JSON.parse(response);
  
        template +=
          `{
          "precio": ${product.precio},
          "unidades": ${product.unidades},
          "modelo": "${product.modelo}",
          "marca": "${product.marca}",
          "detalles": "${product.detalles}",
          "imagen": "uploads/defecto.png"
          }`
        $('#description').val(template);
        $('#name').val(product.nombre);
        $('#productId').val(product.id)
        edit = true;
      })
    })
  });
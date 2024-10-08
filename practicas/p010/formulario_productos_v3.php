<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro de Relojes</title>
  <style type="text/css">
    ol,
    ul {
      list-style-type: none;
    }
  </style>
  <script>
    function validarNombre() {
      var nombre = document.getElementById('nombre').value;
      if (nombre === "" || nombre.length > 100) {
        alert("El nombre es obligatorio y debe tener 100 caracteres o menos.");
        return false;
      }
      return true;
    }

    function validarMarca() {
      var marca = document.getElementById('marca').value;
      if (marca === "") {
        alert("La marca es obligatoria. Selecciona una opción.");
        return false;
      }
      return true;
    }

    function validarModelo() {
      var modelo = document.getElementById('modelo').value;
      var regexModelo = /^[a-zA-Z0-9]+$/;
      if (modelo === "" || modelo.length > 25 || !regexModelo.test(modelo)) {
        alert("El modelo es obligatorio, debe ser alfanumérico y tener 25 caracteres o menos.");
        return false;
      }
      return true;
    }

    function validarPrecio() {
      var precio = document.getElementById('precio').value;
      if (precio === "" || parseFloat(precio) <= 99.99) {
        alert("El precio es obligatorio y debe ser mayor a 99.99.");
        return false;
      }
      return true;
    }

    function validarDetalles() {
      var detalles = document.getElementById('detalles').value;
      if (detalles.length > 250) {
        alert("Los detalles deben tener 250 caracteres o menos.");
        return false;
      }
      return true;
    }

    function validarUnidades() {
      var unidades = document.getElementById('unidades').value;
      if (unidades === "" || parseInt(unidades) < 0) {
        alert("Las unidades son obligatorias y deben ser 0 o más.");
        return false;
      }
      return true;
    }

    function validarImagen() {
      var imagen = document.getElementById('imagen').value;
      if (imagen === "") {
        // Asigna la imagen por defecto si no se selecciona ninguna imagen
        document.getElementById('imagen').value = 'uploads/defecto.png';
      }
      return true;
    }

    function validarFormulario() {
      return validarNombre() && validarMarca() && validarModelo() && validarPrecio() &&
        validarDetalles() && validarUnidades() && validarImagen();
    }
    
  </script>
</head>

<body>
  <h1>Registro de Relojes</h1>

  <form id="miFormulario" action="update_producto.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">
    <fieldset>
      <legend>Información del Reloj</legend>
      <ul>
      <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']); ?>">
        <label for="nombre">Nombre del Reloj:</label><input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($_GET['nombre']); ?>" required><br>
        <label for="marca">Marca:</label>
        <select id="marca" name="marca" required>
          <option value="">Selecciona una marca</option>
          <option value="Rolex" <?= $_GET['marca'] == 'Rolex' ? 'selected' : ''; ?>>Rolex</option>
          <option value="Omega" <?= $_GET['marca'] == 'Omega' ? 'selected' : ''; ?>>Omega</option>
          <option value="Seiko" <?= $_GET['marca'] == 'Seiko' ? 'selected' : ''; ?>>Seiko</option>
          <option value="Casio" <?= $_GET['marca'] == 'Casio' ? 'selected' : ''; ?>>Casio</option>
        </select><br>
        <label for="modelo">Modelo:</label><input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($_GET['modelo']); ?>" required><br>
        <label for="precio">Precio:</label><input type="number" id="precio" name="precio" step="0.01" value="<?= htmlspecialchars($_GET['precio']); ?>" required><br>
        <label for="detalles">Detalles (opcional):</label><input type="text" id="detalles" name="detalles" value="<?= htmlspecialchars($_GET['detalles']); ?>"><br>
        <label for="unidades">Unidades:</label><input type="number" id="unidades" name="unidades" value="<?= htmlspecialchars($_GET['unidades']); ?>" required><br>
        <label for="imagen">Imagen:</label><input type="file" id="imagen" name="imagen" accept="image/*"><br>
      </ul>
    </fieldset>


    <p>
      <input type="submit" value="¡Registrar Reloj!">
      <input type="reset">
    </p>

  </form>
</body>

</html>

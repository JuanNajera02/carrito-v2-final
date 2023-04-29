document.addEventListener('DOMContentLoaded', function() {
    var btnsAñadir = document.querySelectorAll('.btn-añadir');
    btnsAñadir.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var idProducto = this.dataset.id;
            // Envía una solicitud al servidor para añadir el producto al carrito
            // Puedes utilizar fetch o XMLHttpRequest para hacer la solicitud
            // y pasar el ID del producto como parámetro en la URL o en el cuerpo de la solicitud
            // Ejemplo con fetch:
            fetch('añadir_carrito.php?id=' + idProducto)
                .then(function(response) {
                    // Manejar la respuesta del servidor, por ejemplo, actualizar el carrito en la interfaz de usuario
                })
                .catch(function(error) {
                    console.error('Error al añadir producto al carrito:', error);
                });
        });
    });
});


var btnsAñadir = document.querySelectorAll('.btn-añadir');

// Agrega el evento "click" a cada botón
btnsAñadir.forEach(function(btnAñadir) {
  btnAñadir.addEventListener('click', function() {
    // Obtén el id del producto del atributo "data-id"
    var productId = this.getAttribute('data-id');
    
    // Realiza la lógica para agregar el producto al carrito
    
    // Muestra el mensaje o alerta
    alert('Producto con id ' + productId + ' añadido al carrito!');
  });
});
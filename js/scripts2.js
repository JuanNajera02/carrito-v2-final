


document.querySelector('.formulario').addEventListener('submit', function(event) {
  event.preventDefault(); // Evitar el envío del formulario

  // Obtener los valores de los campos del formulario
  var nombre = document.getElementById('nombre').value;
  var correo = document.getElementById('correo').value;
  var mensaje = document.getElementById('mensaje').value;

  // Expresiones regulares para validar los campos
  var regexNombre = /^[a-zA-Z\s]+$/; // Solo letras y espacios
  var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Formato de correo electrónico
  var regexMensaje = /^.{1,100}$/; // Máximo 100 caracteres en el mensaje

  // Validar los campos del formulario con las expresiones regulares
  if (!regexNombre.test(nombre)) {
    alert('Por favor, ingresa un nombre válido.');
    return;
  }

  if (!regexCorreo.test(correo)) {
    alert('Por favor, ingresa un correo electrónico válido.');
    return;
  }

  if (!regexMensaje.test(mensaje)) {
    alert('Por favor, ingresa un mensaje válido (máximo 100 caracteres).');
    return;
  }

  // Mostrar los datos del formulario en un alert
  alert('Datos del formulario:\n\nNombre: ' + nombre + '\nCorreo: ' + correo + '\nMensaje: ' + mensaje);

  // Enviar el formulario al servidor
  this.submit();
});


  
function limpiarCampos() {
  document.getElementById("nombre").value = ""; // Borra el contenido del input de usuario
  document.getElementById("correo").value = ""; // Borra el contenido del input de contraseña
  document.getElementById("mensaje").value = ""; // Borra el contenido del input de contraseña
}

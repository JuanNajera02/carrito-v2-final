<?php
ob_start(); // Habilitar el almacenamiento en búfer de salida

session_start();
$nombreUsuario = $_SESSION['usuario'];

// Establecer el valor de expiración en una fecha anterior para eliminar las cookies
$expiracion = time() - 3600; // Restar una hora al tiempo actual

// Establecer las cookies con un valor vacío y una fecha de expiración pasada
setcookie('color_fondo_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_letra_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_fondo_header_' . $nombreUsuario, '', $expiracion, '/');
setcookie('color_fondo_footer_' . $nombreUsuario, '', $expiracion, '/');
setcookie('tamano_letra_' . $nombreUsuario, '', $expiracion, '/');

ob_end_flush(); // Enviar el contenido almacenado en búfer
header("Location: configuracion.php"); // Redirigir a la página de configuración
exit(); // Salir del script para asegurarse de que no se envíe más contenido después de la redirección

?>

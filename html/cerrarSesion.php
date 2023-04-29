<?php
// Iniciar la sesión


// Borrar una variable de sesión específica, por ejemplo, la variable 'usuario'
setcookie('PHPSESSID', '', time() - 3600, '/');

// Redireccionar al usuario a la página de inicio de sesión o a otra página de tu elección
header("Location: login.php");
exit();
?>

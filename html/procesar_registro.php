<?php

include "../html/carrito-v2/registrarseBD.php";

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$permisos = '0';

$registrarse = new Registrarse();
$exitoRegistro = $registrarse->registrarUsuario($usuario, $contrasena);
if($exitoRegistro == "0"){
    setcookie('mensaje_exito5', "El nombre de usuario ya existe.", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: registro.php");
}
if($exitoRegistro == "1"){
    setcookie('mensaje_exito2', 'Se ha registrado exitosamente el usuario.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: login.php");
    exit();
}
    






// Validar si el nombre de usuario ya existe en la cookie
if (isset($_COOKIE['usuario_' . $usuario])) {

} else {
    // Escapar los datos ingresados por el usuario
    $usuario = htmlspecialchars($usuario);
    $contrasena = htmlspecialchars($contrasena);

    // Crear un nombre de cookie único para el usuario
    $nombreCookie = 'usuario_' . $usuario;

    // Crear una cookie con el nombre de usuario y contraseña
    setcookie($nombreCookie, $contrasena, time() + 3600, "/"); // Expira en 1 hora

    setcookie('mensaje_exito2', 'Se ha registrado exitosamente el usuario.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: login.php");
    exit();
}
?>

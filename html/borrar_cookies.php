<?php
if (isset($_POST['borrarCookies'])) {
    // Función para borrar todas las cookies relacionadas con usuarios
    function borrarCookiesUsuarios() {
        // Obtener los nombres de las cookies relacionadas con usuarios
        $cookiesUsuarios = array();
        foreach ($_COOKIE as $nombreCookie => $valorCookie) {
            if (strpos($nombreCookie, 'usuario_') === 0) { // Verificar si el nombre de la cookie comienza con 'usuario_'
                $cookiesUsuarios[] = $nombreCookie;
            }
        }

        // Borrar las cookies relacionadas con usuarios
        foreach ($cookiesUsuarios as $nombreCookie) {
            setcookie($nombreCookie, "", time() - 3600, "/"); // Establecer tiempo de expiración en el pasado para borrar la cookie
            unset($_COOKIE[$nombreCookie]); // Eliminar la cookie del arreglo $_COOKIE
        }

        // Establecer una cookie con el mensaje de éxito
        setcookie('mensaje_exito', 'Se han borrado exitosamente las cookies relacionadas con usuarios.', time() + 5, "/"); // La cookie expira en 5 segundos
    }

    // Llamar a la función para borrar todas las cookies relacionadas con usuarios
    borrarCookiesUsuarios();
    header("Location: registro.php");

}
?>

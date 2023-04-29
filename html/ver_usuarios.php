<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/stylesVerUsuarios.css"> <!-- Vincula el archivo CSS externo -->
</head>
<body>
    <?php
    // Obtener la lista de usuarios almacenados en las cookies
    function obtenerUsuarios() {
        $listaUsuarios = "";
        foreach ($_COOKIE as $nombreCookie => $valorCookie) {
            if (strpos($nombreCookie, 'usuario_') === 0) { // Verificar si el nombre de la cookie comienza con 'usuario_'
                // Obtener el nombre de usuario y contraseña de la cookie
                $nombreUsuario = substr($nombreCookie, 8); // El nombre de usuario comienza desde el noveno carácter en adelante
                $contrasenaUsuario = $valorCookie; // El valor de la cookie contiene la contraseña
                // Mostrar el nombre de usuario y contraseña en la lista HTML
                echo "<li><span>Nombre de usuario:</span> " . $nombreUsuario . ", <span>Contraseña:</span> " . $contrasenaUsuario . "</li>";
            }
        }
    }

    // Imprimir la lista de usuarios
    echo "<h2>Usuarios almacenados en cookies:</h2>";
    echo "<ul>";
    obtenerUsuarios();
    echo "</ul>";
    ?>

    <!-- Agregar un botón para regresar a registro.html -->
    <a class="regresar-btn" href="registro.php">Regresar a Registro</a>
</body>
</html>

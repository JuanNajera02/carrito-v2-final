<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesLogin.css">
</head>
<body>
    <?php
    // Verificar si hay una cookie con el mensaje de éxito
    if (isset($_COOKIE['mensaje_exito2'])) {
        // Obtener el mensaje de éxito y mostrarlo en la página
        $mensajeExito2 = $_COOKIE['mensaje_exito2'];
        echo "<p class='mensaje-exito'>$mensajeExito2</p>";
        
        // Borrar la cookie del mensaje de éxito
        setcookie('mensaje_exito2', '', time() - 3600, "/");
    }

    if (isset($_COOKIE['mensaje_exito3'])) {
        // Obtener el mensaje de éxito y mostrarlo en la página
        $mensajeExito3 = $_COOKIE['mensaje_exito3'];
        echo "<p class='mensaje-exito3'>$mensajeExito3</p>";
        
        // Borrar la cookie del mensaje de éxito
        setcookie('mensaje_exito3', '', time() - 3600, "/");
    }


    ?>
    <header class="titulo">
        Iniciar Sesión
    </header>

    <div class="nav-bg">
        
            <div class="centrado-empresa">
                <h1>TNTELECOMS</h1>
            </div>


    </div>


    <div class="contenedor-form" >
        <form action="procesar_login.php" method="post" class="formulario" id="formulario">
            <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" class="input" >
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="input" >
            <input type="submit" value="Iniciar sesión" class="btn">
            <div class="registro">
                <a class="enlace-btn" onclick="limpiarCampos()">Limpiar Campos</a>
                <p>¿No tienes cuenta? </p>
                <a class="enlace-btn" href="../html/registro.php">Registrarse</a>
            </div>
        </form>
    </div>




    <script src="../js/scripts1.js"></script>
</body>
<footer>Elaborado por: Equipo 6</footer>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesRegistro.css">
</head>
<body>
    <?php

    // Verificar si hay una cookie con el mensaje de éxito
    if (isset($_COOKIE['mensaje_exito'])) {
        // Obtener el mensaje de éxito y mostrarlo en la página
        $mensajeExito = $_COOKIE['mensaje_exito'];
        echo "<p class='mensaje-exito'>$mensajeExito</p>";
        
        // Borrar la cookie del mensaje de éxito
        setcookie('mensaje_exito', '', time() - 3600, "/");
    }

    if (isset($_COOKIE['mensaje_exito5'])) {
        // Obtener el mensaje de éxito y mostrarlo en la página
        $mensajeExito5 = $_COOKIE['mensaje_exito5'];
        echo "<p class='mensaje-exito5'>$mensajeExito5</p>";
        
        // Borrar la cookie del mensaje de éxito
        setcookie('mensaje_exito5', '', time() - 3600, "/");
    }

    
    ?>
    <!-- Resto del contenido de la página -->
    <header class="titulo">
        Registrarse
    </header>

    <div class="centrado-empresa">
        <h1>TNTELECOMS</h1>
    </div>


<div class="contenedor-form" >

    <div class="formulario">

        <form action="procesar_registro.php" method="post">
        <div class="registro">
            <input type="text" name="usuario" placeholder="Nombre de usuario" class="input" >
            <input type="password" name="contrasena" placeholder="Contraseña" class="input" >
            <button type="submit" value="aceptar" class="btn">Registrarse</button>
        </div>
        </form>

        <form class="form-2" method="post" action="borrar_cookies.php">
            
            <button class="btn" type="submit" name="borrarCookies">Borrar Registros</button>
            <div class="registro">
                <a href="ver_usuarios.php" class="enlace-btn" >Ver Usuarios</a>
                <a href="login.php" class="enlace-btn" >Ir iniciar Sesión</a>
            </div>
            
        </form>

    </div>
    
</div>





</body>
<footer>Elaborado por: Equipo 6</footer>
</html>
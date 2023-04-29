<?php
// Verificar si la cookie del usuario existe
// Verificar si alguna cookie comienza con "usuario_"
if (!isset($_COOKIE['PHPSESSID'])) {
    // Redireccionar al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

session_start();
$nombreUsuario = $_SESSION['usuario'];


if (isset($_POST['tamano_letra'])) {
    // Obtener el valor del tamaño de letra seleccionado
    $tamanoLetra = $_POST['tamano_letra'];

    // Crear una cookie con el valor del tamaño de letra específica para el usuario
    setcookie('tamano_letra_' . $nombreUsuario, $tamanoLetra, time() + (86400 * 30), '/'); // Caduca en 30 días

    // Redireccionar a la misma página para reflejar los cambios
    header("Location: configuracion.php");
    exit();
}

// Verificar si la cookie existe antes de usarla
if (isset($_COOKIE['tamano_letra_' . $nombreUsuario])) {
    $tamanoLetra = $_COOKIE['tamano_letra_' . $nombreUsuario];

    // Definir las clases CSS para cada tamaño de letra
    switch ($tamanoLetra) {
        case 'chica':
            $clase = 'letra-chica';
            break;
        case 'mediana':
            $clase = 'letra-mediana';
            break;
        case 'grande':
            $clase = 'letra-grande';
            break;
        default:
            $clase = 'letra-def';
            break;
    }
} else {


}


// Obtener el valor del botón seleccionado
if (isset($_POST['boton_seleccionado'])) {
    $botonSeleccionado = $_POST['boton_seleccionado'];



    // Asignar combinación de colores basada en el botón seleccionado
    switch ($botonSeleccionado) {
        case 'tema1':
            $colorFondo = '#F8EFEF'; // Gris claro para el fondo
            $colorLetra = '#460000'; // Negro para la letra
            $colorFondoHeader = '#C7C7C7'; // Blanco para el header
            $colorFondoFooter = '#0D305E'; // Blanco para el footer
            break;
        case 'tema2':
            $colorFondo = '#FBE5C6'; // Azul claro para el fondo
            $colorLetra = '#69401E'; // Negro para la letra
            $colorFondoHeader = '#E9CBA7'; // Gris claro para el header
            $colorFondoFooter =  '#000000'; // Gris claro para el footer
            break;
        case 'tema3':
            $colorFondo = '#C2E0F9' ; // Blanco para el fondo
            $colorLetra = '#0D305E'; // Negro para la letra
            $colorFondoHeader = '#FFD700' ; // Gris claro para el header
            $colorFondoFooter =  '#0D305E' ; // Gris claro para el footer
            break;
        default:
            // Valores predeterminados si no se selecciona ningún botón
            $colorFondo = '#000000'; // Blanco para el fondo
            $colorLetra = '#000000'; // Negro para la letra
            $colorFondoHeader = '#000000'; // Gris claro para el header
            $colorFondoFooter = '#000000'; // Gris claro para el footer
            break;
    }

    // Crear las cookies con los valores de colores personalizados
    setcookie('color_fondo_' . $nombreUsuario, $colorFondo, time() + (86400 * 30), '/'); // Caduca en 30 días
    setcookie('color_letra_' . $nombreUsuario, $colorLetra, time() + (86400 * 30), '/'); // Caduca en 30 días
    setcookie('color_fondo_header_' . $nombreUsuario, $colorFondoHeader, time() + (86400 * 30), '/'); // Caduca en 30 días
    setcookie('color_fondo_footer_' . $nombreUsuario, $colorFondoFooter, time() + (86400 * 30), '/'); // Caduca en 30 días
    
    header("Location: configuracion.php");
    exit();
}

// También puedes usar los valores de las cookies para aplicar estilos en tu página HTML o CSS

    ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesConf.css">
</head>
<body>
<?php
// Verifica si la cookie 'color_fondo_' . $nombreUsuario está definida
if (isset($_COOKIE['color_fondo_' . $nombreUsuario])) {
    $colorFondo = $_COOKIE['color_fondo_' . $nombreUsuario];
} else {
    // Asigna un valor por defecto si la cookie no está definida
    $colorFondo = '';
}

// Verifica si la cookie 'color_letra_' . $nombreUsuario está definida
if (isset($_COOKIE['color_letra_' . $nombreUsuario])) {
    $colorLetra = $_COOKIE['color_letra_' . $nombreUsuario];
} else {
    // Asigna un valor por defecto si la cookie no está definida
    $colorLetra = '';
}

// Verifica si la cookie 'color_fondo_header_' . $nombreUsuario está definida
if (isset($_COOKIE['color_fondo_header_' . $nombreUsuario])) {
    $colorFondoHeader = $_COOKIE['color_fondo_header_' . $nombreUsuario];
} else {
    // Asigna un valor por defecto si la cookie no está definida
    $colorFondoHeader = '';
}

// Verifica si la cookie 'color_fondo_footer_' . $nombreUsuario está definida
if (isset($_COOKIE['color_fondo_footer_' . $nombreUsuario])) {
    $colorFondoFooter = $_COOKIE['color_fondo_footer_' . $nombreUsuario];
} else {
    // Asigna un valor por defecto si la cookie no está definida
    $colorFondoFooter = '';
}

// Genera el estilo CSS con los valores de las cookies
echo '<style>';
echo 'body {background-color: ' . $colorFondo . '; color: ' . $colorLetra . ';}';
echo 'header {background-color: ' . $colorFondoHeader . ';}';
echo 'footer {background-color: ' . $colorFondoFooter . ';}';
echo '</style>';
?>
    <header class="titulo">
        Configuración
    </header>
    <h1>  Usuario:      <?php echo $nombreUsuario; ?></h1>
    <div class="nav-bg">
        
        <nav class="navegacion contenedor">
            <a href="inicio.php">Inicio</a>
            <a href="carrito.php">Pagar</a>
            <a href="configuracion.php">Configuración</a>
            <a href="contacto.php">Contacto</a>   
            <a href="cerrarSesion.php">Salir</a>  
            <?php if($nombreUsuario == 'admin'){
            echo '<a href="admin.php">Admin</a>'; 
                } ?>

        </nav>

    </div>


    <div class="contenedor-grande">
        <div class="contenedor-confi">


            

            
            <form method="post" action="configuracion.php">
                <div class="tamano-letra">

                    <h2>Tamaño letra</h2>
                    <button class="btn" type="submit" name="tamano_letra" value="chica">
                        Chica
                    </button>

                    <button class="btn" type="submit" name="tamano_letra" value="mediana">
                        Mediana
                    </button>
                    
                    <button class="btn" type="submit" name="tamano_letra" value="grande">
                        Grande
                    </button>
         
                </div> <!-- tamaño letra -->
            </form>


    
                <div class="color-footer">

                    <form method="post" action="configuracion.php" class="form"> <!-- Reemplaza con la ruta del archivo PHP que procesará el formulario -->
                    <h2>Temas</h2>    
                    <button class="btn" name="boton_seleccionado" value="tema1" type="submit">
                            Tema 1
                        </button>

                        <button class="btn" name="boton_seleccionado" value="tema2" type="submit">
                            Tema 2
                        </button>

                        <button class="btn" name="boton_seleccionado" value="tema3" type="submit">
                            Tema 3
                        </button>
                    </form>

                </div> <!-- footer -->

        </div> <!-- contenedor-confi -->


        <button id="btnBorrarConfiguracion" class="btn-grande">Borrar Configuración</button>
   

    </div> <!-- contenedor-grande -->     

    <script src="../js/scripts4.js"></script>
</body>
<footer>Elaborado por: Equipo 6</footer>
</html>


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


if (isset($_COOKIE['mensaje_exito5'])) {
    // Obtener el mensaje de éxito y mostrarlo en la página
    $mensajeExito5 = $_COOKIE['mensaje_exito5'];
    echo "<p class='mensaje-exito5'>$mensajeExito5</p>";
    
    // Borrar la cookie del mensaje de éxito
    setcookie('mensaje_exito5', '', time() - 3600, "/");
}

if (isset($_COOKIE['mensaje_exito2'])) {
    // Obtener el mensaje de éxito y mostrarlo en la página
    $mensajeExito2 = $_COOKIE['mensaje_exito2'];
    echo "<p class='mensaje-exito2'>$mensajeExito2</p>";
    
    // Borrar la cookie del mensaje de éxito
    setcookie('mensaje_exito2', '', time() - 3600, "/");
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
            $clase = '';
            break;
    }
} else {


}

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/stylesAdmin.css">
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
        Inicio           
       
    </header>
    <h1> Bienvenido, <?php echo $nombreUsuario; ?></h1>

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
 
    <div class="centrado-empresa">
            <h1>TNTELECOMS</h1>
    </div>

    <div class="contenedor-productos">

        <div class=".contenedor-form">
                <form method="post" class="formulario" action="procesarProducto.php">
                <h3>Registrar Producto</h3>
                <input type="text" name="Nombre" id="nombre" placeholder="Nombre" class="input">
                <textarea id="mensaje" name="Mensaje" rows="4" cols="50" class="text-area" placeholder="Descripcion"></textarea><br>
                <input type="number" name="Precio" id="precio" placeholder="Precio" class="input">
                <input type="number" name="Cantidad" id="cantidad" placeholder="Cantidad" class="input">
                <input type="file" name="Imagen" id="imagen" class="input">
                <input type="submit" value="Enviar" class="btn">
                </form>
        </div>


        <div class=".contenedor-form">
                <form method="post" class="formulario-chico" action="eliminar_producto.php">
                <h3>Dar de baja Producto</h3>
                <input type="text" name="Nombre" id="nombre" placeholder="Nombre" class="input">
                <input type="submit" value="Enviar" class="btn">
                </form>
        </div>


        <div class=".contenedor-form">

                <form method="post" class="formulario-grande" action="modificar_producto.php">
                <h3>Modificar Productos</h3>
                <select id="opcion" name="opcion" multiple>
                    <option value="1">Nombre</option>
                    <option value="2">Mensaje</option>
                    <option value="3">Precio</option>
                    <option value="4">Cantidad</option>
                    <option value="5">Imagen</option>
                </select>
                <input type="number" name="Id" id="id" placeholder="ID" class="input">
                <input type="text" name="Nombre" id="nombre" placeholder="Nombre" class="input">
                <textarea id="mensaje" name="Mensaje" rows="4" cols="50" class="text-area" placeholder="Descripcion"></textarea><br>
                <input type="number" name="Precio" id="precio" placeholder="Precio" class="input">
                <input type="number" name="Cantidad" id="cantidad" placeholder="Cantidad" class="input">
                <input type="file" name="Imagen" id="imagen" class="input">
                <input type="submit" value="Enviar" class="btn">

                </form>
        </div>

    </div>






    <script src="../js/scripts3.js"></script>
</body>
<footer>Elaborado por: Equipo 6</footer>
</html>

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

// Obtener el valor de la cookie específica para el usuario
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

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesContacto.css">
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
        Contactanos
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

<div class="dis-flex">


    <section class="info-empresa">
        <div class="contenedor">
            <div class="info">
                <h3>Información de la empresa</h3>
                <p class="<?php echo $clase; ?>">Empresa dedicada a la venta de productos de tecnología</p>
                <p class="<?php echo $clase; ?>">Ubicada en la ciudad de Toluca, Estado de México</p>
                <p class="<?php echo $clase; ?>">Horario de atención: Lunes a Viernes de 9:00 a 18:00 hrs</p>
            </div>
            <div class="contacto">
                <h3>Contacto</h3>
                <p class="<?php echo $clase; ?>">Telefono: 722 123 4567</p>
                <p class="<?php echo $clase; ?>">Correo: tntelecoms@hotmail.com</p>
    </section>

    
    <div class=".contenedor-form">
        <div class="formulario" >
            <form method="post" class="formulario">
            <input type="text" name="Nombre" id="nombre" placeholder="Nombre" class="input">
            <input type="text" name="Correo" id="correo" placeholder="E-mail" class="input">
            <textarea id="mensaje" name="Mensaje" rows="4" cols="50" class="text-area" placeholder="Escribe tu mensaje aquí"></textarea><br>
            <input type="submit" value="Enviar" class="btn">
            </form>
            <button type="button" class="btn" onclick=limpiarCampos(); id="limpiarCampos">Limpiar Campos</button>
        </div>
    </div>

</div>

<script src="../js/scripts2.js"></script>

</body>
<footer>Elaborado por: Equipo 6</footer>
</html>


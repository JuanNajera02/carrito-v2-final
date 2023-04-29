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
    <link rel="stylesheet" href="/css/stylesInicio.css">
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

        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-1.jpg" alt="laptop">
            <p class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 1</p>
            <p class="<?php echo $clase; ?>" class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="1">Añadir al Carrito</button>
        </div>
        
        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-2.jpeg" alt="laptop">
            <p class="<?php echo $clase; ?>" class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 2</p>
            <p class="<?php echo $clase; ?>" class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="2">Añadir al Carrito</button>
        </div>

        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-3.jpeg" alt="laptop">
            <p class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 3</p>
            <p class="<?php echo $clase; ?>" class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="3">Añadir al Carrito</button>
        </div>

        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-4.webp" alt="laptop">
            <p class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 4</p>
            <p class="<?php echo $clase; ?>" class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="4">Añadir al Carrito</button>
        </div>

        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-5.jpg" alt="laptop">
            <p class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 5</p>
            <p class="<?php echo $clase; ?>" class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="5">Añadir al Carrito</button>
        </div>

        <div class="secciones-tienda">
            <img class="laptop" src="../imgs/laptops/laptop-6.webp" alt="laptop">
            <p class="<?php echo $clase; ?>" class="parrafo">Nombre: Laptop 6</p>
            <p class="<?php echo $clase; ?>"  class="parrafo">Precio: $1000</p>
            <button class="btn-añadir" data-id="6">Añadir al Carrito</button>
        </div>

    </div>




    <script src="../js/scripts3.js"></script>
</body>
<footer>Elaborado por: Equipo 6</footer>
</html>

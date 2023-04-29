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




    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylesCarrito.css">
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
        Pagar
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


<?php
// Obtener el ID del producto seleccionado desde la solicitud del cliente
$total = 0;
$lol = 0;
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    // Verificar si la cookie del usuario existe
    // Verificar si alguna cookie comienza con "usuario_"
    if (!isset($_COOKIE['PHPSESSID'])) {
        // Redireccionar al usuario a la página de inicio de sesión
        header("Location: login.php");
        exit();
    }

    foreach ($_COOKIE as $nombre => $valor) {
        if (strpos($nombre, 'usuario_') === 0) {
            $nombreUsuario = substr($nombre, 8);
            session_start();

            // Obtener el nombre de usuario de la variable de sesión
            $nombreUsuario = $_SESSION['usuario'];

            // Obtener el array de productos del carrito del usuario
            $productosCarrito = isset($_COOKIE['usuario_' . $nombreUsuario . '_carrito']) ? unserialize($_COOKIE['usuario_' . $nombreUsuario . '_carrito']) : array();

            // Añadir el ID del producto a la cookie del usuario
            $productosCarrito[] = $idProducto;
            setcookie('usuario_' . $nombreUsuario . '_carrito', serialize($productosCarrito), time() + 3600, '/');
            break;
        }
    }
}

// Verificar si la cookie del carrito del usuario existe
if (isset($_COOKIE['usuario_' . $nombreUsuario . '_carrito'])) {
    // Obtener el array de productos del carrito del usuario
    $productosCarrito = unserialize($_COOKIE['usuario_' . $nombreUsuario . '_carrito']);

    // Recorrer el array de productos del carrito del usuario
    echo '<div style="text-align:center;padding-top:5rem">';
    foreach ($productosCarrito as $idProducto) {
        $lol = 1;
        // Hacer lo que necesites con el ID del producto
        if($idProducto == 1){
            echo '<img src="../imgs/laptops/laptop-1.jpg" class="laptop" alt="Laptop 1">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 1" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }else if($idProducto == 2){
            echo '<img src="../imgs/laptops/laptop-2.jpeg" class="laptop" alt="Laptop 2">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 2" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }else if($idProducto == 3){
            echo '<img src="../imgs/laptops/laptop-3.jpeg" class="laptop" alt="Laptop 3">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 3" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }else if($idProducto == 4){
            echo '<img src="../imgs/laptops/laptop-4.webp" class="laptop" alt="Laptop 4">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 4" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }else if($idProducto == 5){
            echo '<img src="../imgs/laptops/laptop-5.jpg" class="laptop" alt="Laptop 5">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 5" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }else if($idProducto == 6){
            echo '<img src="../imgs/laptops/laptop-6.webp" class="laptop" alt="Laptop 6">' . "<br>"; // Ruta de la imagen de Laptop 1
            echo "ID de producto: " . $idProducto . " Nombre: Laptop 6" . " Precio: $1000" . "<br>";
            $total = $total + 1000;
        }
    
        // Agregar formulario para eliminar el producto
        echo '<form action="eliminar_producto.php" method="post">';
        echo '<input type="hidden" name="idProductoEliminar" value="' . $idProducto . '">';
        echo '<input class="btn" type="submit" name="eliminar" value="Eliminar">';
        echo '</form>';
        echo "<br>";
        echo "<br>";
    }

} else {
    echo '<h3>No hay productos en el carrito</h3>';
}

if($lol==1){
    echo "<h3 class=titulo-3>Total a pagar: $" . $total;
}



?>
    





</body>
<footer>Elaborado por: Equipo 6</footer>
</html>


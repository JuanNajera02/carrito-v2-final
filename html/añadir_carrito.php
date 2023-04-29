<?php
// Obtener el ID del producto seleccionado desde la solicitud del cliente
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

        // Verificar si la cookie del carrito del usuario ya existe
        if (isset($_COOKIE['usuario_' . $nombreUsuario . '_carrito'])) {
            // Obtener el array de productos del carrito del usuario
            $productosCarrito = unserialize($_COOKIE['usuario_' . $nombreUsuario . '_carrito']);
        } else {
            // Si la cookie del carrito del usuario no existe, crear un nuevo array vacío
            $productosCarrito = array();
        }
        
        // Añadir el ID del producto al array de productos del carrito del usuario
        $productosCarrito[] = $idProducto;
        
        // Serializar y actualizar la cookie del carrito del usuario
        setcookie('usuario_' . $nombreUsuario . '_carrito', serialize($productosCarrito), time() + 3600, '/');
        
        break;
    }
}


$nombreUsuario = $_SESSION['usuario'];

// Verificar si la cookie del carrito del usuario existe
if (isset($_COOKIE['usuario_' . $nombreUsuario . '_carrito'])) {
    // Obtener el array de productos del carrito del usuario
    $productosCarrito = unserialize($_COOKIE['usuario_' . $nombreUsuario . '_carrito']);

    // Recorrer el array de productos del carrito del usuario
    foreach ($productosCarrito as $idProducto) {
        // Hacer lo que necesites con el ID del producto
        echo "ID de producto: " . $idProducto . "<br>";
    }
} else {
    echo "El carrito del usuario está vacío.";
}
?>

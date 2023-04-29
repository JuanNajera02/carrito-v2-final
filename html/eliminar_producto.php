<?php

include "../html/carrito-v2/Productos.php";

$nombre = $_POST['Nombre'];



$producto = new Productos();
$exitoRegistro = $producto->eliminarProducto($nombre);
if($exitoRegistro == "0"){
    setcookie('mensaje_exito5', "El producto no se pudo dar de baja", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: admin.php");
}
if($exitoRegistro == "1"){
    setcookie('mensaje_exito2', 'Se ha dado de baja exitosamente el producto.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: admin.php");
    exit();
}



?>

<?php

include "../html/carrito-v2/Productos.php";

$nombre = $_POST['Nombre'];
$mensaje = $_POST['Mensaje'];
$precio = $_POST['Precio'];
$cantidad = $_POST['Cantidad'];
$imagen_nombre = $_POST['Imagen'];
$imagen_permanente = 'C:\Users\Juan Pablo\Desktop\DESARROLLO_WEB_1\imgs\laptops' . $imagen_nombre;



$producto = new Productos();
$exitoRegistro = $producto->registrarProducto($nombre, $mensaje, $precio, $cantidad, $imagen_permanente);

if($exitoRegistro == "0"){
    setcookie('mensaje_exito5', "El producto no se pudo registrar", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: admin.php");
    
}
if($exitoRegistro == "1"){
    setcookie('mensaje_exito2', 'Se ha registrado exitosamente el producto.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: admin.php");
    exit();
}



?>

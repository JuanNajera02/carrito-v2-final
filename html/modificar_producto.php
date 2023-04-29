<?php

include "../html/carrito-v2/Productos.php";


$opcion = $_POST['opcion'];
$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$mensaje = $_POST['Mensaje'];
$precio = $_POST['Precio'];
$cantidad = $_POST['Cantidad'];
$imagen = $_FILES['Imagen'];
$imagen_permanente = 'C:\Users\Juan Pablo\Desktop\DESARROLLO_WEB_1\imgs\laptops' . $imagen;

$producto = new Productos();

if($opcion == "1"){
    $exitoRegistro = $producto->modificarNombre($id, $nombre);
}else if($opcion == "2"){
    $exitoRegistro = $producto->modificarDescripcion($id, $mensaje);
}else if($opcion == "3"){
    $exitoRegistro = $producto->modificarPrecio($id, $precio);
}else if($opcion == "4"){
    $exitoRegistro = $producto->modificarCantidad($id, $cantidad);
}else if($opcion == "5"){
    $exitoRegistro = $producto->modificarFoto($id, $imagen_permanente);
}else{
    setcookie('mensaje_exito5', "Seleccion el campo que desea modificar", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: admin.php");
}

if($exitoRegistro == "0"){
    setcookie('mensaje_exito5', "El producto no se pudo modificar", time() + 5, "/"); // La cookie expira en 5 segundos
    header("Location: admin.php");
}
if($exitoRegistro == "1"){
    setcookie('mensaje_exito2', 'Se modifico exitosamente el producto.', time() + 5, "/"); // La cookie expira en 5 segundos

    // Redireccionar a la página de inicio
    header("Location: admin.php");
    exit();
}



?>

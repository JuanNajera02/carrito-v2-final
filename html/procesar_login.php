<?php

include "../html/carrito-v2/iniciarSesionBD.php";


    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];


    $iniciarSesion = new IniciarSesion();
    $resultado = $iniciarSesion->verificarCredenciales($usuario, $contrasena);

    if ($resultado == "1") {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: ../html/inicio.php");  

    } else if($resultado == "0") {
        setcookie('mensaje_exito3', 'Credenciales Incorrectas.', time() + 5, "/"); 
        header("Location: ../html/login.php");  
    }









?>

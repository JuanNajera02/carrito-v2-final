<?php
include "../html/carrito-v2/conexion.php";

class IniciarSesion
{

    // return 2 si el email aun no ha sido validado
    // return 1 si el usuario y la contraseña son correctos
    // return 0 si el usuario es incorrecto

    public function verificarCredenciales($usuario, $contrasena): string
    {
        $con = new Conexion();        
        $resultado = $con->getConexion()->query("SELECT nombreUsuario,contrasena FROM usuarios WHERE nombreUsuario = '$usuario' AND contrasena = '$contrasena'");
        
        if ($resultado->num_rows > 0) {

            
            return "1";
        }
    
        return "0";
        
    }
    
}
?>
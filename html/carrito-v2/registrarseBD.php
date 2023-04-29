<?php 
include "../html/carrito-v2/conexion.php";

class Registrarse{
    private $conexion;
    public function __construct(){
        $this->conexion = new Conexion();
    }
    public function registrarUsuario($usuario, $contrasena){
        $stmt = $this->conexion->getConexion()->prepare("INSERT INTO usuarios(nombreUsuario, contrasena, permisos) VALUES (?, ?, '0')");
        $stmt->bind_param("ss", $usuario, $contrasena);
        $stmt->execute();
        if($stmt->affected_rows == -1){
            $stmt->close();
            return "0";

        }

        $stmt->close();
        
        return "1";

    }

}

?>
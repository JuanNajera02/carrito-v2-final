<?php
include "../html/carrito-v2/conexion.php";

class Productos
{


    private $conexion;
    public function __construct(){
        $this->conexion = new Conexion();
    }
    public function registrarProducto($nombre, $descripcion, $precio, $cantidad, $foto){
        $stmt = $this->conexion->getConexion()->prepare("INSERT INTO productos(nombre_producto, descripcion, precio, cantidad, foto, estado_producto) VALUES (?, ?, ?, ?, ?, '1')");
        $stmt->bind_param("sssss", $nombre, $descripcion, $precio, $cantidad, $foto);
        $stmt->execute();
        if($stmt->affected_rows == -1){
            $stmt->close();
            return "0";

        }

        $stmt->close();
        
        return "1";
    }

    public function eliminarProducto($nombre){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET estado_producto = '0' WHERE nombre_producto = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    public function modificarNombre($id, $nombre){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET nombre_producto = ? WHERE id_producto = ?");
        $stmt->bind_param("si", $nombre, $id);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    public function modificarDescripcion($id, $descripcion){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET descripcion = ? WHERE id_producto = ?");
        $stmt->bind_param("si", $descripcion, $id);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    public function modificarPrecio($id, $precio){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET precio = ? WHERE id_producto = ?");
        $stmt->bind_param("di", $precio, $id);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    public function modificarCantidad($id, $cantidad){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET cantidad = ? WHERE id_producto = ?");
        $stmt->bind_param("ii", $cantidad, $id);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    public function modificarFoto($id, $foto){
        $stmt = $this->conexion->getConexion()->prepare("UPDATE productos SET foto = ? WHERE id_producto = ?");
        $stmt->bind_param("si", $foto, $id);
        $stmt->execute();
        if($stmt->affected_rows == 0){
            $stmt->close();
            return "0";
        }

        $stmt->close();
        
        return "1";
    }

    



    
}
?>
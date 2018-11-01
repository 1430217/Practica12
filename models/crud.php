<?php
require_once "conexion.php";

class Datos extends Conexion{

    /**
     * Funciones para registrar
    */

    /* AGREGAR UNA CATEGORIA */
    public function addCategoria($categoria, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_categoria, descripcion, fecha) VALUES (:nombre_categoria, :descripcion, :fecha)");

        $stmt->bindParam(':nombre_categoria', $categoria['nombre_categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $categoria['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $categoria['fecha'], PDO::PARAM_STR);

        if($stmt->execute()){
            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }

    /* AGREGAR PRODUCTO */
    public function addProducto($producto, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_producto, codigo,fecha, precio, stock, idCategoria, imagenProducto) 
                                                    VALUES (:nombre_producto, :codigo, :fecha, :precio, :stock, :idCategoria, :imagenProducto)")
        ;
        
        $stmt->bindParam(':nombre_producto', $producto['nombre_producto'], PDO::PARAM_STR);
        $stmt->bindParam(':codigo', $producto['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $producto['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':precio', $producto['precio'], PDO::PARAM_INT);
        $stmt->bindParam(':stock', $producto['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':idCategoria', $producto['idCategoria'], PDO::PARAM_INT);
        $stmt->bindParam(':imagenProducto', $producto['imagenProducto']);

        if($stmt->execute()){
            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }

    /* AGREGAR USUARIO */
    public function addUsuario($usuario, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apellido, nombre_usuario, password, correo, fecha, imagenPerfil) 
                                        VALUES (:nombre, :apellido, :nombre_usuario, :password, :correo, :fecha, :imagenPerfil)"
        );

        $stmt->bindParam(':nombre', $usuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $usuario['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre_usuario', $usuario['nombre_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $usuario['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $usuario['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':imagenPerfil', $usuario['imagenPerfil']);

        if($stmt->execute()){
            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }

    /*AGREGAR STOCK */
    public function addStock($idProducto, $cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT stock FROM producto WHERE idProducto = :idProducto");
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        
        $cantidad = $res["stock"]+$cantidad["stock"];
        $stmt2 = Conexion::conectar()->prepare("UPDATE producto SET stock=:stock WHERE idProducto = :idProducto");
        $stmt2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
        $stmt2->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        if($stmt2->execute())
        {
            return "success";
        }
        $stmt2->close();
        $stmt->close();

    }



    public function deleteStock($cantidad, $idProducto){
        $stmt = Conexion::conectar()->prepare("SELECT stock FROM producto WHERE idProducto = :idProducto");
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetch();
        
        $cantidad = $res["stock"]-$cantidad["stock"];
        $stmt2 = Conexion::conectar()->prepare("UPDATE producto SET stock=:stock WHERE idProducto = :idProducto");
        $stmt2->bindParam(":stock", $cantidad, PDO::PARAM_INT);
        $stmt2->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        if($stmt2->execute())
        {
            return "success";
        }
        $stmt2->close();
        $stmt->close();
    }

    /* AGREGAR historial */
    public function addHistorial($historial, $tabla){
        $stmt = Conexion::conectar(" INSERT INTO $tabla (idProducto, idUsuario, fecha, nota, referencia, cantidad) 
            VALUES (:idProducto, :idUsuario, :fecha, :nota, :referencia, :cantidad)"
        );


        $stmt->bindParam(':idProducto', $historial['idProducto'], PDO::PARAM_INT);
        $stmt->bindParam(':idUsuario', $historial['idUsuario'], PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $historial['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':nota', $historial['nota'], PDO::PARAM_STR);
        $stmt->bindParam(':referencia', $historial['referencia'], PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $historial['cantidad'], PDO::PARAM_INT);

        if($stmt->execute()){
            return 'success';
        }else{
            return 'error';
        }

        $stmt->close();
    }


    /*
     * FUNCION PARA EL LOGIN 
    */

    /* Login */
    public function loginModel($usuario, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nombre_usuario, password FROM $tabla WHERE nombre_usuario = :nombre_usuario");
        $stmt->bindParam(':nombre_usuario', $usuario['nombre_usuario'], PDO::PARAM_STR);		
        $stmt->execute();
        return $stmt->fetch();

        $stmt->close();
    }


    /* 
     * FUNCIONES PARA HACER UPDATE 
    */

    /* Funcion para el update de categoria */
    public function updateCategoria($idCategoria, $categoria){
        $stmt = Conexion::conectar()->prepare("CALL update_categoria(
            :idCategoria, 
            :nombre_categoria,
            :descripcion,
            :fecha
            );");		
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);

        $stmt->bindParam(':nombre_categoria', $categoria['nombre_categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $categoria['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $categoria['fecha'], PDO::PARAM_STR);
            
        if ($stmt->execute())
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }

    /* Funcion para hacer update de un producto */
    public function updateProducto($idProducto, $producto){
        $stmt = Conexion::conectar()->prepare("CALL update_producto(
            :idProducto,
            :nombre_producto,
            :codigo,
            :fecha,
            :precio,
            :stock,
            :idCategoria,
            :imagenProducto
            );");		

        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':nombre_producto', $producto['nombre_producto'], PDO::PARAM_STR);
        $stmt->bindParam(':codigo', $producto['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $producto['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':precio', $producto['precio'], PDO::PARAM_INT);
        $stmt->bindParam(':stock', $producto['stock'], PDO::PARAM_INT);
        $stmt->bindParam(':idCategoria', $producto['idCategoria'], PDO::PARAM_INT);
        $stmt->bindParam(':imagenProducto', $producto['imagenProducto'], PDO::PARAM_STR);
            
        if ($stmt->execute())
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }


    /* Funcion para hacer update a un usuario */
    public function updateUsuario($usuario, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, nombre_usuario = :nombre_usuario, 
            password = :password, correo = :correo, fecha = :fecha, imagenPerfil = :imagenPerfil WHERE idUsuario = :idUsuario"
        );		

        $stmt->bindParam(':nombre', $usuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $usuario['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre_usuario', $usuario['nombre_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $usuario['password'], PDO::PARAM_STR);
        $stmt->bindParam(':correo', $usuario['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $usuario['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':imagenPerfil', $usuario['imagenPerfil']);
        $stmt->bindParam(':idUsuario', $usuario['idUsuario'], PDO::PARAM_INT);
            
        if ($stmt->execute())
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }


    /**
     * Funciones para get para traer los registros de la base de datos
    */

    /* Funcion para traer todas las categorias */
    public function getCategorias(){
        $stmt = Conexion::conectar()->prepare("CALL get_categorias();");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 
    }

    /* Funcion para traer un registro de la tabla categoria */
    public function getCategoria($idCategoria){
        $stmt = Conexion::conectar()->prepare("CALL get_categoria_byid(:idCategoria);");
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    /* Funcion para traer todos los productos */
    public function getProductos(){
        $stmt = Conexion::conectar()->prepare("CALL get_productos();");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 
    }

    public function getProducto($idProducto){
        $stmt = Conexion::conectar()->prepare("CALL get_producto_byid(:idProducto);");
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    /* Funcion para traer todos los usuarios */
    public function getUsuarios($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close(); 
    }

    /* Funcion para traer un registro de la tabla usuario */
    public function getUsuario($idUsuario, $tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

    /* 
     *Funciones para Eliminar un registro 
    */
    /* Funcion para eliminar una catgoria */
    public function deleteCategoria($idCategoria, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");
        $stmt->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->execute()) 
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }

    /* Funcion para eliminar un producto */
    public function deleteProducto($idProducto, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->execute()) 
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }

    /* Funcion para eliminar un usuario */
    public function deleteUsuario($idUsuario, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->execute()) 
            return 'success';
        else 
            return 'error';
        $stmt->close();
    }


    /*
     *Funciones count para contar los registros de las diferentes tablas 
    */

    /* Funcion para CONTAR los registros de la tabla categoria */
    public function countCategorias($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }

    /* Funcion para CONTAR los registros de la tabla prodcuto */
    public function countProductos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }

    /* Funcion para CONTAR los registros de la tabla usuario */
    public function countUsuarios($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $rows = $stmt->rowCount();
        return $rows;
    }


}

?>
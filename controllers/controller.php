<?php
class MvcController{
    public function pagina(){
        include 'views/template.php';
    }

    public function enlacesPaginasController(){
        if(isset($_GET['action'])){
            $enlaces = $_GET['action'];
        }else{
            $enlaces = 'index';
        }
        $respuesta = EnlacesPagina::enlacesPaginasModel($enlaces);
        include $respuesta;
    }

    /**
    * FUNCIONES PARA INSERTAR REGISTROS 
    */
    
    /* Funcion para registrar productos */
    public function addProductoController(){
        if(isset($_POST['nombre'])){

            $nombreImagen = $_FILES['imagenProducto']['name'];
            //Recibe los datos
            $data = $_FILES['imagenProducto']['tmp_name'];			
            //Ruta donde se van a guardar las imagenes	
            $ruta = "images";
            //Esto quedará así /imagenes/nombreImagen.jpg
            $ruta = $ruta."/".$nombreImagen;
            //Mueve la imagen a la carpeta que especificamos en la variable ruta
            move_uploaded_file($data, $ruta);

            $producto = array(
                'nombre_producto' => $_POST['nombre_producto'],
                'codigo' => $_POST['codigo'],
				'fecha' => $_POST['fecha'],
				'precio' => $_POST['precio'],
                'stock' => $_POST['stock'],
				'idCategoria' => $_POST['idCategoria'],
				'imagenProducto' => $ruta
            );

            $stmt = Datos::addProducto($producto, 'producto');             

            if($stmt == "success"){
                
                header("Location: index.php?action=ok");
            }
            else{
                header("Location: index.php");
            }
        }

    }

    /* Funcion para registrar categorias */
    public function addCategoriaController(){
        if(isset($_POST['nombre_categoria'])){
            $categoria = array(
                'nombre_categoria' => $_POST['nombre_categoria'],
                'descripcion' => $_POST['descripcion'],
                'fecha' => $_POST['fecha']
            );
            
            $stmt = Datos::addCategoria($categoria, 'categoria');

            if($stmt == 'success')
                header ('Location: index.php?action=categorias');
            else
                echo 'Hubo un error al registrar';
        }
    }

    public function addUsuarioController(){

        if(isset($_POST['nombre'])){

            date_default_timezone_set('America/Mexico_City');
            $fecha = date('Y-m-d');

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $nombreImagen = $_FILES['imagenPerfil']['name'];
            $data = $_FILES['imagenPerfil']['tmp_name'];			
            $ruta = "images";
            $ruta = $ruta."/".$nombreImagen;
            move_uploaded_file($data, $ruta);

            $usuario = array(
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'nombre_usuario' => $_POST['nombre_usuario'],
                'password' => $password,
                'correo' => $_POST['correo'],
                'fecha' => $fecha,
                'imagenPerfil' => $ruta
            );

            //print_r($usuario);

            $stmt = Datos::addUsuario($usuario, 'usuario');

            if($stmt == 'success')
                header ('Location: index.php');
            else
                echo 'Hubo un error al registrar';
        }
    }
    

    /* Funcion para guardar el historial */
    public function addHistorialController(){
        if(isset($_POST['nombre'])){
            $historial = array(
                'idProducto' => NULL,
                'idUsuario' => NULL,
                'fecha' => $_POST['fecha'],
                'nota' => NULL,
                'referencia' => $_POST['codigo'],
                'cantidad' => $_POST['stock']
            );
            $stmt = Datos::addHistorial($historial, 'historial');
            if($stmt == 'success')
                header ('Location: index.php?action=productos');
            else
                echo 'Hubo un error al registrar';
        }
    }


    /*
     * FUNCION PARA LOGIN 
    */
    public function loginController(){

        if (isset($_POST['nombre_usuario'])) {

            $usuario = array(
                'nombre_usuario' => $_POST['nombre_usuario'],
                'password' => $_POST['password']
            );

            //Recibe el usuario como un array y el nombre de la tabla
            $stmt = Datos::loginModel($usuario, 'usuario');
            
            //Si los datos coinciden con los de la base de datos entonces se inicia la sesion
            if($_POST['nombre_usuario'] == $stmt['nombre_usuario']){ 
                //Comprobar la contraseña cifrada de la base de datos con la del formulario
                if(password_verify($_POST['password'], $stmt['password'])){ 
                    
                    session_start();
                    $_SESSION['idUsuario'] = $stmt['idUsuario'];
                    $_SESSION['sesion'] = true;
                    header('location: index.php?action=dashboard');
                }
            } 
            else 
                header('location:index.php?action=fallo');
        }
    }

    /* 
     * FUNCIONES PARA HACER UPDATE
    */

    /* Funcion para hacer update a categoria */
    public function updateCategoriaController(){

        if (isset($_POST['idCategoria'])) {
            $idCategoria= $_POST['idCategoria'];

            $categoria = array(
                'nombre_categoria' => $_POST['nombre_categoria'],
                'descripcion' => $_POST['descripcion'],
                'fecha' => $_POST['fecha']
            );

            $stmt = Datos::updateCategoria($idCategoria, $categoria);

            if($stmt == "success")
                header("Location: index.php?action=cambio");
            else
                echo 'Error al actualizar';		
        }
    }

    /* Funcion para hacer update a un producto */
    public function updateProductoController(){

        if (isset($_POST['idProducto'])) {
            $idProducto= $_POST['idProducto'];
            $nombreImagen = $_FILES['imagenProducto']['name'];
            //Recibe los datos
            $data = $_FILES['imagenProducto']['tmp_name'];			
            //Ruta donde se van a guardar las imagenes	
            $ruta = "images";
            //Esto quedará así /imagenes/nombreImagen.jpg
            $ruta = $ruta."/".$nombreImagen;
            //Mueve la imagen a la carpeta que especificamos en la variable ruta
            move_uploaded_file($data, $ruta);
            
            
            $producto = array(
                'nombre_producto' => $_POST['nombre_producto'],
                'codigo' => $_POST['codigo'],
                'fecha' => $_POST['fecha'],
                'precio' => $_POST['precio'],
                'stock' => $_POST['stock'],
                'idCategoria' => $_POST['idCategoria'],
                'imagenProducto' => $ruta
            );

            $stmt = Datos::updateProducto($idProducto, $producto);
            if($stmt == "success")
                header("Location: index.php?action=productos");
            else
                echo 'Error al actualizar';
                
        }
    }


    /* Funcion para hacer update a un producto */
    public function updateUsuarioController(){

        if (isset($_POST['idUsuario'])) {
            date_default_timezone_set('America/Mexico_City');
            $fecha = date('Y-m-d');

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $nombreImagen = $_FILES['imagenPerfil']['name'];
            $data = $_FILES['imagenPerfil']['tmp_name'];			
            $ruta = "images";
            $ruta = $ruta."/".$nombreImagen;
            move_uploaded_file($data, $ruta);

            $usuario = array(
                'idUsuario' => $_POST['idUsuario'],
                'nombre' => $_POST['nombre'],
				'apellido' => $_POST['apellido'],
				'nombre_usuario' => $_POST['nombre_usuario'],
                'password' => $password,
                'correo' => $_POST['correo'],
                'fecha' => $fecha,
				'imagenPerfil' => $ruta
            );

            //print_r($usuario);

            $stmt = Datos::updateUsuario($usuario, 'usuario');

            if($stmt == "success")
                header("Location: index.php?action=usuarios");
            else
                echo 'Error al actualizar';		
        }
    }

    /* Funcion para hacer update al stock */
    public function updateStockController(){

        if(isset($_POST['cantidad']))
        {   
            $cantidad= $_POST['cantidad'];
            if($cantidad < 1){
            echo '<script>
                     alert("SOLO CANTIDAD POSITIVA!");
                     window.location.href = "index.php?action=addStock&idProducto='.$_GET['idProducto'].'"; 
                 </script>';
            }else{
                $respuesta = Datos::addStock($_GET["idProducto"], $cantidad);
            
                if($respuesta == "success")
                {
                header('location:index.php?action=productos');
                }
                else
                {
                    echo "error";
                }
            }
        }
    }

    public function deleteStockController(){
        if(isset($_POST['cantidad']))
        {
            $cantidad = array('stock' => $_POST['cantidad']);
            $respuesta = Datos::deleteStock($cantidad, $_GET["idProducto"]);
            if($respuesta == "success")
            {
            header('location:index.php?action=productos');
            }
            else
            {
                echo "error";
            }
        }        
    }

    /**
     * FUNCIONES GET PARA TRAER LOS REGISTROS DE LA BASE DE DATOS
    */

    /* Funcion para traer todas las categorias */
    public function getCategoriasCmb(){
        $stmt = Datos::getCategorias('categoria');

        foreach($stmt as $categoria => $r) {
                echo '<option value="'.$r['idCategoria'].'">' .$r['nombre_categoria']. '</option>';
        }
    }

    /* Funcion para mostrar las categorias en la lista */
    public function getCategoriasList(){
        $stmt = Datos::getCategorias('categoria');

        foreach($stmt as $categoria => $r) {
            echo '
                <li class="">
                    <div class="card list-view-media">
                        <div class="card-block">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img class="media-object card-list-img"
                                        src="views/assets/images/e-commerce/product-list/pro-l5.png"
                                        alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <div>
                                        <h6 class="d-inline-block"><strong>Nombre: </strong>'.$r["nombre_categoria"].'</h6></br>
                                    </div>

                                    <div class="f-13 text-muted m-b-15">
                                        fecha de creación: '.$r["fecha"].'
                                    </div>

                                    <p> <strong>Descripcion: </strong>'.$r["descripcion"].'</p>
                                    <a href="index.php?action=editarCategoria&idCategoria='.$r["idCategoria"].'"><button class="btn btn-warning">Editar</button></a>
                                    <a href="index.php?action=categorias&idBorrar='.$r["idCategoria"].'"><button class="btn btn-danger">Eliminar</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>'
            ;
        }
    }

    /* Funcion para mostrar a los usuarios en la lista */
    public function getUsuariosList(){
        $stmt = Datos::getUsuarios('usuario');

        foreach($stmt as $usuarios => $r) {
            echo '
                <li class="">
                    <div class="card list-view-media">
                        <div class="card-block">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img class="media-object card-list-img"
                                        src="'.$r["imagenPerfil"].'"
                                        alt="Imagen de perfil"
                                        width="150" height="200">
                                </a>
                                <div class="media-body">
                                    <div>
                                        <h6 class="d-inline-block"><strong>Nombre: </strong>'.$r["nombre"].' '.$r["apellido"].'</h6></br>
                                        <h6 class="d-inline-block"><strong>Nombre de usuario: </strong>'.$r["nombre_usuario"].'</h6></br>
                                        <h6 class="d-inline-block"><strong>Correo: </strong>'.$r["correo"].'</h6></br>

                                    </div>

                                    <div class="f-13 text-muted m-b-15">
                                        fecha de creación: '.$r["fecha"].'
                                    </div>

                                    <a href="index.php?action=editarUsuario&idUsuario='.$r["idUsuario"].'"><button class="btn btn-warning">Editar</button></a>
                                    <a href="index.php?action=usuarios&idBorrarU='.$r["idUsuario"].'"><button class="btn btn-danger">Eliminar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>'
            ;
        }
    }

    /* Funcion para traer solo los datos de UNA categoria (SIRVE PARA EL UPDATE DE LA CATEGORIA)*/
    public function getCategoriaController(){

        if (isset($_GET['idCategoria'])) {
            $idCategoria = $_GET['idCategoria'];
            $stmt = Datos::getCategoria($idCategoria, 'categoria');

            echo '
                <div class="row">
                    <input type="hidden" class="form-control"  name="idCategoria" 
                    value="'.$stmt["idCategoria"].'"> 

                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-page"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["nombre_categoria"].'" name="nombre_categoria">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                            <input type="date" value="'.$stmt["fecha"].'" class="form-control" name="fecha">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-notepad"></i></span>
                            <textarea name="descripcion" class="form-control" cols="30" rows="10">'.$stmt["descripcion"].'</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                        <div class="text-center m-t-20">
                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Actualizar</button>
                        </div>
                    </div>
                </div>'
            ;
        }
    }

    /* Funcion para traer solo los datos de UN producto (SIRVE PARA EL UPDATE DE LOS PRODUCTOS)*/
    public function getProductoController(){

        if (isset($_GET['idProducto'])) {
            $idProducto = $_GET['idProducto'];
            $stmt = Datos::getProducto($idProducto);

            echo 
                '
                <input type="hidden" class="form-control" value="'.$stmt["idProducto"].'" name="idProducto">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-page"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["nombre_producto"].'" name="nombre_producto">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                            <input type="date" value="'.$stmt["fecha"].'" class="form-control" name="fecha">
                        </div>
                    </div>

                    
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-page"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["codigo"].'" name="codigo">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-ui-note"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["stock"].'" name="stock">
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["precio"].'" name="precio">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-bag"></i></span>
                            <input type="text" class="form-control" value="'.$stmt["nombre_categoria"].'" name="nombre_categoria">
                        </div>
                    </div>

                    <input type="hidden" class="form-control" value="'.$stmt["idCategoria"].'" name="idCategoria">


                    <!--<div class="col-sm-6">
                        <select name="idCategoria" class="form-control form-control-primary">
                            <option selected disabled>Categorias</option>
                            

                        </select>
                    </div>-->

                    <div class="col-sm-6">
                        <label for="imagenProducto">Imagen del producto</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icofont icofont-file-image"></i></span>
                            <input type="file" class="form-control" value="'.$stmt["imagenProducto"].'" name="imagenProducto">
                        </div>
                    </div>                    
                </div>

                <div class="col-sm-12">
                        <div class="text-center m-t-20">
                            <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Agregar</button>
                        </div>
                    </div>
                </div>'
            ;
        }
    }

    public function getUsuarioController(){

        if (isset($_GET['idUsuario'])) {
            $id = $_GET['idUsuario'];
            $stmt = Datos::getUsuario($id, 'usuario');

            echo
            '
            <input type="hidden" class="form-control" value="'.$stmt["idUsuario"].'" name="idUsuario">    

            <div class="input-group">
                <input type="text" class="form-control" value="'.$stmt["nombre"].'" name="nombre">
                <span class="md-line"></span>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" value="'.$stmt["apellido"].'" name="apellido">
                <span class="md-line"></span>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" value="'.$stmt["nombre_usuario"].'" name="nombre_usuario">
                <span class="md-line"></span>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" value="'.$stmt["correo"].'" name="correo">
                <span class="md-line"></span>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" placeholder="contraseña" name="password">
                <span class="md-line"></span>
            </div>

            <div class="input-group">
                <input type="hidden" class="form-control" value="'.$stmt["fecha"].'"name="fecha">
                <span class="md-line"></span>
            </div>
            
            <div class="input-group">
                <input type="file" class="form-control" placeholder="Imagen de perfil" name="imagenPerfil" id="imagenPerfil">
                <span class="md-line"></span>
            </div>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Actualizar</button>
                </div>
            </div>'
            ;
        }
    }

    /* Funcion para mostrar los productos en la grid (Rejilla / Cuadros de productos) */
    public function getProductosGrid(){
        $stmt = Datos::getProductos();

        foreach($stmt as $producto => $r) {
            echo '
                <div class="col-xl-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="card prod-view">
                        <div class="prod-item text-center">
                            <div class="prod-img">
                                <!-- <div class="option-hover">
                                    <a href="#">
                                        <button type="button" class="btn btn-primary btn-icon waves-effect waves-light m-r-15 hvr-bounce-in option-icon">
                                            <i class="icofont icofont-eye-alt f-20"></i>
                                        </button>
                                    </a>
                                </div>-->
                                
                                <a href="index.php?action=detallesProducto&idProducto='.$r["idProducto"].'" class="hvr-shrink">
                                    <img src="'.$r['imagenProducto'].'" class="img-fluid o-hidden" width="500" height="500" alt="Imagen del articulo">
                                </a>    

                                <div class="p-new"><a href="">Stock: '.$r["stock"].'</a></div>
                            </div>

                            <div class="prod-info">
                                <a href="index.php?action=detallesProducto&idProducto='.$r["idProducto"].'" class="txt-muted"><h4>'.$r['nombre_producto'].'</h4></a>
                                <div class="m-b-10">
                                    <a class="text-muted f-w-600">Categoria: '.$r['nombre_categoria'].'</a></br>
                                    <a class="text-muted f-w-600">Codigo: '.$r['codigo'].'</a>
                                </div>

                                <span class="prod-price"><i class="icofont icofont-cur-dollar"></i>'.$r['precio'].'</span>
                            </div>
                        </div>
                    </div>
                </div>'

            ;
        }
    }

    /* Funcion para traer los detalles de un producto */
    public function getProductoDetalles(){
        if (isset($_GET['idProducto'])) {
            $id = $_GET['idProducto'];
            $stmt = Datos::getProducto($id);
            return $stmt;

        }
    }

    /**
     * Funciones para eliminar registros
    */

    /* Funcion para eliminiar una categoria */
    public function deleteCategoriaController(){
        if (isset($_GET['idBorrar'])){  

            $stmt = Datos::deleteCategoria($_GET['idBorrar'], 'categoria');
            if($stmt == 'success')
                header('Location: index.php?action=categorias');
            else 
                echo 'Error al eliminar la categoria';
        }
    }

    /* Funcion para eliminiar un producto */
    public function deleteProductoController(){
       if (isset($_GET['idBorrarP'])){  

           $stmt = Datos::deleteProducto($_GET['idBorrarP'], 'producto');
           if($stmt == 'success')
               header('Location: index.php?action=productos');
           else 
               echo 'Error al eliminar el producto';
       }
    }

    /* Funcion para eliminiar un usuario */
    public function deleteUsuarioController(){
        if (isset($_GET['idBorrarU'])){  
 
            $stmt = Datos::deleteUsuario($_GET['idBorrarU'], 'usuario');
            if($stmt == 'success')
                header('Location: index.php?action=usuarios');
            else 
                echo 'Error al eliminar el usuario';
        }
     }

    /*
     * FUNCIONES PARA CONTAR LOS REGISTROS QUE EXISTEN EN LAS TABLAS 
    */

    /*Funcion para contar las categorias */
    public function getCountCategorias(){
        $stmt = Datos::countCategorias('categoria');
        echo $stmt;
    }

    /*Funcion para contar las productos */
    public function getCountProductos(){
        $stmt = Datos::countProductos('producto');
        echo $stmt;
    }

    /* Funcion para contar los usuario */
    public function getCountUsuarios(){
        $stmt = Datos::countUsuarios('usuario');
        echo $stmt;
    }

}

?>
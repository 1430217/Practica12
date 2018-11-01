<?php
    class EnlacesPagina{

        public function enlacesPaginasModel($enlaces){
            if($enlaces == 'dashboard' || $enlaces == 'addProducto' || $enlaces == 'addCategoria' || $enlaces == 'productos' ||
                $enlaces == 'login' || $enlaces == 'registro' || $enlaces == 'usuarios' || $enlaces == 'categorias' ||
                $enlaces == 'editarCategoria' || $enlaces == 'detallesProducto' || $enlaces == 'editarProducto' ||
                $enlaces == 'editarUsuario' || $enlaces == 'salir' || $enlaces == 'addStock' || $enlaces == 'quitarStock'){
                    
                    $module = 'views/modules/'.$enlaces.'.php';            
            }
            else if ($enlaces === 'index') { $module = 'views/modules/dashboard.php'; }
            else if ($enlaces === 'ok') { $module = 'views/modules/productos.php'; }
            else if ($enlaces == 'cambio') { $module = 'views/modules/categorias.php'; }
            else if ($enlaces == 'fallo') { $module = 'views/modules/login.php'; }

            return $module;
        }
    }

?>
<?php 
    $mvc = new MvcController();
    
	/*if (!$_SESSION['sesion']) {
		header('location:index.php?action=login');
		exit();
	}else{
        session_start();
    }*/

?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-basket bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Productos / Inventario</h4>
                    <span>En esta pagina se podrá ver los diferentes artuculos o productos que estén en el inventario.</span>
                    <span>Productos registrados: </span> <strong><?= $mvc ->getCountProductos();?></strong><br><br>
                    <a href="index.php?action=addProducto"><button class="btn btn-success">Agregar un producto</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        
            <?php
                $mvc->getProductosGrid();
            ?>
    </div>
</div>
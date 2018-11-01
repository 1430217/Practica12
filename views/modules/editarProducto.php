<?php 
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
                <i class="icofont icofont-listine-dots bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Actualizar articulo</h4>
                    <span>Actualice los datos del articulo que sean necesarios.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
                <h5>Llene los datos del formulario para actualizar producto.</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-spinner-alt-5"></i>
                    </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div>
                                <form class="md-float-material card-block" method="POST" enctype="multipart/form-data">
                                    <?php
                                        $mvc = new MvcController();
                                        $mvc ->getProductoController();
                                        $mvc ->updateProductoController();
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> 
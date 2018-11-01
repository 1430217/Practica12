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
                <i class="icofont icofont-briefcase-alt-1 bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Categorias</h4>
                    <span>En esta pagina encontramos las diferentes categorias disponibles.</span><br><br>
                    <a href="index.php?action=addCategoria"><button class="btn btn-success">
                        Agregar una categoria
                    </button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Categorias: <?php $mvc->getCountCategorias();?> </h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>
                </div>
                <div class="row card-block">
                    <div class="col-md-12">
                        <ul class="list-view">
                            <!-- 
                                Lista de categorias
                            -->
                            <?php
                                $mvc ->getCategoriasList();
                                $mvc ->deleteCategoriaController();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

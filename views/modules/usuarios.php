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
                <i class="icofont icofont-users bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Ver usuarios</h4>
                    <span>En esta sección estan los usuarios registrados en el sistema.</span><br><br>
                    <a href="index.php?action=registro"><button class="btn btn-success">Agregar un nuevo usuario</button></a>
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
                    <h5>Usuarios registrados: <?php $mvc->getCountUsuarios();?> </h5>
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
                                $mvc ->getUsuariosList();
                                $mvc ->deleteUsuarioController();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*
	if (!$_SESSION['sesion']) {
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
                    <h4>Editar categoria</h4>
                    <span>En esta pagina se podrá editar una categoria, actualice los datos que crea necesarios.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content">
                            <div>
                                <form class="md-float-material card-block" method="POST">
                                    <?php
                                        $mvc = new MvcController();
                                        $mvc->getCategoriaController();
                                        $mvc->updateCategoriaController();
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> 

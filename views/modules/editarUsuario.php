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
                <i class="icofont icofont icofont-pencil-alt-5 bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Editar usuario</h4>
                    <span>En esta sección podrá editar los datos del usuario seleccionado.</span><br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="md-float-material" method="POST" enctype="multipart/form-data">
    <?php
        $mvc = new MvcController();
        $mvc ->getUsuarioController();
        $mvc ->updateUsuarioController();
    ?>
</form>
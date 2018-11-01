<?php
    $mvc = new MvcController();
    date_default_timezone_set('America/Mexico_City');
    $fecha = date('Y-m-d');
    
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
                <i class="icofont icofont-plus bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Agregar productos</h4>
                    <span>Llene los datos requeridos para agregar un producto al inventario.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
        <div class="card-header">
                <h5>Llene los datos del formulario para agregar producto al inventario.</h5>
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

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-page"></i></span>
                                                <input type="text" class="form-control" placeholder="Nombre del producto"name="nombre">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                                                <input type="date" value="<?= $fecha?>" class="form-control" name="fecha">
                                            </div>
                                        </div>

                                        
                                    </div>
                                  
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-calendar"></i></span>
                                                <input type="text" placeholder="Codigo de producto" class="form-control" name="codigo">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-ui-note"></i></span>
                                                <input type="text" class="form-control" placeholder="Stock" name="stock">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span>
                                                <input type="text" class="form-control" placeholder="Precio" name="precio">
                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-6">
                                            <select name="idCategoria" class="form-control form-control-primary">
                                                <option selected disabled>Categorias</option>
                                                <?php
                                                    $mvc->getCategoriasCmb();
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label for="imagenProducto">Imagen del producto</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icofont icofont-file-image"></i></span>
                                                <input type="file" class="form-control" name="imagenProducto">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                            <div class="text-center m-t-20">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> 


<?php
    $mvc->addProductoController();
    $mvc->addHistorialController();

    if (isset($_GET['action'])) {

		if ($_GET['action'] === 'ok') 
			echo 'Registro Exitoso';
	}
?>
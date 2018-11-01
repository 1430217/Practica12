<?php
    $mvc = new MvcController();
    
    if(isset($_SESSION['sesion'])){
?>


<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card feature-card-box">
                <div class="card-block-big text-center">
                    <div class="feature-icon bg-c-blue">
                        <i class="icofont icofont-wallet"></i>
                    </div>
                    <h4 class="f-w-400 m-b-15 m-t-30"><?= $mvc->getCountProductos();?></h4>
                    <p class="text-muted f-16 m-b-0">Total de articulos</p>
                    <a href="index.php?action=productos"><p class="text-muted f-16 m-b-0">Ver mas</p></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card feature-card-box">
                <div class="card-block-big text-center">
                    <div class="feature-icon bg-c-pink">
                        <i class="icofont icofont-ui-user"></i>
                    </div>
                    <h4 class="f-w-400 m-b-15 m-t-30"><?= $mvc->getCountCategorias();?></h4>
                    <p class="text-muted f-16 m-b-0">Total de categorias</p>
                    <a href="index.php?action=categorias"><p class="text-muted f-16 m-b-0">Ver mas</p></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card feature-card-box">
                <div class="card-block-big text-center">
                    <div class="feature-icon bg-c-green">
                        <i class="icofont icofont-copy-black"></i>
                    </div>
                    <h4 class="f-w-400 m-b-15 m-t-30"><?= $mvc->getCountUsuarios();?></h4>
                    <p class="text-muted f-16 m-b-0">Total de usuarios</p>
                    <a href="index.php?action=usuarios"><p class="text-muted f-16 m-b-0">Ver mas</p></a>
                </div>
            </div>
        </div>
        <!--<div class="col-md-6 col-xl-3">
            <div class="card feature-card-box">
                <div class="card-block-big text-center">
                    <div class="feature-icon bg-c-yellow">
                        <i class="icofont icofont-cart"></i>
                    </div>
                    <h4 class="f-w-400 m-b-15 m-t-30">5,678</h4>
                    <p class="text-muted f-16 m-b-0">Last week order</p>
                </div>
            </div>
        </div>-->
</div>



</div>

<?php
    }else{
        header('Location: index.php?action=login');
    }
?>

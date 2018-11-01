<?php 

$mvc= new MvcController();
$stmt= $mvc->getProductoDetalles();

?>

<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-listine-dots bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Detalles de producto</h4>
                    <span>En esta pagina podrá ver el articulo así como agregar, eliminar stock y ver los movimientos que se han hecho.</span><br><br>
                    <a href="index.php?action=addProducto"><button class="btn btn-success">Agregar un producto</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <!-- Product detail page start -->
            <div class="card product-detail-page">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-5 col-xs-12">
                            <div class="port_details_all_img row">
                                <div class="col-lg-12 m-b-15">

                                    <div id="big_banner">
                                        <div class="port_big_img">
                                            <img class="img img-fluid" src="<?=$stmt['imagenProducto']?>" alt="Big_ Details">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                            <div class="row">
                                <div>
                                    <div class="col-lg-12">
                                        <span class="txt-muted d-inline-block">Codigo del Producto:
                                            <?= $stmt['codigo']?></span>
                                        
                                    </div>

                                    <div class="col-lg-12">
                                        <h4 class="pro-desc"><?= $stmt['nombre_producto']?></h4>
                                    </div>

                                    <div class="col-lg-12">
                                        <h5 class="pro-desc">Stock disponible: <strong><?= $stmt['stock']?></strong></h4>
                                    </div>

                                    <div class="col-lg-12">
                                        <span class="txt-muted"> Categoria: <strong><?= $stmt['nombre_categoria']?></strong></span>
                                    </div>
            
                                    <div class="col-lg-12">
                                        <span class="text-primary product-price">Precio: <i class="icofont icofont-cur-dollar"></i><strong><?= $stmt['precio']?></strong></span>
                                        <hr>


                                        <h6 class="f-16 f-w-600 m-t-10 m-b-10">Agregar y quitar stock</h6>

                                        
                                        <a href="index.php?action=addStock&idProducto=<?=$stmt["idProducto"]?>">
                                        <input type="submit" class="btn btn-success" name="agregar" value="Agregar stock"></a>

                                        <a href="index.php?action=quitarStock&idProducto=<?=$stmt["idProducto"]?>">
                                        <input type="submit" class="btn btn-danger" name="quitar" value= "Quitar stock"></a>
        
                                        <hr>

                                        <!-- ELIMINAR Y EDITAR PRODUCTO -->
                                        <h6 class="f-16 f-w-600 m-t-10 m-b-10">Editar y Eliminar Producto</h6>

                                        <a href="index.php?action=editarProducto&idProducto=<?=$stmt["idProducto"]?>"><button class="btn btn-warning">Editar Producto</button></a>
                                        <a href="index.php?action=detallesProducto&idBorrarP=<?=$stmt["idProducto"]?>"><button  class="btn btn-danger">Eliminar producto</button></a>
                                        <hr>

                                        
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $mvc->deleteProductoController();
?>
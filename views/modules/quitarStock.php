<div class="card-block">
  <p class="text-muted">Quitar Stock De Productos.</p>
  <form method="post">
   <div class="form-group row">
      <div class="col-sm-10">
        <input type="number" name="cantidad" class="form-control form-control-round" placeholder="Cantidad" required>
      </div>
    </div>

    <div class="col-sm-4">
    <input title="Quitar" name="quitar" type="submit" value="Quitar" class=" form-control btn btn-danger">
	</div>
    </form>
</div>

<?php  

$mvc= new MvcController();
$mvc-> deleteStockController();

?>
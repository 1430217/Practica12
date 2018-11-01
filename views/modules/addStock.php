<?php 
  $mvc = new MvcController();
  if (isset($_POST['cantidad']))
    $mvc ->updateStockController();
?>

<div class="card-block">
  <p class="text-muted">Agregar Stock De Productos.</p>
  <form method="post">
   <div class="form-group row">
      <div class="col-sm-10">
        <input type="number" name="cantidad" class="form-control form-control-round" placeholder="Cantidad" required>
      </div>
      <br> <br>

    </div>
    <div class="col-sm-4">
      <input title="Agregar" name="agregar" type="submit" value="Agregar" class=" form-control btn btn-success">
    </div>

    </form>
</div>


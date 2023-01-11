<?php
require_once '../service/PuestoElectivo.php';
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/PEserviceDB.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';






$service= New PEserviceDB("../database");

if(isset($_POST['name']) && isset($_POST['descripcion']) ){
  $PE= new PuestoElectivo();
  $PE->InitData(0,$_POST['name'],$_POST['descripcion'],1);
  $service->add($PE);
  
  
  header("Location:PuestoE.php");
  exit(); 
}
?>


<?php printHeader();?>

<h2>Puestos Electivos</h2>
      <div class="table-responsive">
      <form  action="PuestoEadd.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Presidente, Diputado...">
    </div>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Mi cargo es supervisar...">
  </div>
  
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>

</body></html>
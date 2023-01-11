<?php
require_once '../service/Elecciones.php';
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/EleccionesDB.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';






$service= New EleccionesDB("../database");

if(isset($_GET['id'])){
  $eleccionID=$_GET['id'];
  $element= $service->GetbyId($eleccionID);


if(isset($_POST['name'])){
  $eleccion= new Elecciones();
  $fecha= new DateTime("now",new DateTimeZone("America/Santo_Domingo"));
  $eleccion->InitData($eleccionID,$_POST['name'],$fecha->format("Y-m-d"),1);
  $service->update($eleccionID,$eleccion);
  
  
  header("Location:EleccionesI.php");
  exit(); 
}
}
?>


<?php printHeader();?>
<h2>Elecciones</h2>

      <div class="table-responsive">
      <form  action="EleccionesEdit.php?id=<?php echo $element->id?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" value="<?php echo $element->nombre?>" class="form-control" id="name" name="name" placeholder="">
    </div>
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
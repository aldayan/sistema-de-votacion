<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/Partidos.php';
require_once '../service/PartidoDB.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';


$service= New PartidoDB("../database");

if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['estado'])){

  $CA = new Partidos(); 
  $CA->InitData(0,$_POST['nombre'],$_POST['descripcion'],$_POST['estado']);
  $service->add($CA);


  header("Location: Partidos.php"); 
  exit(); 
}

?>
<?php printHeader();?>


    <h2>Partidos</h2>
    <div class="table-responsive">
    <form  action="PartidoAdd.php" enctype="multipart/form-data" method="POST">

    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
    </div>

  <div class="form-group col-md-6">
      <label for="descripcion">Descripcion</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
    </div>


    <label for="logo">Logo</label>
    <div class="form-group col-md-6">
    <input type="file" name="logo"  id="logo">
    </div>
  

    <label for="photo">Estado</label>
       <div class="form-check">
       <input type="checkbox" class="form-check-input" name="estado" id="estado" Value=1 >
       <label class="form-check-label" for="Check1">Activo</label>
       </div>

       <div class="form-check">
       <input type="checkbox" class="form-check-input" name="estado" id="estado" Value=0 >
       <label class="form-check-label" for="Check1">No activo</label>
       </div>


      <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        
      </div>
 
    </main>
  </div>
</div>
</body></html>
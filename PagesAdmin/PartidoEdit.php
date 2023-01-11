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
$CID=$_GET['id'];
$element= $service->GetbyId($CID);

if(isset($_POST['nombre']) && isset($_POST['descripcion'])){

  $CA = new Partidos(); 
  $CA->InitData(0,$_POST['nombre'],$_POST['descripcion'],1);
  $service->update($CID,$CA);


  header("Location: Partidos.php"); 
  exit(); 
}

?>
<?php printHeader();?>


    <h2>Partidos</h2>
    <div class="table-responsive">
    <form  action="PartidoEdit.php?id=<?php echo $element->id;?>" enctype="multipart/form-data" method="POST">

    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" value="<?php echo $element->nombre;?>" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
    </div>

  <div class="form-group col-md-6">
      <label for="descripcion">Descripcion</label>
      <input type="text" value="<?php echo $element->descripcion;?>"  class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
    </div>


    <label for="photo">Logo</label>
    <td>
         <?php if($element->logo == "" || $element->logo == null): ?>

         <img  src="<?php echo "../img/default.png" ?>" width="100px" height="100px">

         <?php else: ?>

         <img  src="<?php echo "../img/partidos/" . $element->logo; ?>" width="100px" height="100px">

          <?php endif; ?>
          </td>
    <div class="form-group col-md-6">
    <input type="file" name="logo"  id="logo">
    </div>
  

   


      <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        
      </div>
 
    </main>
  </div>
</div>
</body></html>
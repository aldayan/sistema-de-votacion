<?php 

require_once '../service/IServiceBase.php';
require_once '../layout/layoutcandi.php';
require_once '../service/ciudadanoutilidad.php';
require_once '../service/CiudadanoDB.php';
require_once '../database/context.php';
require_once '../service/ciudadano.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../user/auth.php';


$service = new CiudadanoDB("../database/configuration.json"); 

if(isset($_GET['id'])){
  $CID=$_GET['id'];
}

$entidad = $service->GetbyId($CID);

if(isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email'])){

  $ciudadano =  new Ciudadano();

  $ciudadano->init($CID,$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['email'],1);

  $service->update($ciudadano, $CID);



 header("Location:ciudadanoindex.php");
 exit();
}


?>

<?php printHeader();?>
<h2>Ciudadano</h2>
<main role="main">
    <div style="margin-top: 2%;">


  <div class="card-body">

  <form action="ciudadanoedit.php?id=<?php echo $entidad->id?>" method="POST">
  <div class="form-group">
    <label for="documento">Documento de identidad:</label>
    <input type="text" class="form-control" id="documento" name="cedula" required value="<?php echo $entidad->cedula?>" placeholder="Ingrese su documento de identidad">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $entidad->nombre?>" placeholder="Ingrese su nombre" >
  </div>

  <div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $entidad->apellido?>" required placeholder="Ingrese su apellido">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $entidad->email?>" placeholder="Ingrese su email">
  </div>

    <button type="submit" class=" btn btn-primary">Guardar</button>

</form>
  </div>
</div>


</main>
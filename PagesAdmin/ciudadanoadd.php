<?php 

require_once '../service/IServiceBase.php';
require_once 'ciudadanolayout.php';
require_once '../service/ciudadanoutilidad.php';
require_once '../service/CiudadanoDB.php';
require_once '../database/context.php';
require_once '../service/ciudadano.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../user/auth.php';


$service = new CiudadanoDB("../database/configuration.json"); 



if(isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['estado'])){


    

  $ciudadano =  new Ciudadano();

  $ciudadano->init(0,$_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['estado']);

    $service->add($ciudadano);



 header("Location:ciudadanoindex.php");
 exit();
}


?>

<?php printHeader();?>

<main role="main">
    <div style="margin-top: 2%;">


  <div class="card-body">

  <form action="ciudadanoadd.php" method="POST">
  <div class="form-group">
    <label for="documento">Documento de identidad:</label>
    <input type="text" class="form-control" id="documento" name="cedula" required placeholder="Ingrese su documento de identidad">
  </div>
  <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required  placeholder="Ingrese su nombre" >
  </div>

  <div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="Ingrese su apellido">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required placeholder="Ingrese su email">
  </div>

    <label for="estado">Estado:</label>
    <div class="form-check">
       <input type="checkbox" class="form-check-input" name="estado" id="estado" Value=1 >
       <label class="form-check-label" for="Check1">Activo</label>
       </div>

       <div class="form-check">
       <input type="checkbox" class="form-check-input" name="estado" id="estado" Value=0 >
       <label class="form-check-label" for="Check1">No activo</label>
       </div>

    <button type="submit" class=" btn btn-primary">Guardar</button>

</form>
  </div>
</div>


</main>
<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/CandidatoDB.php';
require_once '../service/CandidatoDB2.php';
require_once '../service/Candidato.php';
require_once '../service/PuestoElectivo.php';
require_once '../service/Partidos.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';

$service= New CandidatoDB("../database");
$service2= New CandidatoDB2("../database");
$puestos= $service2->GetPuesto();
$partidos =$service2->GetPartido();


if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['partido']) && isset($_POST['puesto']) 
&& isset($_POST['estado'])){

  $CA = new Candidato(); 
  $CA->InitData(0,$_POST['nombre'],$_POST['apellido'],$_POST['partido'],$_POST['puesto'],$_POST['estado']);
  $service->add($CA);

  header("Location: Candidatos.php"); 
  exit();
}

?>
<?php printHeader();?>


    <h2>Candidatos</h2>
    <div class="table-responsive">
    <form  action="CandidatosAdd.php" enctype="multipart/form-data" method="POST">

    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
    </div>

  <div class="form-group col-md-6">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
    </div>

    <div class="form-group">
                        <label for="puesto">Puesto:</label>
                      <select  name="puesto" id="puesto" class="form-control">
                      <?php foreach ($puestos as  $puesto):?>
                            <option value="<?php echo $puesto->nombre;?>"><?php echo $puesto->nombre;?></option>
                          <?php endforeach;?>
                          </select>
                      </div>

  
    <div class="form-group">
                        <label for="partido">Partido:</label>
                      <select  name="partido" id="partido" class="form-control">
                      <?php foreach ($partidos as  $partido):?>
                            <option value="<?php echo $partido->nombre;?>"><?php echo $partido->nombre;?></option>
                          <?php endforeach;?>
                          </select>
                      </div>


    <label for="photo">Foto</label>
    <div class="form-group col-md-6">
    <input type="file" name="foto"  id="foto">
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
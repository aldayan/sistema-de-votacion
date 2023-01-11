<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/PEserviceDB.php';
require_once '../service/PuestoElectivo.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';
require_once '../Elecciones/votos.php';


$service1 = new voto("../database");

$service= New PEserviceDB("../database");
$PE= new PuestoElectivo();

$listPE=$service->Getlist();


?>
<?php printHeader();?>

<h2>Puestos Electivos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Estado</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          <?php if(empty($listPE)): ?>
          <h2>No hay Puestos Electivos Registrados </h2>
          <?php  else: ?>
          <?php foreach($listPE as $Puestos) :?>
            <tr>
              <td><?php echo $Puestos->nombre?></td>
              <td><?php echo $Puestos->descripcion?></td>
              <?php if($Puestos->estado == 1): ?>
              <td>Activo</td>
              <?php else:?>
              <td>No activo</td>
              <?php endif; ?>
              <td>
              <?php if($service1->VerificarElec()!=false): ?>
                <div></div>
                <?php else:?>
                <a href="PuestoEedit.php?id=<?php echo $Puestos->id;?>"  class="btn btn-outline-warning">Editar</a>
              <a onclick="preguntar(<?php echo $Puestos->id; ?>)"   class="btn btn-outline-danger">Borrar</a>
                <a href="PuestoeAc.php?id=<?php echo $Puestos->id;?>"  class="btn btn-outline-warning">Activar</a>
              <?php endif; ?>
              </td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
          </tbody>
        </table>
        <a href="PuestoEadd.php" type="submit" class="btn btn-primary btn-lg btn-block">Agregar Puesto Electivo</a>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script class="text/javascript">
function preguntar(id) {
  if(confirm('¿Esta seguro que desea desactivar este puesto electivo?')){
    window.location.href="PuestoeDes.php?id="+id;
  }
}

</script>

</body></html>
<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/EleccionesDB.php';
require_once '../service/VotosDB.php';
require_once '../service/Votos.php';
require_once '../service/Candidato.php';
require_once '../service/Elecciones.php';
require_once '../layout/layoutcandi.php';
require_once '../Elecciones/votos.php';

$service1 = new voto("../database");
$service= New VotosBD("../database");
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
$VotosP=$service->VotosP($id);
$VotosS=$service->VotosS($id);
$VotosD=$service->VotosD($id);
$VotosA=$service->VotosA($id);


$totalP=$service->TotalVotosP($id);
foreach($totalP as $tp){}

$totalS=$service->TotalVotosS($id);
foreach($totalS as $ts){}

$totalD=$service->TotalVotosD($id);
foreach($totalD as $td){}

$totalA=$service->TotalVotosA($id);
foreach($totalA as $ta){}

?>
<?php printHeader();?>
<h2>Elecciones</h2>
      <?php if(empty($VotosP)): ?>
          <h3>No hay votos por Presidente </h3>
          <?php  else: ?>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Puesto</th>
              <th>Candidato</th>
              <th>Cantidad de Votos</th>
              <th>Porcentaje</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($VotosP as $Votacionesp) :?>
            <tr>
              <td><?php echo $Votacionesp->puesto?></td>
              <td><?php echo $service1->NombreC($Votacionesp->candidatoid)->nombre . " " . $service1->NombreC($Votacionesp->candidatoid)->apellido;?></td>
              <td><?php echo $Votacionesp->votosc?></td>
              <td><?php echo round((100*($Votacionesp->votosc/$tp))).'%'?></td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
            </tbody>
         </table>


         <?php if(empty($VotosS)): ?>
          <h3>No hay votos por Senadores </h3>
          <?php  else: ?>
         <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Puesto</th>
              <th>Candidato</th>
              <th>Cantidad de Votos</th>
              <th>Porcentaje</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($VotosS as $VotacionesS) :?>
            <tr>
              <td><?php echo $VotacionesS->puesto?></td>
              <td><?php echo $service1->NombreC($VotacionesS->candidatoid)->nombre . " " . $service1->NombreC($VotacionesS->candidatoid)->apellido;  ?></td>
              <td><?php echo $VotacionesS->votosc?></td>
              <td><?php echo round((100*($VotacionesS->votosc/$ts))).'%'?></td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>

          </tbody>
          </table>

          <?php if(empty($VotosD)): ?>
          <h3>No hay votos por Diputados </h3>
          <?php  else: ?>
          <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Puesto</th>
              <th>Candidato</th>
              <th>Cantidad de Votos</th>
              <th>Porcentaje</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($VotosD as $VotacionesD) :?>
            <tr>
              <td><?php echo $VotacionesD->puesto?></td>
              <td><?php echo $service1->NombreC($VotacionesD->candidatoid)->nombre . " " . $service1->NombreC($VotacionesD->candidatoid)->apellido;  ?></td>
              <td><?php echo $VotacionesD->votosc?></td>
              <td><?php echo round((100*($VotacionesD->votosc/$td))).'%'?></td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
     
          </tbody>
          </table>

          <?php if(empty($VotosA)): ?>
          <h3>No hay votos por Alcalde </h3>
          <?php  else: ?>
          <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Puesto</th>
              <th>Candidato</th>
              <th>Cantidad de Votos</th>
              <th>Porcentaje</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($VotosA as $VotacionesA) :?>
            <tr>
              <td><?php echo $VotacionesA->puesto?></td>
              <td><?php echo $service1->NombreC($VotacionesA->candidatoid)->nombre . " " . $service1->NombreC($VotacionesA->candidatoid)->apellido;  ?></td>
              <td><?php echo $VotacionesA->votosc?></td>
              <td><?php echo round((100*($VotacionesA->votosc/$ta))).'%'?></td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
          </tbody>
        </table>
        <a href="EleccionesI.php" type="submit" class="btn btn-primary btn-lg btn-block">Volver atras</a>
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
  if(confirm('¿Esta seguro que desea desactivar esta eleccion?')){
    window.location.href="EleccionesDes.php?id="+id;
  }
}

</script>

</body></html>
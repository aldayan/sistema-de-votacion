<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/EleccionesDB.php';
require_once '../service/Elecciones.php';
require_once '../layout/layoutcandi.php';
require_once '../Elecciones/votos.php';
require_once '../user/auth.php';
require_once '../Elecciones/votos.php';


$service1 = new voto("../database");




$service= New EleccionesDB("../database");
$Eleciones= new Elecciones();
$votos = new voto("../database");

$listE=$service->Getlist();


?>
<?php printHeader();?>

<h2>Elecciones</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <?php if(empty($listE)): ?>
          <h2>No hay elecciones registradas </h2>
          <?php  else: ?>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Fecha de Realizacion</th>
              <th>Estado</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($listE as $eleccion) :?>
            <tr>
              <td><?php echo $eleccion->nombre?></td>
              <td><?php echo $eleccion->fecha?></td>
              <?php if($eleccion->estado == 1): ?>
              <td>Activo</td>
              <?php else:?>
              <td>No activo</td>
              <?php endif; ?>
              <td>
                <?php if($votos->VerificarElec2($eleccion->id)==true): ?>
                  <a onclick="preguntar(<?php echo $eleccion->id; ?>)"   class="btn btn-outline-danger">Finalizar</a>
                <?php else: ?>
                  <a href="Resultados.php?id=<?php echo $eleccion->id;?>" class="btn btn-outline-primary">Resultados</a>
                  <?php if($service1->VerificarElec()!=false): ?>
                <div></div>
                <?php else:?>
                  <a href="EleccionesAc.php?id=<?php echo $eleccion->id;?>"  class="btn btn-outline-warning">Activar</a>
                  <?php endif; ?>
                <?php endif; ?>
              <td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
          </tbody>
        </table>
        <a href="EleccionesAdd.php" type="submit" class="btn btn-primary btn-lg btn-block">Agregar eleccion</a>
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
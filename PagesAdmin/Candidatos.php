<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/CandidatoDB.php';
require_once '../service/Candidato.php';
require_once '../layout/layoutcandi.php';
require_once '../user/auth.php';
require_once '../Elecciones/votos.php';


$service1 = new voto("../database");


$service= New CandidatoDB("../database");
$CA= new Candidato();

$listCA=$service->Getlist();



?>

<?php printHeader();?>


     
 
    <?php if(empty($listCA)): ?>
          <h2>No hay candidatos registrados </h2>
          <?php  else: ?>

      <h2>Candidatos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Partido</th>
              <th>Puesto</th>
              <th>Estado</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>

          <?php foreach($listCA as $Puestos) :?>
            <tr>
            <td>
         <?php if($Puestos->foto == "" || $Puestos->foto == null): ?>

         <img  src="<?php echo "../img/default.png" ?>" width="100px" height="100px">

         <?php else: ?>

         <img  src="<?php echo "../img/candidatos/" . $Puestos->foto; ?>" width="100px" height="100px">

          <?php endif; ?>
          </td>
              <td><?php echo $Puestos->nombre?></td>
              <td><?php echo $Puestos->apellido?></td>
              <td><?php echo $Puestos->partido?></td>
              <td><?php echo $Puestos->puesto?></td>
              <?php if($Puestos->estado == 1): ?>
              <td>Activo</td>
              <?php else:?>
                <td>No activo</td>
              <?php endif; ?>
              <td>
              <?php if($service1->VerificarElec()!=false): ?>
                <div></div>
                <?php else:?>
              <a href="CandidatosEdit.php?id=<?php echo $Puestos->id;?>"  class="btn btn-outline-warning">Editar</a>
              <a onclick="preguntar(<?php echo $Puestos->id; ?>)"   class="btn btn-outline-danger">Borrar</a>
                <a href="CandidatosAc.php?id=<?php echo $Puestos->id;?>"  class="btn btn-outline-warning">Activar</a>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach ;?>
            <?php endif ;?>
          </tbody>
        </table>
        <a href="CandidatosAdd.php" type="submit" class="btn btn-primary btn-lg btn-block">Agregar candidato</a>
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
  if(confirm('¿Esta seguro que desea desactivar este candidato?')){
    window.location.href="CandidatosDes.php?id="+id;
  }
}

</script>
</body>
</html>
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
require_once '../Elecciones/votos.php';


$service1 = new voto("../database");
$service = new CiudadanoDB("../database");
$listPE = $service->Getlist();

$list = $listPE;
?>

<?php printHeader(); ?>

<main role="main">

  <h2>Ciudadanos</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
    <?php if (empty($listPE)) : ?>
          <h2>No hay ciudadanos registrados </h2>
        <?php else : ?>
      <thead>
        <tr>
          <th>Documento de identidad</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Estado</th>
          <th>Accion</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($list as $ciudadano) : ?>
            <tr>
              <td><?php echo $ciudadano->cedula ?></td>
              <td><?php echo $ciudadano->nombre ?></td>
              <td><?php echo $ciudadano->apellido ?></td>
              <td><?php echo $ciudadano->email ?></td>
              <?php if($ciudadano->estado == 1): ?>
              <td>Activo</td>
              <?php else:?>
                <td>No activo</td>
              <?php endif; ?>
              <td>
              <?php if($service1->VerificarElec()!=false): ?>
                <div></div>
                <?php else:?>
              <a href="ciudadanoedit.php?id=<?php echo $ciudadano->id;?>"  class="btn btn-outline-warning">Editar</a>
                <a onclick="preguntar(<?php echo $ciudadano->id; ?>)"   class="btn btn-outline-danger">Borrar</a>
                <a href="CiudadanosAc.php?id=<?php echo $ciudadano->id;?>"  class="btn btn-outline-warning">Activar</a>
                </td>    
                <?php endif; ?>
             </tr>
          <?php endforeach; ?>
        <?php endif; ?>

      </tbody>
    </table>
    <a href="ciudadanoadd.php" type="submit" class="btn btn-primary btn-lg btn-block">Agregar ciudadano</a>
  </div>
</main>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="dashboard.js"></script>
<script>
  src = "assets\js\bootstrap.min.js"
</script>
<script class="text/javascript">
function preguntar(id) {
  if(confirm('¿Esta seguro que desea desactivar este ciudadano?')){
    window.location.href="CiudadanosDes.php?id="+id;
  }
}

</script>
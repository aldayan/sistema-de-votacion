<?php 

require_once '../service/ciudadano.php';
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/PEserviceDB.php';
require_once '../user/authadmin.php';


$utilies = new PEserviceDB("../database");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>Sistema de votacion</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/generalLector.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Sistema de votacion</h5>
      <a class="btn btn-outline-primary" href="logout.php">Terminar</a>
    </div>

    <h1 class="h11 text-dark">Bienvenido</h1> 

    <div class="container">
      <div class="card-deck mb-3 text-center">

      <?php if($utilies->VerificarPe("Presidente")==true): ?>
      <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title mar">Presidente</small></h1>
            <a href="../Elecciones/presidente.php" class="btn btn-lg btn-block btn-primary">Votar</a>
          </div>
        </div>
        <?php endif; ?>

        <?php if($utilies->VerificarPe("Senador")==true): ?>
      <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title mar">Senador</small></h1>
            <a href="../Elecciones/senador.php" class="btn btn-lg btn-block btn-primary">Votar</a>
          </div>
        </div>
        <?php endif; ?>
        
        <?php if($utilies->VerificarPe("Alcalde")==true): ?>
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title mar" >Alcalde</small></h1>
            <a href="../Elecciones/alcalde.php" class="btn btn-lg btn-block btn-primary">Votar</a>
          </div>
        </div>
        <?php endif; ?>

        <?php if($utilies->VerificarPe("Diputado")==true): ?>
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h1 class="card-title pricing-card-title mar">Diputado</small></h1>
            <a href="../Elecciones/diputado.php" class="btn btn-lg btn-block btn-primary">Votar</a>
          </div>
        </div>
        <?php endif; ?>
                
      </div>
    </div>
      
  </body>
</html>

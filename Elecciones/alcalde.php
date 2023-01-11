<?php

require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/CandidatoDB.php';
require_once '../service/Candidato.php';
require_once 'votos.php';
require_once '../service/CiudadanoDB.php';
require_once '../user/authadmin.php';

$message = "";
$service= New CandidatoDB("../database");
$service2= New CiudadanoDB("../database");
$utilities = new utilities;
$CA= new Candidato();
$service1= New voto("../database");
$eid = $service1->VerificarElec();

$listCA=$service->Getlist();
$puesto = "Alcalde";

if(isset($_GET['id'])){
  if(isset($_SESSION['ciudadano']) && $_SESSION['ciudadano']!=null){

    $ciudadano = json_decode($_SESSION['ciudadano']);
    $cid = $ciudadano->cedula;

    $veriV = $service2->VerificarVoto($cid,$puesto,$eid);

    if($veriV == false){

  $service1= New voto("../database");
  $eid = $service1->VerificarElec();
  $CID = $_GET['id'];
  $service1->add($CID,$puesto, $cid,$eid);


  header("Location: ../PagesLector/generalLector.php");
  exit();
  
}else{
  $message = "Usted ya a votado en esta categoria";
 }
}
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Sistema de votacion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/presidente.css" rel="stylesheet">
  </head>

  <body>

   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Sistema de votacion</h5>
      <a class="btn btn-outline-primary" href="../PagesLector/generalLector.php">Salir</a>
    </div>


    <main role="main">

    <?php if($message!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message ?>
  </div>
<?php endif; ?>

      <section class="text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Alcalde</h1>
        </div>
      </section>


      <div class="album py-5 bg-light">


        <div class="container">
          <div class="row">

          <div class="col-md-4">
              <div  class="card" style="width: 18rem;">
                <img class="card-img-top" src="../img/default1.png" width="100px" height="200px">
               <div class="card-body">
                  <h5 class="card-text">Ninguno</h5>
                  <div class="nav-scroller py-1 mb-5">
                 </div>
                  <a href="../PagesLector/generalLector.php" class="btn btn-lg btn-block btn-primary">Ninguno</a>
                </div>  
               </div>
              </div>


          <?php foreach($listCA as $Puestos) :?>

            <?php if($utilities->StatusA($Puestos->id,"../database")==true): ?>
            <?php if($utilities->Verificar($Puestos->id,"../database")==true): ?>

            <div class="col-md-4">
              <div  class="card" style="width: 18rem;">

         <?php if($Puestos->foto == "" || $Puestos->foto == null): ?>

         <img class="card-img-top" src="<?php echo "../img/default.png" ?>" width="100px" height="100px">

         <?php else: ?>

         <img class="card-img-top" src="<?php echo "../img/candidatos/" . $Puestos->foto; ?>" width="100px" height="200px">

          <?php endif; ?>
                <div class="card-body">
                  <h5 class="card-text"><?php echo $Puestos->nombre; ?></h5>
                  <p class="card-subtitle mb-2 text-muted"><?php echo $Puestos->apellido; ?></p>
                  <p class="card-text"><?php echo $Puestos->partido; ?><img src="<?php echo "../img/partidos/" . $service->PartidoLogo($Puestos->partido)->logo; ?>" width="30px" height="40px"></p> 
                  <a  href="alcalde.php?id=<?php echo $Puestos->id;?>" class="btn btn-lg btn-block btn-primary">Votar</a>
                </div>
              </div>
            </div>
         <?php else: ?>
       <div></div>
          <?php endif; ?>
          <?php else: ?>
       <div></div>
          <?php endif; ?>
            <?php endforeach; ?> 
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Sistema de votacion &copy; 2017-2020</p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  </body>
</html>

<?php


include  'layout/layout.php';
require_once '../../service/IServiceBase.php';

require_once '../../service/CiudadanoDB.php';
require_once '../../service/CandidatoDB2.php';
require_once '../../database/context.php';
require_once '../../service/ciudadano.php';
require_once '../../FIlehandler/Ifilehandler.php';
require_once '../../FIlehandler/Jsonfhandler.php';
require_once '../../service/utilities.php';
require_once '../../Elecciones/votos.php';

session_start();

$layout = new Layout(false);


$service = new CiudadanoDB("../database");
$service2 = new CandidatoDB2("../database");
$CNDestado=$service2->Validarestado();
$votos = new voto("../database");
$listPE = $service->Getlist();
$message = "";
$message1 = "";
$message2 = "";
$message3 = "";
$message4 = "";
$list = $listPE;

if (isset($_POST['boton'])) {

  $r = $service->valide($_POST['documento']);

  if ($r == null) {

    $message = "Documento de identidad invalido";

  } else {

    $ide = $votos->VerificarElec();
    $ac = $service->Status($_POST['documento']);
    $ve = $service->VerificarVoto2($_POST['documento'],$ide);

    if($ide == false){
      $message3 = "No hay ningun proceso electoral activo en este momento";
    }else{

      if($CNDestado==false){
        $message4 = "Aun no hay candidatos suficientes para poder votar.";
      }else{

        if($ve == true){

          $message2 = "Usted ya voto en estas elecciones";
    
        }else{
    
          if($ac == true){
    
            $_SESSION['ciudadano'] = json_encode($r);
            header("Location: ../generalLector.php");
            exit();
          }else{
            $message1 = "Usted esta inactivado";
          }

      }

      
  
      }

    }
    
  }
  
}


?>

<?php $layout->prinHeader(); ?>

<main role="main">


  <a class="btn btn-outline-primary" href="../../user/login.php">Administrador</a>
  </div>

  <?php if($message!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message ?>
  </div>
<?php endif; ?>


<?php if($message1!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message1 ?>
  </div>
<?php endif; ?>

<?php if($message2!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message2 ?>
  </div>
<?php endif; ?>

<?php if($message3!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message3 ?>
  </div>
<?php endif; ?>

<?php if($message4!=""): ?>
  <div class="alert alert-danger" role="alert">
      <?= $message4 ?>
  </div>
<?php endif; ?>

  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Introducir su documento de indetidad.</h1>
    </div>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-3">


      <form action="indexInicio.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" id="documento" name="documento" required placeholder="ingrese su documento de identidad">
               <div class="nav-scroller py-1 mb-2">
               </div>
          <button type="submit" class="btn btn-primary" name="boton">Entrar</button>
        </div>

      </form>

</main>
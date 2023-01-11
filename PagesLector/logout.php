<?php

require_once '../database/context.php';
require_once '../Filehandler/Jsonfhandler.php';

require_once '../Elecciones/votos.php';
$votos = new voto("../database");

session_start();

$ide = $votos->VerificarElec();
$ciudadano = json_decode($_SESSION['ciudadano']);
$cid = $ciudadano->cedula;
$cnom = $ciudadano->nombre;
$cor = $ciudadano->email;

$idp = $votos->EleccionCiu($cid,"Presidente",$ide);
$ida = $votos->EleccionCiu($cid,"Alcalde",$ide);
$idd = $votos->EleccionCiu($cid,"Diputado",$ide);
$ids = $votos->EleccionCiu($cid,"Senador",$ide);

$nombrep =  $votos->NombreC($idp);
$nombrea =  $votos->NombreC($ida);
$nombred =  $votos->NombreC($idd);
$nombres =  $votos->NombreC($ids);

$subject = "Sistema de votacion";
$messege = "Estimad@ " . $cnom . " sus candidatos elegidos en las elecciones fueron:
Presidente: " . $nombrep->nombre . " " . $nombrep->apellido . 
", Alcalde: " . $nombrea->nombre . " " . $nombrea->apellido . 
", Diputado: " . $nombred->nombre . " " . $nombred->apellido . 
", Senador: " . $nombres->nombre . " " . $nombres->apellido; 
      
 mail($cor,$subject,$messege);

session_destroy();

header("Location: PagesInicial/indexinicio.php");
exit();

?>
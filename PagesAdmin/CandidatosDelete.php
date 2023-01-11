<?php
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/CandidatoDB.php';
require_once '../service/Candidato.php';


$service= New CandidatoDB("../database");

$isContainID=isset($_GET['id']);
$CA = new Candidato();

if($isContainID)
{
    $CAID = $_GET['id'];
    $service->delete($CAID);

}
header("Location:Candidatos.php");
exit();
?>
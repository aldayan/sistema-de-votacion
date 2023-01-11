<?php
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/Partidos.php';
require_once '../service/PartidoDB.php';


$service= New PartidoDB("../database");

$isContainID=isset($_GET['id']);
$CA = new Partidos();

if($isContainID)
{
    $CAID = $_GET['id'];
    $service->delete($CAID);

}
header("Location: Partidos.php");
exit();
?>
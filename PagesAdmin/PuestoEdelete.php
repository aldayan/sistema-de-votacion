<?php
require_once '../service/PuestoElectivo.php';
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/PEserviceDB.php';




$service= New PEserviceDB("../database");

$isContainID=isset($_GET['id']);
$PE = new PuestoElectivo();

if($isContainID)
{
    $PEID = $_GET['id'];
    $service->delete($PEID);

}
header("Location:PuestoE.php");
exit();
?>


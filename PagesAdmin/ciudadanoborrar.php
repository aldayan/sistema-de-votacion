<?php
require_once '../service/IServiceBase.php';
require_once '../FIlehandler/Ifilehandler.php';
require_once '../FIlehandler/Jsonfhandler.php';
require_once '../database/context.php';
require_once '../service/ciudadano.php';
require_once '../service/CiudadanoDB.php';


$service= New CiudadanoDB("../database");

$isContainID=isset($_GET['cedula']);
$CA = new Ciudadano();

if($isContainID)
{
    $CAID = $_GET['cedula'];
    $service->delete($CAID);

}
header("Location:ciudadanoindex.php");
exit();
?>
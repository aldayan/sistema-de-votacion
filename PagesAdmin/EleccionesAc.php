<?php 

     require_once '../service/IServiceBase.php';
     require_once '../FIlehandler/Ifilehandler.php';
     require_once '../FIlehandler/Jsonfhandler.php';
     require_once '../database/context.php';
     require_once '../service/EleccionesDB.php';

        $ID=$_GET['id'];
        $val = 1;

        $context = new context("../database");
        $stmt= $context->db->prepare("update elecciones set Estado=? where Id=?");
        $stmt->bind_param("si",$val,$ID);
        $stmt->execute();
        $stmt->close();

     header("Location:  EleccionesI.php");
     exit(); 

?>
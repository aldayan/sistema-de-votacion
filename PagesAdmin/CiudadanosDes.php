<?php 

     require_once '../service/IServiceBase.php';
     require_once '../FIlehandler/Ifilehandler.php';
     require_once '../FIlehandler/Jsonfhandler.php';
     require_once '../database/context.php';
     require_once '../service/CiudadanoDB.php';

        $ID=$_GET['id'];
        $val = 0;

        $context = new context("../database");
        $stmt= $context->db->prepare("update ciudadanos set estado=? where id=?");
        $stmt->bind_param("si",$val,$ID);
        $stmt->execute();
        $stmt->close();

     header("Location: ciudadanoindex.php");
     exit(); 

?>
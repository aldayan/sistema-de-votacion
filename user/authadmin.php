<?php

session_start();

if(isset($_SESSION['ciudadano'])){

    if(isset($_SESSION['ciudadano']) == null){

        $_SESSION['messageAuth'] = "Debe iniciar sesion";
        header("Location: ../PagesLector/PagesInicial/indexinicio.php");
        exit();

    }

}else{
    $_SESSION['messageAuth'] = "Debe iniciar sesion";
    header("Location: ../PagesLector/PagesInicial/indexinicio.php"); 
    exit();
}

?>
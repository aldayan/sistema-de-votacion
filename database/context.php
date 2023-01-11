<?php


class context{
    public $db;
    private $filehandler;

    function __construct($directory)
    {   
        $this->filehandler = new Jsonfhandler($directory,"configuration");
        $configuration= $this->filehandler->ReadConfiguration();
        $this->db=new mysqli("localhost:8111","root","","finalproject");
        if($this->db->connect_error){
            exit('Fallo la coneccion a la Base de Datos');

    
    }
}

}



?>
<?php

interface IServiceBase{
    public function GetbyId($id);
    public function Getlist();
    public function add($entity);
    public function update($id,$entity);
    public function delete($id);
    public function GetlistSpecific();
    
}


?>
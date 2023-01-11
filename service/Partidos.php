<?php

class Partidos{

public $id;
public $nombre;
public $descripcion;
public $logo;
public $estado;


public function __construct(){

}

public function InitData($id,$nombre,$descripcion,$estado){

    $this->id=$id;
    $this->nombre=$nombre;
    $this->descripcion=$descripcion;
    $this->estado=$estado;



}


}


?>
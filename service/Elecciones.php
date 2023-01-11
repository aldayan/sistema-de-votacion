<?php

class Elecciones{

public $id;
public $nombre;
public $fecha;
public $estado;


public function __construct(){

}

public function InitData($id,$nombre,$fecha,$estado){

    $this->id=$id;
    $this->nombre=$nombre;
    $this->fecha=$fecha;
    $this->estado=$estado;



}


}


?>
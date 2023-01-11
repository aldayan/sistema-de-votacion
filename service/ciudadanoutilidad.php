<?php
$estado=[1=>"Seleccione",2=>"Activo",3=>"Inactivo"];


function getLastElement($list){
    $scountList = count($list);
    $lastElement = $list[$scountList - 1];

    return $lastElement;
}

function getEstado($estadoId){
    return $GLOBALS['estado'] [$estadoId];
}


function searchProperty($list,$property,$value){

    $filter =[];
    foreach($list as $item){
        if($item[$property] == $value){
            array_push($filter,$item);
        }
    }

    return $filter;
}


function getIndexElement($list,$property,$value){

    $index = 0;

    foreach($list as $key => $item){
        if($item[$property] == $value){
        $index = $key;
        }
    }

    return $index;
}
?>
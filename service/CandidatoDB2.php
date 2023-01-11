<?php



class CandidatoDB2 {

    private $context;


    public function __construct($directory){
    
        $this->context= new context($directory);

    }
    

    public function GetPuesto(){
           $puestos=array();
           $stmt=$this->context->db->prepare("Select Id,Nombre from puestoelectivo");
           $stmt->execute();
           $result=$stmt->get_result(); 
    
           if($result->num_rows ===0){
             
           }
           else{
               while($row=$result->fetch_object()){
                   $puesto=new PuestoElectivo();
                   $puesto->id=$row->Id;
                   $puesto->nombre=$row->Nombre;
                   array_push($puestos,$puesto);
               }
           }
           $stmt->close();
            return $puestos;
           
}

public function GetPartido(){
    $puestos=array();
    $stmt=$this->context->db->prepare("Select id,nombre from partidos");
    $stmt->execute();
    $result=$stmt->get_result(); 

    if($result->num_rows ===0){
        return $puestos;
    }
    else{
        while($row=$result->fetch_object()){
            $puesto=new Partidos();
            $puesto->id=$row->id;
            $puesto->nombre=$row->nombre;
            array_push($puestos,$puesto);
        }
    }
    $stmt->close();
     return $puestos;
    
}

public function Validarestado(){
    $stmt=$this->context->db->prepare("Select * from candidatos where estado=1");
    $stmt->execute();
    $result=$stmt->get_result(); 

    if($result->num_rows >1){
        return true;
    }
    else{
            return false;
        }
    }
    


}

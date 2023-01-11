<?php

class EleccionesDB implements IServiceBase{

    private $context;


    public function __construct($directory){
    
        $this->context= new context($directory);

    }
    

    public function Getlist(){
       $elecciones=array();
       $stmt=$this->context->db->prepare("Select * from elecciones");
       $stmt->execute();
       $result=$stmt->get_result(); 

       if($result->num_rows ===0){
           return $elecciones;
       }
       else{
           while($row=$result->fetch_object()){
               $eleccion=new Elecciones();
               $eleccion->id=$row->Id;
               $eleccion->nombre=$row->nombre;
               $eleccion->fecha=$row->Fecha;
               $eleccion->estado=$row->Estado;
               array_push($elecciones,$eleccion);
           }
       }
       $stmt->close();
        return $elecciones;
       
    }

    public function GetbyId($id){

       $eleccion= new Elecciones();
       $stmt=$this->context->db->prepare("Select * from elecciones where Id=?");
       $stmt->bind_param("i",$id);
       $stmt->execute();
       $result=$stmt->get_result(); 
     
 
        if($result->num_rows ===0){
            return null;
        }
        else{
            while($row=$result->fetch_object()){
                $eleccion->id=$row->Id;
                $eleccion->nombre=$row->nombre;
                $eleccion->fecha=$row->Fecha;
                $eleccion->estado=$row->Estado;
            }
        }
        $stmt->close();
         return $eleccion;
    }

    public function add($entity){

        $stmt=$this->context->db->prepare("insert into elecciones (nombre,Fecha,Estado) Values(?,?,?)");
        $stmt->bind_param("ssi",$entity->nombre,$entity->fecha,$entity->estado);
        $stmt->execute();
        $stmt->close();

        
    }

    public function update($id,$entity){

        $stmt=$this->context->db->prepare("update elecciones set nombre=?,Fecha=?,Estado=? where Id=?");
        $stmt->bind_param("ssii",$entity->nombre,$entity->fecha,$entity->estado,$id);
        $stmt->execute();
        $stmt->close();
  

    }

    public function delete($id){

        $stmt=$this->context->db->prepare("update puestoelectivo set Estado=?  where Id=?");
        $stmt->bind_param("ii",$id,$estado);
        $stmt->execute();
        $stmt->close();   


    }
    public function GetlistSpecific(){
        
    }

  
    
   
}

?>
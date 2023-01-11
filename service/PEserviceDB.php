<?php


class PEserviceDB implements IServiceBase{

    private $context;


    public function __construct($directory){
    
        $this->context= new context($directory);

    }
    

    public function Getlist(){
       $LPE=array();
       $stmt=$this->context->db->prepare("Select * from puestoelectivo");
       $stmt->execute();
       $result=$stmt->get_result(); 

       if($result->num_rows ===0){
           return $LPE;
       }
       else{
           while($row=$result->fetch_object()){
               $PE=new PuestoElectivo();
               $PE->id=$row->Id;
               $PE->nombre=$row->Nombre;
               $PE->descripcion=$row->Descripcion;
               $PE->estado=$row->Estado;
               array_push($LPE,$PE);
           }
       }
       $stmt->close();
        return $LPE;
       
    }

    public function GetbyId($id){

       $PE= new PuestoElectivo();
       $stmt=$this->context->db->prepare("Select * from puestoelectivo where Id=?");
       $stmt->bind_param("i",$id);
       $stmt->execute();
       $result=$stmt->get_result(); 
     
 
        if($result->num_rows ===0){
            return null;
        }
        else{
            while($row=$result->fetch_object()){
                $PE->id=$row->Id;
                $PE->nombre=$row->Nombre;
                $PE->descripcion=$row->Descripcion;
                $PE->estado=$row->Estado;
            }
        }
        $stmt->close();
         return $PE;
    }

    public function add($entity){

        $stmt=$this->context->db->prepare("insert into puestoelectivo (Nombre,Descripcion,Estado) Values(?,?,?)");
        $stmt->bind_param("ssi",$entity->nombre,$entity->descripcion,$entity->estado);
        $stmt->execute();
        $stmt->close();

        
    }

    public function update($id,$entity){

        $stmt=$this->context->db->prepare("update puestoelectivo set Nombre=?,Descripcion=?,Estado=? where Id=?");
        $stmt->bind_param("ssii",$entity->nombre,$entity->descripcion,$entity->estado,$id);
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

    public function VerificarPe($nombre){

        $stmt=$this->context->db->prepare("Select * from puestoelectivo where nombre=?");
        $stmt->bind_param("s",$nombre);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re= $result->fetch_object();
        $estado = $re-> Estado;

        if($estado == 1){
            return true;
        }else{
            return false;
        }
  
    }
    
   
}

?>
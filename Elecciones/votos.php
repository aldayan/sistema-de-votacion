<?php




class voto{

    private $context;


    public function __construct($directory){
    
        $this->context= new context($directory);


    }

    public function add($id,$puesto,$cid,$eid){

        $stmt=$this->context->db->prepare("Select * from votos where candidatoid=? and eleccionid=?");
        $stmt->bind_param("ii",$id,$eid);
        $stmt->execute();
        $result=$stmt->get_result(); 
      
  
         if($result->num_rows ===0){

            $votos = 1;
            $stmt2=$this->context->db->prepare("insert into votos (candidatoid,puesto,votos,ciudadanoid,eleccionid) Values(?,?,?,?,?)");
            $stmt2->bind_param("isisi",$id,$puesto,$votos,$cid,$eid);
            $stmt2->execute();
            $stmt2->close();

             
         }
         else{

            $stmt3=$this->context->db->prepare("Select votos from votos where candidatoid=? and eleccionid=?");
            $stmt3->bind_param("ii",$id,$eid);
            $stmt3->execute();
            $result2=$stmt3->get_result();
            $re = $result2->fetch_object();
            $votos = $re->votos + 1;

        $stmt4=$this->context->db->prepare("update votos set votos=?, ciudadanoid=? where candidatoid=? and eleccionid=?");
        $stmt4->bind_param("iiii",$votos,$cid,$id,$eid);
        $stmt4->execute();
        $stmt4->close();


         }


    }

    public function VerificarElec(){

        $estado = 1;
        $stmt=$this->context->db->prepare("Select * from elecciones where estado=?");
            $stmt->bind_param("i",$estado);
            $stmt->execute();
            $result=$stmt->get_result();
            $re = $result->fetch_object();
            
            if($result->num_rows === 0){

                return false;
            }else{
                return $re->Id;
            }

    }

    public function VerificarElec2($id){

        $estado = 1;
        $stmt=$this->context->db->prepare("Select * from elecciones where Id=? and Estado=?");
            $stmt->bind_param("ii",$id,$estado);
            $stmt->execute();
            $result=$stmt->get_result();
            $re = $result->fetch_object();
            
            if($result->num_rows === 0){

                return false;
            }else{
                return true;
            }

    }

    public function EleccionCiu($id,$puesto,$ide){


        $stmt=$this->context->db->prepare("Select * from votos where ciudadanoid=? and puesto=? and eleccionid=?");
        $stmt->bind_param("isi",$id,$puesto,$ide);
        $stmt->execute();
        $result=$stmt->get_result();
        $re = $result->fetch_object();


        return $re->candidatoid;
           
    }


    public function NombreC($id){

        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $re = $result->fetch_object();


        return $re;
           
    }

}

?>
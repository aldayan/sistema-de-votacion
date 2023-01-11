<?php



class VotosBD {

    private $context;


    public function __construct($directory){
    
        $this->context= new context($directory);

    }
    

    public function VotosP($id){
           $votos=array();
           $stmt=$this->context->db->prepare("Select * from votos where eleccionid=? and puesto='Presidente' order by votos DESC");
           $stmt->bind_param("i",$id);
           $stmt->execute();
           $result=$stmt->get_result(); 
    
           if($result->num_rows ===0){
            return $votos;
           }
           else{
               while($row=$result->fetch_object()){
                   $voto=new Votos();
                   $voto->id=$row->id;
                   $voto->candidatoid=$row->candidatoid;
                   $voto->puesto=$row->puesto;
                   $voto->votosc=$row->votos;
                   array_push($votos,$voto);
               }
           }
           $stmt->close();
            return $votos;
           
}
public function VotosS($id){
    $votos=array();
    $stmt=$this->context->db->prepare("Select * from votos where eleccionid=? and puesto='Senador' order by votos DESC");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result(); 

    if($result->num_rows ===0){
     return $votos;
    }
    else{
        while($row=$result->fetch_object()){
            $voto=new Votos();
            $voto->id=$row->id;
            $voto->candidatoid=$row->candidatoid;
            $voto->puesto=$row->puesto;
            $voto->votosc=$row->votos;
            array_push($votos,$voto);
        }
    }
    $stmt->close();
     return $votos;
    
}
public function VotosD($id){
    $votos=array();
    $stmt=$this->context->db->prepare("Select * from votos where eleccionid=? and puesto='Diputado' order by votos DESC");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result(); 

    if($result->num_rows ===0){
     return $votos;
    }
    else{
        while($row=$result->fetch_object()){
            $voto=new Votos();
            $voto->id=$row->id;
            $voto->candidatoid=$row->candidatoid;
            $voto->puesto=$row->puesto;
            $voto->votosc=$row->votos;
            array_push($votos,$voto);
        }
    }
    $stmt->close();
     return $votos;
    
}
public function VotosA($id){
    $votos=array();
    $stmt=$this->context->db->prepare("Select * from votos where eleccionid=? and puesto='Alcalde' order by votos DESC");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result=$stmt->get_result(); 

    if($result->num_rows ===0){
     return $votos;
    }
    else{
        while($row=$result->fetch_object()){
            $voto=new Votos();
            $voto->id=$row->id;
            $voto->candidatoid=$row->candidatoid;
            $voto->puesto=$row->puesto;
            $voto->votosc=$row->votos;
            array_push($votos,$voto);
        }
    }
    $stmt->close();
     return $votos;
    
}

    public function TotalVotosP($id){
    $stmt=$this->context->db->prepare("Select SUM(votos) from votos where puesto='Presidente' and eleccionid=?");
    $stmt->bind_param("i",$id);
     $stmt->execute();
        $result=$stmt->get_result();
        $re = $result->fetch_object();


        return $re;
           
    
    }
    public function TotalVotosS($id){
        $stmt=$this->context->db->prepare("Select SUM(votos) from votos where puesto='Senador' and eleccionid=?");
        $stmt->bind_param("i",$id); 
        $stmt->execute();
            $result=$stmt->get_result();
            $re = $result->fetch_object();
    
    
            return $re;
               
        
        }
        public function TotalVotosD($id){
            $stmt=$this->context->db->prepare("Select SUM(votos) from votos where puesto='Diputado' and eleccionid=?");
            $stmt->bind_param("i",$id); 
            $stmt->execute();
                $result=$stmt->get_result();
                $re = $result->fetch_object();
        
        
                return $re;
                   
            
            }
            public function TotalVotosA($id){
                $stmt=$this->context->db->prepare("Select SUM(votos) from votos where puesto='Alcalde' and eleccionid=?");
                $stmt->bind_param("i",$id); 
                $stmt->execute();
                    $result=$stmt->get_result();
                    $re = $result->fetch_object();
            
            
                    return $re;
                       
                
                }
}


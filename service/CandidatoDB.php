<?php

require_once '../service/utilities.php';

class CandidatoDB implements IServiceBase{

    private $context;
    private $utilities;


    public function __construct($directory){
    
        $this->context= new context($directory);
        $this->utilities = new utilities();

    }
    

    public function Getlist(){
       $LC = array();
       $stmt=$this->context->db->prepare("Select * from candidatos");
       $stmt->execute();
       $result=$stmt->get_result(); 

       if($result->num_rows === 0){
           return $LC;
       }
       else{
           while($row=$result->fetch_object()){
               $CA=new Candidato();
               $CA->id=$row->id;
               $CA->nombre=$row->nombre;
               $CA->apellido=$row->apellido;
               $CA->partido=$row->partido;
               $CA->puesto=$row->puesto;
               $CA->foto=$row->foto;
               $CA->estado=$row->estado;
               array_push($LC,$CA);
           }
       }
       $stmt->close();
        return $LC;
       
    }

    public function PartidoLogo($nombre){

       $stmt=$this->context->db->prepare("Select * from partidos where nombre=?");
       $stmt->bind_param("s",$nombre);
       $stmt->execute();
       $result=$stmt->get_result(); 
       $re = $result->fetch_object();

       return $re;

    }

    public function GetbyId($id){

       $CA= new Candidato();
       $stmt=$this->context->db->prepare("Select * from candidatos where Id=?");
       $stmt->bind_param("i",$id);
       $stmt->execute();
       $result=$stmt->get_result(); 
     
 
        if($result->num_rows ===0){
            return null;
        }
        else{
            while($row=$result->fetch_object()){
               $CA=new Candidato();
               $CA->id=$row->id;
               $CA->nombre=$row->nombre;
               $CA->apellido=$row->apellido;
               $CA->partido=$row->partido;
               $CA->foto=$row->foto;
               $CA->estado=$row->estado;
            }
        }
        $stmt->close();
         return $CA;
    }

    public function add($entity){

        $stmt=$this->context->db->prepare("insert into candidatos (nombre,apellido,partido,puesto,estado) Values(?,?,?,?,?)");
        $stmt->bind_param("ssssi",$entity->nombre,$entity->apellido,$entity->partido,$entity->puesto,$entity->estado);
        $stmt->execute();
        $stmt->close();

        $Id = $this->context->db->insert_id;

        if(isset($_FILES['foto'])){

            $photoFile = $_FILES['foto'];

            if($photoFile['error'] == 4){ 

                $entity->profilePhoto = "";

            }else{

                $typereplace = str_replace("image/","",$_FILES['foto']['type']);
                $type = $photoFile['type'];
                $size = $photoFile['size'];
                $name = $Id . '.' . $typereplace;
                $tmpname =  $photoFile['tmp_name'];
    
                $success = $this->utilities->uploadImage('../img/candidatos/', $name, $tmpname, $type, $size); 
    
                if($success){
    
                    $stmt = $this->context->db->prepare("update candidatos set foto = ? where id = ?");
                    $stmt->bind_param("si",$name,$Id);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
        
    }

    public function update($id,$entity){

        $stmt=$this->context->db->prepare("update candidatos set nombre=?,apellido=?,partido=?,puesto=?,estado=? where Id=?");
        $stmt->bind_param("ssssii",$entity->nombre,$entity->apellido,$entity->partido,$entity->puesto,$entity->estado,$id);
        $stmt->execute();
        $stmt->close();

        $element = $this->GetById($id);

        if(isset($_FILES['foto'])){

            $photoFile = $_FILES['foto'];

            if($photoFile['error'] == 4){

                $entity->profilePhoto = $element->profilePhoto;

            }else{

            $typereplace = str_replace("image/", "",$_FILES['foto']['type']);
            $type = $photoFile['type'];
            $size = $photoFile['size'];
            $name = $id . '.' . $typereplace;
            $tmpname =  $photoFile['tmp_name'];

            $success = $this->utilities->uploadImage('../img/candidatos/',$name,$tmpname,$type,$size); 

            if($success){

                $stmt = $this->context->db->prepare("update candidatos set foto = ? where id = ?");
                $stmt->bind_param("si",$name,$id);
                $stmt->execute();
                $stmt->close();
            }

            }

        }
  

    }

    public function delete($id){

        $stmt=$this->context->db->prepare("delete from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();   


    }
    public function GetlistSpecific(){
        
    }

  
    
   
}


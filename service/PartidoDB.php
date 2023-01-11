<?php

require_once '../service/utilities.php';

class PartidoDB implements IServiceBase{

    private $context;
    private $utilities;


    public function __construct($directory){
    
        $this->context= new context($directory);
        $this->utilities = new utilities();

    }
    

    public function Getlist(){
       $LC = array();
       $stmt=$this->context->db->prepare("Select * from partidos");
       $stmt->execute();
       $result=$stmt->get_result(); 

       if($result->num_rows === 0){
           return $LC;
       }
       else{
           while($row=$result->fetch_object()){
               $CA=new Partidos();
               $CA->id=$row->id;
               $CA->nombre=$row->nombre;
               $CA->descripcion=$row->descripcion;
               $CA->logo=$row->logo;
               $CA->estado=$row->estado;
               array_push($LC,$CA);
           }
       }
       $stmt->close();
        return $LC;
       
    }

    public function GetbyId($id){

       $CA= new Partidos;
       $stmt=$this->context->db->prepare("Select * from partidos where id=?");
       $stmt->bind_param("i",$id);
       $stmt->execute();
       $result=$stmt->get_result(); 
     
 
        if($result->num_rows ===0){
            return null;
        }
        else{
            while($row=$result->fetch_object()){
                $CA=new Partidos();
                $CA->id=$row->id;
                $CA->nombre=$row->nombre;
                $CA->descripcion=$row->descripcion;
                $CA->logo=$row->logo;
                $CA->estado=$row->estado;
            }
        }
        $stmt->close();
         return $CA;
    }

    public function add($entity){

        $stmt=$this->context->db->prepare("insert into partidos (nombre,descripcion,estado) Values(?,?,?)");
        $stmt->bind_param("sss",$entity->nombre,$entity->descripcion,$entity->estado);
        $stmt->execute();
        $stmt->close();

        $Id = $this->context->db->insert_id;

        if(isset($_FILES['logo'])){

            $photoFile = $_FILES['logo'];

            if($photoFile['error'] == 4){ 

                $entity->logo = "";

            }else{

                $typereplace = str_replace("image/","",$_FILES['logo']['type']);
                $type = $photoFile['type'];
                $size = $photoFile['size'];
                $name = $Id . '.' . $typereplace;
                $tmpname =  $photoFile['tmp_name'];
    
                $success = $this->utilities->uploadImage('../img/partidos/', $name, $tmpname, $type, $size); 
    
                if($success){
    
                    $stmt = $this->context->db->prepare("update partidos set logo = ? where id = ?");
                    $stmt->bind_param("si",$name,$Id);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
        
    }

    public function update($id,$entity){

        $stmt=$this->context->db->prepare("update partidos set nombre=?,descripcion=?,estado=? where id=?");
        $stmt->bind_param("sssi",$entity->nombre,$entity->descripcion,$entity->estado,$id);
        $stmt->execute();
        $stmt->close();
        

        $element = $this->GetById($id);

        if(isset($_FILES['logo'])){

            $photoFile = $_FILES['logo'];

            if($photoFile['error'] == 4){

                $entity->logo = $element->logo;

            }else{

            $typereplace = str_replace("image/", "",$_FILES['logo']['type']);
            $type = $photoFile['type'];
            $size = $photoFile['size'];
            $name = $id . '.' . $typereplace;
            $tmpname =  $photoFile['tmp_name'];

            $success = $this->utilities->uploadImage('../img/partidos/',$name,$tmpname,$type,$size); 

            if($success){

                $stmt = $this->context->db->prepare("update partidos set logo = ? where id = ?");
                $stmt->bind_param("si",$name,$id);
                $stmt->execute();
                $stmt->close();
            }

            }

        }
  

    }

    public function delete($id){

        $stmt=$this->context->db->prepare("delete from partidos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();   


    }
    public function GetlistSpecific(){
        
    }

  
    
   
}


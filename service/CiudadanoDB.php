<?php

require_once 'utilities.php';


class CiudadanoDB implements IServiceBase
{

    private $context;



    public function __construct($directory)
    {

        $this->context = new context($directory);
    }




    public function Getlist()
    {
        $LC = array();
        $stmt = $this->context->db->prepare("Select * from ciudadanos");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return $LC;
        } else {
            while ($row = $result->fetch_object()) {
                $CA = new Ciudadano();
                $CA->cedula = $row->cedula;
                $CA->nombre = $row->nombre;
                $CA->apellido = $row->apellido;
                $CA->email = $row->email;
                $CA->estado = $row->estado;
                $CA->id = $row->id;
                array_push($LC, $CA);
            }
        }
        $stmt->close();
        return $LC;
    }

    public function GetbyId($id)
    {

        $r = 0;
        $stmt = $this->context->db->prepare("Select * from ciudadanos where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows === 0) {

            return $r;
        } else {
            while ($row = $result->fetch_object()) {
                $CA = new Ciudadano();
                $CA->cedula = $row->cedula;
                $CA->nombre = $row->nombre;
                $CA->apellido = $row->apellido;
                $CA->email = $row->email;
                $CA->estado = $row->estado;
                $CA->id = $row->id;
            }
            return $CA;
        }
        $stmt->close();
       
    }

    public function Status($documento){
        
        $stmt=$this->context->db->prepare("Select * from ciudadanos where cedula=?");
        $stmt->bind_param("s",$documento);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->estado == 1){
            return true;
        }else{
            return false;
        }

    }

    public function VerificarVoto($id,$puesto,$ide){
        
        $stmt=$this->context->db->prepare("Select * from votos where ciudadanoid=? and puesto=? and eleccionid=?");
        $stmt->bind_param("ssi",$id,$puesto,$ide);
        $stmt->execute();
        $result=$stmt->get_result(); 

        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }

    }

    public function VerificarVoto2($id,$ide){
        
        $stmt=$this->context->db->prepare("Select * from votos where ciudadanoid=? and eleccionid=?");
        $stmt->bind_param("ss",$id,$ide);
        $stmt->execute();
        $result=$stmt->get_result(); 

        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }

    }

    public function valide($id)
    {

        $stmt = $this->context->db->prepare("Select * from ciudadanos where cedula = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows === 0) {

            return null;
        } else {
            $ciudadano = new Ciudadano;

            while($row = $result->fetch_object()){

                $ciudadano->id = $row->id;
                $ciudadano->cedula = $row->cedula;
                $ciudadano->nombre = $row->nombre;
                $ciudadano->apellido = $row->apellido;
                $ciudadano->email = $row->email; 
                $ciudadano->estado = $row->estado; 

            }
            return $ciudadano;
            $stmt->close();
        }
     
       
    }

    public function add($entity)
    {

        $stmt = $this->context->db->prepare("insert into ciudadanos (cedula,nombre,apellido,email,estado,id) Values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssii", $entity->cedula, $entity->nombre, $entity->apellido, $entity->email,$entity->estado,$entity->id);
        $stmt->execute();
        $stmt->close();
    }

    public function update($entity, $id)
    {

        $stmt = $this->context->db->prepare("update ciudadanos set cedula=?,nombre=?,apellido=?, email=?,estado=? where id=?");
        $stmt->bind_param("ssssii", $entity->cedula, $entity->nombre, $entity->apellido, $entity->email, $entity->estado, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id)
    {

        $stmt = $this->context->db->prepare("delete from ciudadanos where cedula=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }


    public function GetlistSpecific()
    {
    }
}

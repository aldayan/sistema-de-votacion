<?php

class UserService{

    private $utilities;
    private $context;
  

    public function __construct($directory){

        $this->context = new context($directory);

    }

    public function Login($email,$contrasena){

        $stmt = $this->context->db->prepare("select * from user where email = ? and contrasena = ?");
        $stmt->bind_param("ss",$email,$contrasena);
        $result = $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 0){
            return null;
        }else{
            $user = new User;

            while($row = $result->fetch_object()){

                $user->id = $row->id;
                $user->email = $row->email;
                $user->contrasena = $row->contrasena;
                $user->nombre = $row->nombre;
                $user->apellido = $row->apellido;
                $user->correo = $row->correo; 

            }

            $stmt->close();
            return $user;
        }
    }

}

?>
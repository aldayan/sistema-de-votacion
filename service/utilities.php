<?php




class utilities{

    private $context;
    

    public function StatusP($id,$directory){
        
        $this->context= new context($directory);
        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->puesto == "Presidente"){
            return true;
        }else{
            return false;
        }

    }

    

    public function StatusA($id,$directory){
        
        $this->context= new context($directory);
        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->puesto == "Alcalde"){
            return true;
        }else{
            return false;
        }

    }

    public function StatusS($id,$directory){
        
        $this->context= new context($directory);
        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->puesto == "Senador"){
            return true;
        }else{
            return false;
        }

    }

    public function StatusD($id,$directory){
        
        $this->context= new context($directory);
        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->puesto == "Diputado"){
            return true;
        }else{
            return false;
        }

    }

    public function Verificar($id,$directory){

        $this->context= new context($directory);
        $stmt=$this->context->db->prepare("Select * from candidatos where id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result(); 
        $re = $result->fetch_object();

        if($re->estado == 1){
            return true;
        }else{
            return false;
        }
  
    }



    public function uploadImage($directory,$name,$tmpFile,$type,$size){

        $isSuccess = false;
    
        if( ($type == "image/gif") 
         || ($type == "image/jpeg") 
         || ($type == "image/jpg") 
         || ($type == "image/JPG") 
         || ($type == "image/pjpeg") && ($size < 1000000) ){
    
            if(!file_exists($directory)){
    
                mkdir($directory,0777,true);
    
                if(!file_exists($directory)){
    
                    $this->uploadFile($directory . $name, $tmpFile);
    
                    $isSuccess = true;
                }
    
            }else{
    
                    $this->uploadFile($directory .$name,$tmpFile);
                    $isSuccess = true;
            }
    
            
    
        }else{
            $isSuccess = false;
        }
    
        return $isSuccess;
    
    }
    
    private function uploadFile($name,$tmpFile){
    
        if(file_exists($name)){
            unlink($name);
            }
    
            move_uploaded_file($tmpFile,$name);
       
    }
    

}

?>
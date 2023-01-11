<?php

    class Ciudadano{

        public $id;
        public $cedula;
        public $nombre;
        public $apellido;
        public $email;
        public $estado;

        public function init($id,$cedula,$nombre,$apellido,$email,$estado){

                $this->id = $id;
                $this->cedula = $cedula;
                $this->nombre = $nombre;
                $this->apellido= $apellido;
                $this->email = $email;
                $this->estado = $estado;
        }


    }

?>
<?php
    class sesion{
       private $id;
       private $password;

        public function __construct($id, $password){
            $this -> id = $id;
            $this -> password = $password;
        }

        public function getId(){
            return $this -> id;
        }

        public function getPassword(){
            return $this -> password;
        }

        public function setId($id){
            $this -> id = $id;
        }

        public function setPassword($password){
            $this -> password = $password;
        }
    }
?>
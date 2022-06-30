<?php
    class cliente{
        private $id;
        private $nombre;
        private $calle;
        private $numeroCasa;
        private $ciudad;
        private $telefono;
        private $email;
        private $tipo;

        public function __construct($id, $nombre, $calle, $numeroCasa, $ciudad, $telefono, $email, $tipo)
        {
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> calle = $calle;
            $this -> numeroCasa = $numeroCasa;
            $this -> ciudad = $ciudad;
            $this -> telefono = $telefono;
            $this -> email = $email;
            $this -> tipo = $tipo;
        }

    // Getters

        public function getId(){
            return $this -> id;
        }

        public function getNombre(){
            return $this -> nombre;
        }

        public function getCalle(){
            return $this -> calle;
        }

        public function getNumeroCasa(){
            return $this -> numeroCasa;
        }

        public function getCiudad(){
            return $this -> ciudad;
        }

        public function getTelefono(){
            return $this -> telefono;
        }

        public function getEmail(){
            return $this -> email;
        }

        public function getTipo(){
            return $this -> tipo;
        }
    
    // Setters

        public function setId($id){
            $this -> id = $id;
        }

        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }

        public function setCalle($calle){
            $this -> calle = $calle;
        }

        public function setNumeroCasa($numeroCasa){
            $this -> numeroCasa = $numeroCasa;
        }

        public function setCiudad($ciudad){
            $this -> ciudad = $ciudad;
        }

        public function setTelefono($telefono){
            $this -> telefono = $telefono;
        }

        public function setEmail($email){
            $this -> email = $email;
        }

        public function setTipo($tipo){
            $this -> tipo = $tipo;
        }
    }
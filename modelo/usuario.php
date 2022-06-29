<?php

    class usuario{
        
        private $id;
        private $nombre;
        private $fechaNacimiento;
        private $tipo;
        private $calle;
        private $numeroCasa;
        private $ciudad;
        private $telefono;
        private $email;

        public function __construct($id, $nombre, $fechaNacimiento, $tipo, $calle, $numeroCasa, $ciudad, $telefono, $email){
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> fechaNacimiento = $fechaNacimiento;
            $this -> tipo = $tipo;
            $this -> calle = $calle;
            $this -> numeroCasa = $numeroCasa;
            $this -> ciudad = $ciudad;
            $this -> telefono = $telefono;
            $this -> email = $email;
        }

    // Getters
        public function getId(){
            return $this -> id;
        }

        public function getNombre(){
            return $this -> nombre;
        }

        public function getFechaNacimiento(){
            return $this -> fechaNacimiento;
        }

        public function getTipo(){
            return $this -> tipo;
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

    // Setters
        public function setId($id){
            $this -> id = $id;
        }

        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }

        public function setFechaNacimiento($nuevaFechaNacimiento){
            $this -> fechaNacimiento = $nuevaFechaNacimiento;
        }

        public function setTipo($tipo){
            $this -> tipo = $tipo;
        }

        public function setCalle($nuevaCalle){
            $this -> calle = $nuevaCalle;
        }

        public function setNumeroCasa($nuevoNumeroCasa){
            $this -> numeroCasa = $nuevoNumeroCasa;
        }

        public function setCiudad($nuevaCiudad){
            $this -> ciudad = $nuevaCiudad;
        }

        public function setTelefono($telefono){
            $this -> telefono = $telefono;
        }

        public function setEmail($email){
            $this -> email = $email;
        }
    }
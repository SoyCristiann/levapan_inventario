<?php
    class producto{
        private $id;
        private $nombre;
        private $tipo;
        private $fechaVencimiento;
        private $lote;
        private $fechaRecibido;
        private $peso;
        private $ubicacion;
        private $cantidad;
        

        //Constructor
        public function __construct($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso, $ubicacion, $cantidad)
        {
            $this -> id = $id;
            $this -> nombre = $nombre;
            $this -> tipo = $tipo;
            $this -> fechaVencimiento = $fechaVencimiento;
            $this -> lote = $lote;
            $this -> fechaRecibido = $fechaRecibido;
            $this -> peso = $peso;
            $this -> ubicacion = $ubicacion;
            $this -> cantidad = $cantidad;
        }

    // Getters

        public function getId(){
            return $this -> id;
        }

        public function getNombre(){
            return $this -> nombre;
        }

        public function getTipo(){
            return $this -> tipo;
        }

    // Getters

        public function setId($nuevoId){
            $this -> id = $nuevoId;
        }

        public function setNombre($nuevoNombre){
            $this -> nombre = $nuevoNombre;
        }

        public function setTipo($nuevoTipo){
            $this -> tipo = $nuevoTipo;
        }
    
        public function getFechaVencimiento(){
            return $this -> fechaVencimiento;
        }

        public function getLote(){
            return $this -> lote;
        }

        public function getFechaRecibido(){
            return $this -> fechaRecibido;
        }

        public function getPeso(){
            return $this -> peso;
        }

        public function getUbicacion(){
            return $this -> ubicacion;
        }

        public function getCantidad(){
            return $this -> cantidad;
        }

    // Setters

        public function setFechaVencimiento($nuevaFechaVencimiento){
            $this -> fechaVencimiento = $nuevaFechaVencimiento;
        }

        public function setLote($nuevoLote){
            $this -> lote = $nuevoLote;
        }

        public function setFechaRecibido($nuevaFechaRecibido){
            $this -> fechaRecibido = $nuevaFechaRecibido;
        }

        public function setPeso($nuevoPeso){
            $this -> peso = $nuevoPeso;
        }

        public function setUbicacion($nuevaUbicacion){
            $this -> ubicacion = $nuevaUbicacion;
        }

        public function setCantidad($nuevaCantidad){
            $this -> cantidad = $nuevaCantidad;
        }
    }

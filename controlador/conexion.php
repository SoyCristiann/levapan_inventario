<?php
    // Conexion a la base de datos
    function conectarse(){
        $conexion = new mysqli ("localhost", "root", "", "levapan_db");
        if($conexion -> connect_errno){
            echo "Problemas en la conexión al servidor".$conexion -> connect_error;
        }
        else{
            return $conexion;
        }
    }
?>
<?php
    class gestionarSesion{

        public function iniciarSesion(sesion $nuevaSesion){
            session_start();
            require_once '../controlador/conexion.php';
            $objConexion = conectarse();

            $id = $nuevaSesion -> getId();
            $password = $nuevaSesion -> getPassword();

            $sql = "SELECT * FROM tbl_usu_logueo WHERE tbl_usuarios_id_usuario = '$id' AND tbl_usu_log_password = '$password'";

            $resultado = $objConexion -> query($sql);
            $existe = $resultado -> num_rows;
            echo $existe;
            if ($existe == 1){
                $usuario = $resultado -> fetch_object();
                $_SESSION['user'] = $usuario -> tbl_usuarios_id_usuario;
                header("location:../vista/inicio.php");
            }
            else{
                header("location:../index.php?x=1");
            }
        }
    }
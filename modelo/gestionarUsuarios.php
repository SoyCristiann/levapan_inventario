<?php
    include_once '../controlador/conexion.php';

    class gestionarUsuarios{

        //Pendiente
        public function registrarUsuarios(){

        }

        public function actualizarUsuarios(usuario $usuario){
            $objConexion = conectarse();

            $id = $usuario -> getId();
            $nombre = $usuario -> getNombre();
            $fechaNacimiento = $usuario -> getFechaNacimiento();
            $telefono = $usuario -> getTelefono();
            $email = $usuario -> getEmail();
            $direccionCalle = $usuario -> getCalle();
            $direccionNumero = $usuario -> getNumeroCasa();
            $ciudad = $usuario -> getCiudad();
            $tipo = $usuario -> getTipo();

            // Variable que guarda la instruccion sql.
            $sqlDatos = "UPDATE tbl_usuarios SET id_usuario = '$id', usu_nombre = '$nombre', usu_fecha_nac = '$fechaNacimiento', usu_ciudad = '$ciudad', usu_calle = '$direccionCalle', usu_numero_casa = '$direccionNumero', usu_id_rol = '$tipo' WHERE id_usuario = '$id'";

            $sqlTel = "UPDATE tbl_usu_telefonos SET tbl_usuarios_id_usuario = '$id', tbl_telefono = '$telefono' WHERE tbl_usuarios_id_usuario = '$id'";

            $sqlEmail = "UPDATE tbl_usu_emails SET tbl_usuarios_id_usuario = '$id', tbl_email = '$email' WHERE tbl_usuarios_id_usuario = '$id'";
            
            $resultadoDatos = $objConexion -> query($sqlDatos);
            $resultadoTel = $objConexion -> query($sqlTel);
            $resultadoEmail = $objConexion -> query($sqlEmail);

            if ($resultadoDatos && $resultadoTel && $resultadoEmail){
                echo '<script>alert("Los datos se han actualizado correctamente."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>'; 
            }
            else{
                echo '<script>alert("Los datos no se han podido actualizar, por favor intente de nuevo."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>';
            }
        }

        public function eliminarUsuarios($id){
            $objConexion = conectarse();

            $sql = "DELETE FROM tbl_usuarios WHERE id_usuario = '$id'";
            $resultado = $objConexion -> query($sql);

            if($resultado){
                echo '<script>alert("El usuario se ha eliminado con éxito."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>';
            }
            else{
                echo '<script>alert("Error al eliminar el usuario del sistema."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>';
            }
        }
    }
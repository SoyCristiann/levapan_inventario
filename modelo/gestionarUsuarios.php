<?php
    include_once '../controlador/conexion.php';

    class gestionarUsuarios{

        
        public function registrarUsuarios(usuario $usuario){
            $objConexion = conectarse();

            $id = $usuario -> getId();
            $password = $usuario -> getPassword();
            $nombre = $usuario -> getNombre();
            $fecha_nacimiento = $usuario -> getFechaNacimiento();
            $telefono = $usuario -> getTelefono();
            $email = $usuario -> getEmail();
            $dir_calle = $usuario -> getCalle();
            $dir_numero = $usuario -> getNumeroCasa();
            $ciudad = $usuario -> getCiudad();
            $tipo = $usuario -> getTipo();


            // Variable que guarda la instruccion sql.
            $sqlDatos="INSERT INTO tbl_usuarios (id_usuario, usu_nombre, usu_fecha_nac, usu_ciudad, usu_calle, usu_numero_casa, usu_id_rol) VALUES ('$id', '$nombre', '$fecha_nacimiento', '$ciudad', '$dir_calle', '$dir_numero', '$tipo')";

            $sqlLogueo = "INSERT INTO tbl_usu_logueo (tbl_usuarios_id_usuario, tbl_usu_log_password) VALUES ('$id', '$password')";

            $sqlTel = "INSERT INTO tbl_usu_telefonos (tbl_usuarios_id_usuario, tbl_telefono) VALUES ('$id', '$telefono')";
            
            $sqlEmail = "INSERT INTO tbl_usu_emails (tbl_usuarios_id_usuario, tbl_email) VALUES ('$id', '$email')";

            $resultadoDatos = $objConexion -> query($sqlDatos);
            $resultadoLogueo = $objConexion -> query($sqlLogueo);
            $resultadoTel = $objConexion -> query($sqlTel);
            $resultadoEmail = $objConexion -> query($sqlEmail);

            

            if($resultadoDatos && $resultadoLogueo && $resultadoTel && $resultadoEmail){
                echo '<script>alert("El usuario se ha registrado con éxito."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>';
            }
            else{
                echo '<script>alert("Error al registrar el usuario en el sistema."); window.location.href="../vista/usuarios/usuarios__consultar.php"</script>';
            }
        }

        public function actualizarUsuarios(usuario $usuario){
            $objConexion = conectarse();

            $id = $usuario -> getId();
            $password = $usuario -> getPassword();
            $nombre = $usuario -> getNombre();
            $fechaNacimiento = $usuario -> getFechaNacimiento();
            $telefono = $usuario -> getTelefono();
            $email = $usuario -> getEmail();
            $dirCalle = $usuario -> getCalle();
            $dirNumero = $usuario -> getNumeroCasa();
            $ciudad = $usuario -> getCiudad();
            $tipo = $usuario -> getTipo();

            // Variable que guarda la instruccion sql.
            $sqlDatos = "UPDATE tbl_usuarios SET id_usuario = '$id', usu_nombre = '$nombre', usu_fecha_nac = '$fechaNacimiento', usu_ciudad = '$ciudad', usu_calle = '$dirCalle', usu_numero_casa = '$dirNumero', usu_id_rol = '$tipo' WHERE id_usuario = '$id'";

            $sqlLogueo = "UPDATE tbl_usu_logueo SET tbl_usuarios_id_usuario = '$id', tbl_usu_log_password = '$password' WHERE tbl_usuarios_id_usuario = '$id'";

            $sqlTel = "UPDATE tbl_usu_telefonos SET tbl_usuarios_id_usuario = '$id', tbl_telefono = '$telefono' WHERE tbl_usuarios_id_usuario = '$id'";

            $sqlEmail = "UPDATE tbl_usu_emails SET tbl_usuarios_id_usuario = '$id', tbl_email = '$email' WHERE tbl_usuarios_id_usuario = '$id'";
            
            $resultadoDatos = $objConexion -> query($sqlDatos);
            $resultadoLogueo = $objConexion -> query($sqlLogueo);
            $resultadoTel = $objConexion -> query($sqlTel);
            $resultadoEmail = $objConexion -> query($sqlEmail);

            if ($resultadoDatos && $sqlLogueo && $resultadoTel && $resultadoEmail){
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
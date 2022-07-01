<?php
    include_once '../controlador/conexion.php';

    class gestionarClientes{

        
         public function registrarClientes(cliente $cliente){
            $objConexion = conectarse();

            // Definicion de variables que capturan los datos del formulario.
            $id_cliente = $cliente -> getId();
            $nombre_cliente = $cliente -> getNombre();
            $telefono_cliente = $cliente -> getTelefono();
            $email_cliente = $cliente -> getEmail();
            $direccion_calle_cliente = $cliente -> getCalle();
            $direccion_numero_cliente = $cliente -> getNumeroCasa();
            $ciudad_cliente = $cliente -> getCiudad();
            $seleccion_cliente = $cliente -> getTipo();

            // Variable que guarda la instruccion sql.
            $sql = "CALL registrar_cliente('$id_cliente', '$nombre_cliente', '$ciudad_cliente', '$direccion_calle_cliente', '$direccion_numero_cliente', '$seleccion_cliente', '$email_cliente', '$telefono_cliente')";
            
            $resultado = $objConexion -> query($sql);

            if ($resultado){
                echo '<script>alert("Se ha registrado con éxito el nuevo cliente."); window.location.href="../vista/clientes/clientes__consultar.php"</script>';
            }
            else{
                echo '<script>alert("Problemas al registrar el nuevo cliente."); window.location.href="../vista/clientes/clientes__registrar.php"</script>';
            }
         }

         //Pendiente
         public function actualizarclientes(cliente $cliente){
            $objConexion = conectarse();

            // Definicion de variables que capturan los datos del formulario.
            $id_cliente = $cliente -> getId();
            $nombre_cliente = $cliente -> getNombre();
            $telefono_cliente = $cliente -> getTelefono();
            $email_cliente = $cliente -> getEmail();
            $direccion_calle_cliente = $cliente -> getCalle();
            $direccion_numero_cliente = $cliente -> getNumeroCasa();
            $ciudad_cliente = $cliente -> getCiudad();
            $seleccion_cliente = $cliente -> getTipo();

            // Variable que guarda la instruccion sql.
            $sqlDatos = "UPDATE tbl_clientes SET id_cliente = '$id_cliente', cli_nombre = '$nombre_cliente', cli_ciudad = '$ciudad_cliente', cli_calle = '$direccion_calle_cliente', cli_numero = '$direccion_numero_cliente', cli_tipo = '$seleccion_cliente' WHERE id_cliente = '$id_cliente'";

            $sqlTel = "UPDATE tbl_cli_telefonos SET tbl_clientes_id_cliente = '$id_cliente', tbl_telefono = '$telefono_cliente' WHERE tbl_clientes_id_cliente = '$id_cliente'";

            $sqlEmail = "UPDATE tbl_cli_email SET tbl_cliente_id_cliente = '$id_cliente', tbl_email = '$email_cliente' WHERE tbl_cliente_id_cliente = '$id_cliente'";
            
            $resultadoDatos = $objConexion -> query($sqlDatos);
            $resultadoTel = $objConexion -> query($sqlTel);
            $resultadoEmail = $objConexion -> query($sqlEmail);

            if ($resultadoDatos && $resultadoTel && $resultadoEmail){
                echo '<script>alert("Los datos del cliente se han actualizado correctamente."); window.location.href="../vista/clientes/clientes__consultar.php"</script>';
            }
            else{
                echo '<script>alert("Problemas al actualizar datos del cliente."); window.location.href="../vista/clientes/clientes__consultar.php"</script>';
            }
         }

         
         
         public function eliminarClientes($id){
            $objConexion = conectarse();

            $sql = "DELETE FROM tbl_clientes WHERE id_cliente = '$id'";

            $resultado = $objConexion -> query($sql);

            if ($resultado){
                echo '<script>alert("El cliente se ha eliminado de forma correcta del sistema."); window.location.href="../vista/clientes/clientes__consultar.php"</script>';
            }
            else{
                echo '<script>alert("Error al eliminar el registro del cliente."); window.location.href="../vista/clientes/clientes__consultar.php"</script>';
            }
         }
    }
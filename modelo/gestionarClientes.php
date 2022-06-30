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
                echo '<script>alert("Se ha registrado con éxito el nuevo cliente."); window.location.href="../vista/clientes/clientes__registrar.php"</script>';
            }
            else{
                echo '<script>alert("Problemas al registrar el nuevo cliente."); window.location.href="../vista/clientes/clientes__registrar.php"</script>';
            }
         }

         //Pendiente
         public function actualizarclientes(){

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
<?php
    include_once '../controlador/conexion.php';

    class gestionarProductos{

        //Pendiente
        public function registrarProductos(){

        }

        public function actualizarProductos(producto $producto){
            $objConexion = conectarse();

            $id = $producto -> getId();
            $nombre = $producto -> getNombre();
            $tipo = $producto -> getTipo();
            $fechaVencimiento = $producto -> getFechaVencimiento();
            $lote = $producto -> getLote();
            $fechaRecibido = $producto -> getFechaRecibido();
            $peso = $producto -> getPeso();
            $ubicacion = $producto -> getUbicacion();
            $cantidad = $producto -> getCantidad();

            $sqlProducto = "UPDATE tbl_productos SET id_producto = '$id', pro_nombre = '$nombre', tbl_prod_tipo_id_tipo = '$tipo', pro_fecha_venc = '$fechaVencimiento', pro_lote = '$lote', pro_fecha_recb = '$fechaRecibido', pro_peso = '$peso' WHERE id_producto = '$id'";

            $resultadoProducto = $objConexion -> query($sqlProducto);

            $sqlUbicacion = "UPDATE tbl_ubicaciones SET id_ubicacion = '$ubicacion', ubi_cantidad_unidades = '$cantidad', tbl_productos_id_producto = '$id' WHERE tbl_productos_id_producto = '$id'";

            $resultadoUbicacion = $objConexion ->query($sqlUbicacion);

            if ($resultadoProducto && $resultadoUbicacion){
                echo '<script>alert("El producto se ha actualizado de forma exitosa."); window.location.href="../vista/inventario/inventario__consultar.php"</script>'; 
            }
            else{
                echo '<script>alert("Los datos del producto no se han podido actualizar, por favor intente de nuevo."); window.location.href="../vista/inventario/inventario__consultar.php"</script>';
            }
        }

        public function eliminarProductos($id){
            $objConexion = conectarse();
            
            $sql = "DELETE FROM tbl_productos WHERE id_producto = '$id'";
            
            $resultado = $objConexion -> query($sql);

            if ($resultado){
                echo '<script>alert("El producto ha sido eliminado de forma exitosa."); window.location.href="../vista/inventario/inventario__consultar.php"</script>'; 
            }
            else{
                echo '<script>alert("El producto no se ha podido eliminar."); window.location.href="../vista/inventario/inventario__consultar.php"</script>';
            }
        }
        
    }
?>
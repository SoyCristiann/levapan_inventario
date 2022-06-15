<?php
    require 'conexion.php';
    extract($_REQUEST);
    
    $dato_consulta = $_POST['input_buscar'];

    $objConexion = conectarse();

    $sqlConsulta = "SELECT id_producto, pro_nombre, pro_tipo, pro_fecha_venc, pro_lote, pro_fecha_recb, 	pro_peso, id_ubicacion,	ubi_cantidad_unidades FROM tbl_productos INNER JOIN tbl_ubicaciones ON tbl_productos.id_producto = tbl_ubicaciones.tbl_productos_id_producto";

    $resultado = $objConexion -> query($sqlConsulta);

    if($resultado){

    }
?>
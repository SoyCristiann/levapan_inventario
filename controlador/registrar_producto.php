<?php
    require 'conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();

    // Definicion de variables que capturan los datos del formulario.
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $tipo_producto = $_POST['seleccion_producto'];
    $fecha_venc = $_POST['fecha_venc_producto'];
    $lote_producto = $_POST['lote_producto'];
    $fecha_rec = $_POST['fec_recb_producto'];
    $peso = $_POST['peso_producto'];
    $ubicacion = $_POST['ubicacion_producto'];
    $cantidad = $_POST['cantidad_producto_ubicacion'];

    // Variable SQL donde se establece la consulta en BD.
    $sql_producto = "INSERT INTO tbl_productos (id_producto, pro_nombre, tbl_prod_tipo_id_tipo , pro_fecha_venc, pro_lote, pro_fecha_recb, pro_peso) 
    VALUES 
    ('$id_producto', '$nombre_producto', '$tipo_producto', '$fecha_venc', '$lote_producto', '$fecha_rec', '$peso')";

    $sql_ubicacion = "INSERT INTO tbl_ubicaciones (id_ubicacion, ubi_cantidad_unidades, tbl_productos_id_producto)
    VALUES 
    ('$ubicacion_producto', '$cantidad_producto_ubicacion', '$id_producto')";

    $resultado_producto = $objConexion -> query($sql_producto);
    $resultado_ubicacion = $objConexion -> query($sql_ubicacion);

    if($resultado_producto && $resultado_ubicacion){
        echo "El producto se ha agregado exitosamente";
    }
    else{
        echo "Problemas al agregar un nuevo producto";
    }
?>
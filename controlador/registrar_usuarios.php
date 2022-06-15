<?php
    require 'conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();
    
    // Definicion de variables que capturan los datos del formulario.
    $id_usuario = $_POST['id_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $fecha_nac = $_POST['fecha_nac'];
    $tel_usuario = $_POST['tel_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $dir_calle_usuario = $_POST['dir_calle_usuario'];
    $dir_num_usuario = $_POST['dir_num_usuario'];
    $ciudad_usuario = $_POST['ciudad_usuario'];
    $seleccion_usuario = $_POST['seleccion_usuario'];


    // Variable que guarda la instruccion sql.
    $sql = "CALL registrar_usuario('$id_usuario', '$nombre_usuario', '$fecha_nac', '$ciudad_usuario', '$dir_calle_usuario', '$dir_num_usuario', '$seleccion_usuario', '$email_usuario', '$tel_usuario')";

    $resultado = $objConexion -> query($sql);

    if ($resultado){
        echo "Se ha registrado con éxito el nuevo usuario.";
    }
    else{
        echo "Problemas al registrar el nuevo usuario.";
    }

?>
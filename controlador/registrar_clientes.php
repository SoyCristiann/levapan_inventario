<?php
    require 'conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();
    
    // Definicion de variables que capturan los datos del formulario.
    $id_cliente = $_POST['id_cliente'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $direccion_calle_cliente = $_POST['direccion_calle_cliente'];
    $direccion_numero_cliente = $_POST['direccion_numero_cliente'];
    $ciudad_cliente = $_POST['ciudad_cliente'];
    $seleccion_cliente = $_POST['seleccion_cliente'];

    // Variable que guarda la instruccion sql.
    $sql = "CALL registrar_cliente('$id_cliente', '$nombre_cliente', '$ciudad_cliente', '$direccion_calle_cliente', '$direccion_numero_cliente', '$seleccion_cliente', '$email_cliente', '$telefono_cliente')";
    
    $resultado = $objConexion -> query($sql);

    if ($resultado){
        echo "Se ha registrado con éxito el nuevo cliente.";
    }
    else{
        echo "Problemas al registrar el nuevo cliente.";
    }

?>
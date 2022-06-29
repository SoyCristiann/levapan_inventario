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
    $sqlDatos = "UPDATE tbl_usuarios SET id_usuario = '$id_usuario', usu_nombre = '$nombre_usuario', usu_fecha_nac = '$fecha_nac', usu_ciudad = '$ciudad_usuario', usu_calle = '$dir_calle_usuario', usu_numero_casa = '$dir_num_usuario', usu_id_rol = '$seleccion_usuario' WHERE id_usuario = '$id_usuario'";

    $sqlTel = "UPDATE tbl_usu_telefonos SET tbl_usuarios_id_usuario = '$id_usuario', tbl_telefono = '$tel_usuario' WHERE tbl_usuarios_id_usuario = '$id_usuario'";

    $sqlEmail = "UPDATE tbl_usu_emails SET tbl_usuarios_id_usuario = '$id_usuario', tbl_email = '$email_usuario' WHERE tbl_usuarios_id_usuario = '$id_usuario'";
    
    $resultadoDatos = $objConexion -> query($sqlDatos);
    $resultadoTel = $objConexion -> query($sqlTel);
    $resultadoEmail = $objConexion -> query($sqlEmail);

    if ($resultadoDatos && $resultadoTel && $resultadoEmail){
        echo '<script>alert("Los datos se han actualizado correctamente."); window.location.href="../vista/gestionar_usuarios/gestionar_usuarios.php"</script>'; 
    }
    else{
        echo '<script>alert("Los datos no se han podido actualizar, por favor intente de nuevo."); window.location.href="../vista/gestionar_usuarios/gestionar_usuarios.php"</script>';
    }

?>
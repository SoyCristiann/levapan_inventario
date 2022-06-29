<?php
    require 'conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_usuarios WHERE id_usuario = '$id'";

    $resultado = $objConexion -> query($sql);

    if ($resultado){
        echo '<script>alert("El usuario se eliminó con éxito."); window.location.href="../vista/gestionar_usuarios/gestionar_usuarios.php"</script>';
    } else{
        echo '<script>alert("No se ha podido eliminar el registro."); window.location.href="../vista/gestionar_usuarios/gestionar_usuarios.php"</script>';
    }
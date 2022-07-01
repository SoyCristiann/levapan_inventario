<?php
    require_once '../controlador/controlador.php';
    $controlador = new controlador();

    if(isset($_GET["accion"])){
        //Muy importante el orden de recibir los parametros. Deben recibirse en estricto orden declarados en la clase.
        // Productos
        if (($_GET["accion"] == "registrarProducto")){
            $controlador -> registrarProductos($_POST["id_producto"], $_POST['nombre_producto'], $_POST["seleccion_producto"], $_POST["fecha_venc_producto"], $_POST["lote_producto"], $_POST["fec_recb_producto"], $_POST["peso_producto"], $_POST["ubicacion_producto"], $_POST["cantidad_producto_ubicacion"]);
        }

        if (($_GET["accion"] == "actualizarProducto")){
            $controlador -> actualizarProductos($_POST["id_producto"], $_POST["nombre_producto"], $_POST["seleccion_producto"], $_POST["fecha_venc_producto"], $_POST["lote_producto"], $_POST["fec_recb_producto"], $_POST["peso_producto"], $_POST["ubicacion_producto"], $_POST["cantidad_producto_ubicacion"]); 
        }

        if (($_GET["accion"] == "eliminarProducto")){
            $controlador -> eliminarProductos($_GET["idProducto"]);
        }
        // Usuarios
        if (($_GET["accion"] == "registrarUsuario")){
            $controlador -> registrarUsuarios($_POST["id_usuario"], $_POST["nombre_usuario"], $_POST["fecha_nac"], $_POST["seleccion_usuario"], $_POST["dir_calle_usuario"], $_POST["dir_num_usuario"], $_POST["ciudad_usuario"], $_POST["tel_usuario"], $_POST["email_usuario"]);
        }

        if (($_GET["accion"] == "actualizarUsuario")){
            $controlador -> actualizarUsuarios($_POST["id_usuario"], $_POST["nombre_usuario"], $_POST["fecha_nac"], $_POST["seleccion_usuario"], $_POST["dir_calle_usuario"], $_POST["dir_num_usuario"], $_POST["ciudad_usuario"], $_POST["tel_usuario"], $_POST["email_usuario"]);
        }

        if(($_GET["accion"] == "eliminarUsuario")){
            $controlador -> eliminarUsuarios($_GET["idUsuario"]);
        }
        // Clientes
        if(($_GET["accion"] == "registrarCliente")){
            $controlador -> registrarClientes($_POST["id_cliente"], $_POST["nombre_cliente"], $_POST["direccion_calle_cliente"], $_POST["direccion_numero_cliente"], $_POST["ciudad_cliente"], $_POST["telefono_cliente"], $_POST["email_cliente"], $_POST["seleccion_cliente"]);
        }

        if(($_GET["accion"] == "actualizarCliente")){
            $controlador -> actualizarClientes($_POST["id_cliente"], $_POST["nombre_cliente"], $_POST["direccion_calle_cliente"], $_POST["direccion_numero_cliente"], $_POST["ciudad_cliente"], $_POST["telefono_cliente"], $_POST["email_cliente"], $_POST["seleccion_cliente"]);
        }

        if(($_GET["accion"] == "eliminarCliente")){
            $controlador -> eliminarClientes($_GET["idCliente"]);
        }
    }
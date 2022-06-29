<?php
    include '../modelo/producto.php';
    include '../modelo/usuario.php';
    include '../modelo/gestionarProductos.php';
    include '../modelo/gestionarUsuarios.php';

    class controlador {
        
        public function actualizarProductos($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso, $ubicacion, $cantidad){
            $nuevoProducto = new producto($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso, $ubicacion, $cantidad);
            $gestorProducto = new gestionarProductos();
            $gestorProducto -> actualizarProductos($nuevoProducto);
        }

        public function eliminarProductos($id){
            $gestorProducto = new gestionarProductos();
            $gestorProducto -> eliminarProductos($id);
        }

        public function actualizarUsuarios($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero, $ciudad, $telefono, $email){
            $nuevoUsuario = new usuario($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero, $ciudad, $telefono, $email);
            print_r($nuevoUsuario);
            $gestorUsuario = new gestionarUsuarios();
            $gestorUsuario -> actualizarUsuarios($nuevoUsuario);
        }

        public function eliminarUsuarios($id){
            $gestorUsuario = new gestionarUsuarios();
            $gestorUsuario -> eliminarUsuarios($id);
        }
    }
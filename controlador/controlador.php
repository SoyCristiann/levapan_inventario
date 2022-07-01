<?php
    include '../modelo/producto.php';
    include '../modelo/usuario.php';
    include '../modelo/cliente.php';
    include '../modelo/gestionarProductos.php';
    include '../modelo/gestionarUsuarios.php';
    include '../modelo/gestionarClientes.php';

    class controlador {
        //Muy importante el orden de recibir los parametros. Deben recibirse en estricto orden declarados en la clase.

        public function registrarProductos($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso,$ubicacion, $cantidad){
            $nuevoProducto = new producto($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso,$ubicacion, $cantidad);
            $gestorProducto = new gestionarProductos();
            $gestorProducto -> registrarProductos($nuevoProducto);
        }

        public function actualizarProductos($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso, $ubicacion, $cantidad){
            $nuevoProducto = new producto($id, $nombre, $tipo, $fechaVencimiento, $lote, $fechaRecibido, $peso, $ubicacion, $cantidad);
            $gestorProducto = new gestionarProductos();
            $gestorProducto -> actualizarProductos($nuevoProducto);
        }

        public function eliminarProductos($id){
            $gestorProducto = new gestionarProductos();
            $gestorProducto -> eliminarProductos($id);
        }

        public function registrarUsuarios($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero,  $ciudad, $telefono, $email){
            //Los parametros se deben recibir en estricto orden declarado en la clase.
            $nuevoUsuario = new usuario($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero,  $ciudad, $telefono, $email);
            $gestorUsuario = new gestionarUsuarios();
            $gestorUsuario -> registrarUsuarios($nuevoUsuario);
        }

        public function actualizarUsuarios($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero, $ciudad, $telefono, $email){
            $nuevoUsuario = new usuario($id, $nombre, $fechaNacimiento, $tipo, $direccionCalle, $direccionNumero, $ciudad, $telefono, $email);
            $gestorUsuario = new gestionarUsuarios();
            $gestorUsuario -> actualizarUsuarios($nuevoUsuario);
        }

        public function eliminarUsuarios($id){
            $gestorUsuario = new gestionarUsuarios();
            $gestorUsuario -> eliminarUsuarios($id);
        }

        public function registrarClientes($id, $nombre, $calle, $numeroCasa, $ciudad, $telefono, $email, $tipo){
            $nuevoCliente = new cliente($id, $nombre, $calle, $numeroCasa, $ciudad, $telefono, $email, $tipo);
            $gestorCliente = new gestionarClientes();
            $gestorCliente -> registrarClientes($nuevoCliente);
        }

        public function actualizarClientes($id, $nombre, $calle, $numeroCasa, $ciudad, $telefono, $email, $tipo){
            $nuevoCliente = new cliente($id, $nombre, $calle, $numeroCasa, $ciudad, $telefono, $email, $tipo);
            $gestorCliente = new gestionarClientes();
            $gestorCliente -> actualizarClientes($nuevoCliente);;
        }

        public function eliminarClientes($id){
            $gestorCliente = new gestionarClientes();
            $gestorCliente -> eliminarClientes($id);
        }
    }
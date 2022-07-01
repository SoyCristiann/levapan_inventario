<?php

    require '../../controlador/conexion.php';

    $objConexion = conectarse();

    $sqlTipo = 'SELECT id_comercio, com_tipo FROM tbl_comercios';
    $resultadoTipo = $objConexion -> query($sqlTipo);

    $id_cliente = $_GET['id'];

    $sqlCliente = "SELECT * FROM tbl_clientes INNER JOIN tbl_cli_email ON tbl_clientes.id_cliente = tbl_cli_email.tbl_cliente_id_cliente INNER JOIN tbl_cli_telefonos ON tbl_clientes.id_cliente = tbl_cli_telefonos.tbl_clientes_id_cliente INNER JOIN tbl_comercios ON tbl_clientes.cli_tipo = tbl_comercios.id_comercio WHERE id_cliente = '$id_cliente'";
    $resultadoCliente = $objConexion -> query($sqlCliente);

    $cliente = $resultadoCliente -> fetch_object();
?>

<!---------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Actualizar Clientes Levapan</title>
</head>
<body>
    <header class="encabezado">
        <div class="container">
            <h1><a href="../inicio.html"><img class="logo" src="../imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
            <h1 class="titulo_principal">Sistema de gestión de inventario</h1>
        </div>
    </header>

    <main>
        <div class="titulo_secundario">
            <h2>Actualizar Clientes</h2>
        </div>

        <form method="post" action="../../modelo/validador.php?accion=actualizarCliente">
            <div class="nombre_item">
                <label for="id_cliente" class="form_reg_productos">ID del cliente:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="id_cliente" name="id_cliente"  class="lista_busqueda" required placeholder="Número de documento del cliente" readonly value="<?php echo $cliente -> id_cliente?>">
            </div>

            <div class="nombre_item">
                <label for="nombre_cliente" class="form_reg_productos">Nombre:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="nombre_cliente" name="nombre_cliente"  class="lista_busqueda" required placeholder="Nombre del cliente" value="<?php echo $cliente -> cli_nombre?>">
            </div>

            <div class="nombre_item">
                <label for="telefono_cliente" class="form_reg_productos">Teléfono de contacto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="number" id="telefono_cliente" name="telefono_cliente" class="lista_busqueda" required placeholder="XXX-XXXXXXX" value="<?php echo $cliente -> tbl_telefono?>">
            </div>

            <div class="nombre_item">
                <label for="email_cliente" class="form_reg_productos">Correo electrónico:</label>
            </div>
            <div class="ingresar_datos">
                <input type="email" id="email_cliente" name="email_cliente" class="lista_busqueda" required placeholder="correo@correo.com" value="<?php echo $cliente -> tbl_email?>">
            </div>

            <div class="nombre_item">
                <label for="direccion_calle_cliente" class="form_reg_productos">Direccion calle:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_calle_cliente" name="direccion_calle_cliente" class="lista_busqueda" required placeholder="Calle X" value="<?php echo $cliente -> cli_calle?>">
            </div>

            <div class="nombre_item">
                <label for="direccion_numero_cliente" class="form_reg_productos">Número:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_numero_cliente" name="direccion_numero_cliente" class="lista_busqueda" required placeholder="XX - XX" value="<?php echo $cliente -> cli_numero?>">
            </div>

            <div class="nombre_item">
                <label for="ciudad_cliente" class="form_reg_productos">Ciudad:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="ciudad_cliente" name="ciudad_cliente" class="lista_busqueda" required placeholder="Ciudad de ubicación" value="<?php echo $cliente -> cli_ciudad?>">
            </div>

            <div class="nombre_item">
                <label for="tipo_cliente" class="form_reg_productos">Tipo de comercio: </label>
            </div>
            <div class="ingresar_datos">
                <select name="seleccion_cliente" id="tipo_cliente" class="lista_desplegable">
                    <option value="" selected="selected">--Seleccione--</option>
                    <?php
                        while ($seleccion = $resultadoTipo -> fetch_object()){

                    ?>
                    <option value="<?php echo $seleccion -> id_comercio?>"><?php echo $seleccion -> com_tipo?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <input type="submit" value="Actualizar cliente" class="boton_submit">
        </form>

        
    </main>
    
    <footer class="pie_pagina">
        <p class="copyright">&copy Copyright Cristian Navarro</p>
        <p>Análisis y Desarrollo de Sistemas de Información</p>
        <p>Sena</p>
        <p>2022</p>
    </footer>
</body>
</html>
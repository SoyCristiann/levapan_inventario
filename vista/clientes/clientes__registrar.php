<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("location:../../index.php?x=2");
    }
    require '../../controlador/conexion.php';
    $objConexion = conectarse();
    $sql = 'SELECT id_comercio, com_tipo FROM tbl_comercios';
    $resultado = $objConexion -> query($sql);
?>
<!---------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Resgistrar Clientes Levapan</title>
</head>
<body>
    <header class="encabezado">
        <div class="cerrar_sesion">
            <a href="../../modelo/cerrarsesion.php">Cerrar Sesion</a>
        </div>
        <div class="container">
            <h1><a href="../inicio.php"><img class="logo" src="../imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
            <h1 class="titulo_principal">Sistema de gestión de inventario</h1>
        </div>
    </header>

    <main>
        <div class="titulo_secundario">
            <h2>Registrar nuevo cliente</h2>
        </div>

        <form method="post" action="../../modelo/validador.php?accion=registrarCliente">
            <div class="nombre_item">
                <label for="id_cliente" class="form_reg_productos">Igrese el ID del cliente:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="id_cliente" name="id_cliente"  class="lista_busqueda" required placeholder="Número de documento del cliente">
            </div>

            <div class="nombre_item">
                <label for="nombre_cliente" class="form_reg_productos">Nombre:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="nombre_cliente" name="nombre_cliente"  class="lista_busqueda" required placeholder="Nombre del cliente">
            </div>

            <div class="nombre_item">
                <label for="telefono_cliente" class="form_reg_productos">Teléfono de contacto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="number" id="telefono_cliente" name="telefono_cliente" class="lista_busqueda" required placeholder="XXX-XXXXXXX">
            </div>

            <div class="nombre_item">
                <label for="email_cliente" class="form_reg_productos">Correo electrónico:</label>
            </div>
            <div class="ingresar_datos">
                <input type="email" id="email_cliente" name="email_cliente" class="lista_busqueda" required placeholder="correo@correo.com">
            </div>

            <div class="nombre_item">
                <label for="direccion_calle_cliente" class="form_reg_productos">Direccion calle:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_calle_cliente" name="direccion_calle_cliente" class="lista_busqueda" required placeholder="Calle X">
            </div>

            <div class="nombre_item">
                <label for="direccion_numero_cliente" class="form_reg_productos">Número:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_numero_cliente" name="direccion_numero_cliente" class="lista_busqueda" required placeholder="XX - XX">
            </div>

            <div class="nombre_item">
                <label for="ciudad_cliente" class="form_reg_productos">Ciudad:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="ciudad_cliente" name="ciudad_cliente" class="lista_busqueda" required placeholder="Ciudad de ubicación">
            </div>

            <div class="nombre_item">
                <label for="tipo_cliente" class="form_reg_productos">Tipo de comercio: </label>
            </div>
            <div class="ingresar_datos">
                <select name="seleccion_cliente" id="tipo_cliente" class="lista_desplegable">
                    <option value="" selected="selected">--Seleccione--</option>
                    <?php
                        while ($seleccion = $resultado -> fetch_object()){

                    ?>
                    <option value="<?php echo $seleccion -> id_comercio?>"><?php echo $seleccion -> com_tipo?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <input type="submit" value="Registrar cliente" class="boton_submit">
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
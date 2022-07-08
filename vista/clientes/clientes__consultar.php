<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("location:../../index.php?x=2");
    }
    require '../../controlador/conexion.php';
    extract ($_REQUEST);
    $objConexion = conectarse();

    //Se oculta un error de tipo "Notice" debido a que el programa funciona de forma correcta y no hay variables sin declarar.    
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    // Sentencia SQL que consulta el usuario en la base de datos.
    
    $sql= "SELECT id_cliente, cli_nombre, com_tipo, cli_calle, cli_numero, cli_ciudad, tbl_telefono, tbl_email FROM tbl_clientes INNER JOIN tbl_cli_email ON tbl_clientes.id_cliente = tbl_cli_email.tbl_cliente_id_cliente INNER JOIN tbl_cli_telefonos ON tbl_clientes.id_cliente = tbl_cli_telefonos.tbl_clientes_id_cliente INNER JOIN tbl_comercios ON tbl_clientes.cli_tipo = tbl_comercios.id_comercio WHERE id_cliente = '$_REQUEST[dato_buscar]'";
    
    $resultado = $objConexion -> query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Consultar Clientes Levapan</title>
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
            <h2>Consultar o actualizar clientes</h2>
        </div>

        <!--Formulario para consultar clientes-->
        <form class="consultar_cliente" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            
            <div class="nombre_item">
                <label for="buscar_cliente">Ingrese número de identificación del cliente:</label>
            </div>
            
            <div class="ingresar_datos" name="input_buscar">
                <input type="number" id="buscar_cliente" name="dato_buscar" required>
            </div>
            <input type="submit" value="Búscar" class="boton_submit">
        </form>

        <form name="formularioConsultarCliente" method="post" >
        <table class="tablaConsulta">
            <tr>
                <th class="itemTabla">Identificación del cliente</th>
                <th class="itemTabla">Nombre del cliente</th>
                <th class="itemTabla">Tipo de comercio</th>
                <th class="itemTabla">Dirección calle o carrera</th>
                <th class="itemTabla">Dirección número</th>
                <th class="itemTabla">Ciudad</th>
                <th class="itemTabla">Teléfono</th>
                <th class="itemTabla">Email</th>
                <th class="itemTabla">Editar</th>
                <th class="itemTabla">Eliminar</th>

            </tr>

            <?php
            //El resultado de la consulta se mostrará en una tabla creada gracias al siguiente ciclo while.
                while ($clientes = $resultado -> fetch_object()){
            ?>            
                <tr>
                    <td class="itemTabla"><?php echo $clientes -> id_cliente?></td>
                    <td class="itemTabla"><?php echo $clientes -> cli_nombre?></td>
                    <td class="itemTabla"><?php echo $clientes -> com_tipo?></td>
                    <td class="itemTabla"><?php echo $clientes -> cli_calle?></td>
                    <td class="itemTabla"><?php echo $clientes -> cli_numero?></td>
                    <td class="itemTabla"><?php echo $clientes -> cli_ciudad?></td>
                    <td class="itemTabla"><?php echo $clientes -> tbl_telefono?></td>
                    <td class="itemTabla"><?php echo $clientes -> tbl_email?></td>
                    
                    <td class="itemTabla"><a class="boton" href="clientes__actualizar.php?id=<?php echo $clientes -> id_cliente?>">Editar</a></td>
                    <td class="itemTabla"><a class="boton botonEliminar" href="../../modelo/validador.php?idCliente=<?php echo $clientes -> id_cliente?>&accion=eliminarCliente">Eliminar</a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </form>

        
    </main>
    <script src="../../js/confirmacion.js"></script>
    <footer class="pie_pagina">
        <p class="copyright">&copy Copyright Cristian Navarro</p>
        <p>Análisis y Desarrollo de Sistemas de Información</p>
        <p>Sena</p>
        <p>2022</p>
    </footer>
</body>
</html>
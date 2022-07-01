<?php
    require '../../controlador/conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();

    //Se oculta un error de tipo "Notice" debido a que el programa funciona de forma correcta y no hay variables sin declarar.    
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    // Sentencia SQL que consulta el producto en la base de datos.
    $sql= "SELECT id_producto, pro_nombre, tip_nombre, pro_fecha_venc, pro_lote, pro_fecha_recb, pro_peso, id_ubicacion, ubi_cantidad_unidades FROM tbl_productos INNER JOIN tbl_ubicaciones ON tbl_productos.id_producto = tbl_ubicaciones.tbl_productos_id_producto INNER JOIN tbl_prod_tipos ON tbl_productos.tbl_prod_tipo_id_tipo = tbl_prod_tipos.id_tipo WHERE id_producto = '$_REQUEST[dato_buscar]'";

    $resultado = $objConexion -> query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Consultar Productos Levapan</title>
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
            <h2>Consultar inventario</h2>
        </div>

        <form class="consultar_inventario" method="post" name="formularioConsultar" action="<?php echo $_SERVER['PHP_SELF']?>">
            
            <div class="nombre_item">
                <label for="buscar_producto">Ingrese el SKU del producto a buscar:</label>
            </div>
            
            <div class="ingresar_datos" name="input_buscar">
                <input type="number" id="buscar_producto" name="dato_buscar" required>
            </div>
            <input type="submit" value="Búscar" class="boton_submit">
        </form>

        <form name="formularioBuscar" method="post" >
            <table class="tablaConsulta">
                <tr>
                    <th class="itemTabla">SKU</th>
                    <th class="itemTabla">Nombre producto</th>
                    <th class="itemTabla">Tipo</th>
                    <th class="itemTabla">Fecha de vencimiento</th>
                    <th class="itemTabla">Lote</th>
                    <th class="itemTabla">Fecha de recibido</th>
                    <th class="itemTabla">Peso</th>
                    <th class="itemTabla">Ubicacion</th>
                    <th class="itemTabla">Cantidad de unidades</th>
                    <th class="itemTabla">Editar</th>
                    <th class="itemTabla">Eliminar</th>

                </tr>

                <?php
                //El resultado de la consulta se mostrará en una tabla creada gracias al siguiente ciclo while.
                    while ($productos = $resultado -> fetch_object()){
                ?>            
                    <tr>
                        <td class="itemTabla"><?php echo $productos -> id_producto?></td>
                        <td class="itemTabla"><?php echo $productos -> pro_nombre?></td>
                        <td class="itemTabla"><?php echo $productos -> tip_nombre?></td>
                        <td class="itemTabla"><?php echo $productos -> pro_fecha_venc?></td>
                        <td class="itemTabla"><?php echo $productos -> pro_lote?></td>
                        <td class="itemTabla"><?php echo $productos -> pro_fecha_recb?></td>
                        <td class="itemTabla"><?php echo $productos -> pro_peso?> gr</td>
                        <td class="itemTabla"><?php echo $productos -> id_ubicacion?></td>
                        <td class="itemTabla"><?php echo $productos -> ubi_cantidad_unidades?></td>
                        
                        <td class="itemTabla"><a class="boton" href="../productos/productos__actualizar.php?idProducto= <?php echo $productos -> id_producto?>">Editar</a></td>
                        
                        <td class="itemTabla"><a class="boton botonEliminar" href="../../modelo/validador.php?idProducto=<?php echo $productos -> id_producto?>&accion=eliminarProducto">Eliminar</a></td>
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
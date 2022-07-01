<?php
    require '../../controlador/conexion.php';

    $objConexion = conectarse();
    $sqlTipo = "SELECT id_tipo, tip_nombre FROM tbl_prod_tipos";
    $resultadoTipo = $objConexion -> query($sqlTipo);

    $id_producto = $_GET['idProducto'];

    $sql = "SELECT * FROM tbl_productos INNER JOIN tbl_prod_tipos ON tbl_productos.tbl_prod_tipo_id_tipo = tbl_prod_tipos.id_tipo INNER JOIN tbl_ubicaciones ON tbl_productos.id_producto = tbl_ubicaciones.tbl_productos_id_producto WHERE id_producto = '$id_producto'";

    $resultadoProducto = $objConexion -> query($sql);

    $productos = $resultadoProducto -> fetch_object();

?>
<!---------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Actualizar Productos Levapan</title>
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
            <h2>Actualizar productos</h2>
        </div>

        
        <!--Formulario de registro de producto-->
        <form method="post" action="../../modelo/validador.php?accion=actualizarProducto">
            
            <div class="nombre_item">
                <label for="id_producto" class="form_reg_productos">SKU del producto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="id_producto" name="id_producto"  class="lista_busqueda" required readonly value="<?php echo $productos -> id_producto?>">
            </div>

            <div class="nombre_item">
                <label for="nombre_producto" class="form_reg_productos">Nombre del producto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="nombre_producto" name="nombre_producto" class="lista_busqueda" required value="<?php echo $productos -> pro_nombre?>">
            </div>

            <div class="nombre_item">
                <label for="tipo_producto" class="form_reg_productos">Tipo de producto:</label>
            </div>
            <div class="ingresar_datos">
                <select id="seleccion_producto" name="seleccion_producto" class="lista_desplegable" required>
                    <option value="0" selected="selected">- Seleccione -</option>
                    <?php 
                        while ($seleccion = $resultadoTipo -> fetch_object()){
                    ?>
                        <option value="<?php echo $seleccion -> id_tipo?>"><?php echo $seleccion -> tip_nombre?></option>

                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="nombre_item">
                <label for="fec_ven_producto" class="form_reg_productos">Fecha de vencimiento del producto: </label>
            </div>
            <div class="ingresar_datos">
                <input type="date" id="fec_ven_producto" name="fecha_venc_producto" class="lista_busqueda" required value="<?php echo $productos -> pro_fecha_venc?>">
            </div>

            <div class="nombre_item">
                <label for="lote_producto" class="form_reg_productos">Lote del producto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="lote_producto" name="lote_producto" class="lista_busqueda" required placeholder="Número de lote" value="<?php echo $productos -> pro_lote?>">
            </div>

            <div class="nombre_item">
                <label for="fec_recb_producto" class="form_reg_productos">Fecha de recibido del producto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="date" id="fec_recb_producto" name="fec_recb_producto" class="lista_busqueda" required value="<?php echo $productos -> pro_fecha_recb?>">
            </div>

            <div class="nombre_item">
                <label for="peso_producto" class="form_reg_productos">Peso (en gramos) del producto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="number" min="0" id="peso_producto" name="peso_producto" class="lista_busqueda" required value="<?php echo $productos -> pro_peso?>">
            </div>

            <div class="nombre_item">
                <label for="ubicacion_producto" class="form_reg_productos">Ubicación en picking:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="ubicacion_producto" name="ubicacion_producto" class="lista_busqueda" readonly required value="<?php echo $productos -> id_ubicacion?>">
            </div>

            <div class="nombre_item">
                <label for="cantidad_producto_ubicacion" class="form_reg_productos">Cantidad en ubicación:</label>
            </div>
            <div class="ingresar_datos">
                <input type="number" min="0" id="cantidad_producto_ubicacion" name="cantidad_producto_ubicacion" class="lista_busqueda" required placeholder="Cantidad en unidades" value="<?php echo $productos -> ubi_cantidad_unidades?>">
            </div>

            <input type="submit" value="Actualizar producto" class="boton_submit">
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
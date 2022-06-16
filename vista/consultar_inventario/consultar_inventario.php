<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../estilo.css">
    <title>Consultar Inventario Levapan</title>
</head>
<body>
    <header class="encabezado">
        <h1><a href="../../index.html"><img class="logo" src="../imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
        <p>Sistema de gestión de inventario</p>
    </header>

    <main>
        <div class="titulo_secundario">
            <h2>Consultar inventario</h2>
        </div>

        <form class="consultar_inventario" method="post" action="../controlador/consultar_inventario.php">
            <div class="nombre_item">
                <label for="seleccion_producto" class="lista_desplegable">Seleccione un item de búsqueda: </label>
            </div>

            <div class="ingresar_datos">
                <select id="seleccion_producto" name="seleccion_producto" class="lista_desplegable" required>
                    <option value="0" selected="selected">- Seleccione -</option>
                    </select>
            </div>
            
            <div class="nombre_item">
                <label for="buscar_producto">Ingrese el valor a búscar:</label>
            </div>
            
            <div class="ingresar_datos" name="input_buscar">
                <input type="search" id="buscar_producto">
            </div>
            <input type="submit" value="Búscar" class="boton_submit">
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
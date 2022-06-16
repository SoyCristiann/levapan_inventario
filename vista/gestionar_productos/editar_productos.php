<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="../estilo.css">
    <title>Editar Productos Levapan</title>
</head>
<body>
    <header class="encabezado">
        <h1><a href="../../index.html"><img class="logo" src="../imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
        <p>Sistema de gestión de inventario</p>
    </header>

    <main>
        <div class="titulo_secundario">
            <h2>Editar y/o Eliminar Productos</h2>
        </div>

        <form>
            <div class="nombre_item">
                <label for="seleccion_clientes">Seleccione un item de búsqueda:</label>
            </div>
            <div class="ingresar_datos">    
                <select id="seleccion_clientes" name="seleccion_clientes" class="lista_desplegable" required>
                    <option value="" selected="selected">- Seleccione -</option>
                    <option value="id_cliente">Id Cliente</option>
                    <option value="nombre_cliente">Nombre del cliente</option>
                    <option value="direccion_cliente">Dirección del Cliente</option>
                    <option value="ciudad_cliente">Ciudad</option>
                    <option value="tipo_cliente">Tipo de cliente</option>
                </select>
            </div>
            
            <div class="nombre_item">
            <label for="buscar_producto">Ingrese el valor a búscar:</label>
            </div>
            <div class="ingresar_datos">
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
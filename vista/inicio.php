<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("location:../index.php?x=2");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Home Levapan Almacen</title>
</head>
<body>
    <header class="encabezado">
        <div class="cerrar_sesion">
            <a href="../modelo/cerrarSesion.php" class="cerrarSesion">Cerrar Sesion</a>
        </div>
        <div class="container">
            <h1><a href="inicio.php"><img class="logo" src="imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
            <h1 class="titulo_principal">Sistema de gestión de inventario</h1>
        </div>
    </header>

    <main>
        <div class="titulo_secundario">
            <h2>Bienvenido</h2>
        </div>

        <div class="acciones">
            <p>¿Qué quieres hacer?</p>
            <ul class="lista-items">

                <a href="inventario/inventario__consultar.php">
                    <li class="items">
                    <img src="imagenes/iconos/consultar_inventario.svg">
                    <p>Consultar inventario</p>
                </li></a>           

                <a href="clientes/clientes__index.php"><li class="items">
                    <img src="imagenes/iconos/administrar_clientes.svg">
                    <p>Administrar Clientes</p>
                </li></a>

                <a href="productos/productos__index.php">
                    <li class="items">
                        <img src="imagenes/iconos/gestion_productos.png">
                        <p>Gestionar productos</p>
                </li></a>

                <a href="usuarios/usuarios__index.php">
                    <li class="items">
                    <img src="imagenes/iconos/gestion_usuarios.svg">
                    <p>Gestionar usuarios</p>
                </li></a>
               
            </ul>
        </div>
    </main>

    <footer class="pie_pagina">
        <p class="copyright">&copy Copyright Cristian Navarro</p>
        <p>Análisis y Desarrollo de Sistemas de Información</p>
        <p>Sena</p>
        <p>2022</p>
    </footer>
</body>
</html>
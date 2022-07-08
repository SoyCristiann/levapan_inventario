<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("location:../../index.php?x=2");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Gestionar Clientes Levapan</title>
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
            <h2>Administrador de clientes</h2>
        </div>

        <div class="acciones">
            <p>¿Qué quieres hacer?</p>
            <ul class="lista-items">

                <a href="clientes__registrar.php"><li class="items">
                    <img src="../imagenes/iconos/consultar_clientes.svg">
                    <p>Registrar Nuevo Cliente</p>
                </li></a>

                <a href="clientes__consultar.php">
                    <li class="items">
                    <img src="../imagenes/iconos/registrar_clientes.svg">
                    <p>Consultar o actualizar clientes</p>
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
<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $x = $_REQUEST['x'];
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/reset.css">
    <link rel="stylesheet" href="vista/css/estilo.css">
    <title>Login Levapan</title>
</head>
<body>
    <header class="encabezado">
        <div class="container">
            <h1><a href="index.php"><img class="logo" src="vista/imagenes/levapan.png" alt="Logo empresa Levapan"></h1></a>
            <h1 class="titulo_principal">Sistema de gestión de inventario</h1>
        </div>
    </header>

    <main>

        <div class="titulo_secundario">
            <h2>Inicio de Sesión</h2>
        </div>

        <!--Formulario de actualización de usuarios-->

        <form method="post" action="modelo/validador.php?accion=iniciarSesion">

            <div class="nombre_item">
                <label for="id_usuario" class="form_reg_productos">Usuario:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="id_usuario" name="id_usuario"  class="lista_busqueda" required placeholder="Número de documento">
            </div>

            <div class="nombre_item">
                <label for="nombre_usuario" class="form_reg_productos">Contraseña:</label>
            </div>
            <div class="ingresar_datos">
                <input type="password" id="usuario_password" name="usuario_password"  class="lista_busqueda" required placeholder="Contraseña">
            </div>

            <input type="submit" value="Iniciar Sesión" class="boton_submit">
        </form>
        <?php
            switch($x){
                case 1:
                    echo '<script type="text/javascript">alert("El usuario o la constraseña no son correctos.")</script>';
                    break;
                
                case 2:
                    echo '<script>alert("Debe iniciar sesión para acceder al sistema.")</script>';
                    break;

                case 3:
                    echo '<script>alert("Sesión finalizada.")</script>';
                    break;
            }
        ?>
    </main>
    <footer class="pie_pagina">
        <p class="copyright">&copy Copyright Cristian Navarro</p>
        <p>Análisis y Desarrollo de Sistemas de Información</p>
        <p>Sena</p>
        <p>2022</p>
    </footer>
</body>
</html>
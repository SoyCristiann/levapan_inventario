<!--Página que recoge la información del usuario y permite la actualización de sus datos.-->

<?php
    require '../../controlador/conexion.php';

    $objConexion = conectarse();
    $sql = 'SELECT id_rol, rol_tipo FROM tbl_roles';
    $resultado = $objConexion -> query($sql);

    $idUsuario = $_GET['id'];

    $sqlUsuario = "SELECT id_usuario, usu_nombre, usu_fecha_nac, usu_ciudad, usu_calle, usu_numero_casa, tbl_telefono, tbl_email, rol_tipo from tbl_usuarios inner join tbl_usu_telefonos on tbl_usuarios.id_usuario = tbl_usu_telefonos.tbl_usuarios_id_usuario inner join tbl_usu_emails on tbl_usuarios.id_usuario = tbl_usu_emails.tbl_usuarios_id_usuario inner join tbl_roles on tbl_usuarios.usu_id_rol = tbl_roles.id_rol where id_usuario = '$idUsuario'";


    $resultadoUsuario = $objConexion -> query($sqlUsuario);

    $usuario = $resultadoUsuario->fetch_object();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Actualizar Usuarios Levapan</title>
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
            <h2>Actualizar datos del usuario</h2>
        </div>

        <!--Formulario de actualización de usuarios-->

        <form method="post" action="../../modelo/validador.php?accion=actualizarUsuario">

            <div class="nombre_item">
                <label for="id_usuario" class="form_reg_productos">ID del usuario:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="id_usuario" name="id_usuario"  class="lista_busqueda" required placeholder="Número de documento" readonly value="<?php echo $usuario -> id_usuario?>" >
            </div>

            <div class="nombre_item">
                <label for="nombre_usuario" class="form_reg_productos">Nombre y apellido:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="nombre_usuario" name="nombre_usuario"  class="lista_busqueda" required value="<?php echo $usuario -> usu_nombre?>">
            </div>

            <div class="nombre_item">
                <label for="fecha_nacimiento" class="form_reg_productos">Fecha de nacimiento:</label>
            </div>
            <div class="ingresar_datos">
                <input type="date" id="fecha_nacimiento" name="fecha_nac"  class="lista_busqueda" required value="<?php echo $usuario -> usu_fecha_nac?>">
            </div>

            <div class="nombre_item">
                <label for="telefono_usuario" class="form_reg_productos">Teléfono de contacto:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="telefono_usuario" name="tel_usuario" class="lista_busqueda" required placeholder="XXX-XXXXXXX" value="<?php echo $usuario -> tbl_telefono?>">
            </div>

            <div class="nombre_item">
                <label for="email_usuario" class="form_reg_productos">Correo electrónico:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="email_usuario" name="email_usuario" class="lista_busqueda" required placeholder="correo@correo.com" value="<?php echo $usuario -> tbl_email?>">
            </div>

            <div class="nombre_item">
                <label for="direccion_calle_usuario" class="form_reg_productos">Direccion calle:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_calle_usuario" name="dir_calle_usuario" class="lista_busqueda" required placeholder="Calle X" value="<?php echo $usuario -> usu_calle?>">
            </div>

            <div class="nombre_item">
                <label for="direccion_numero_usuario" class="form_reg_productos">Número de casa:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="direccion_numero_usuario" name="dir_num_usuario" class="lista_busqueda" required placeholder="XX - XX" value="<?php echo $usuario -> usu_numero_casa?>">
            </div>

            <div class="nombre_item">
                <label for="ciudad_residencia" class="form_reg_productos">Ciudad de residencia:</label>
            </div>
            <div class="ingresar_datos">
                <input type="text" id="ciudad_residencia" name="ciudad_usuario" class="lista_busqueda" required value="<?php echo $usuario -> usu_ciudad?>">
            </div>

            <div class="nombre_item">
                <label for="tipo_usuario" class="form_reg_productos">Tipo de usuario: </label>
            </div>
            <div class="ingresar_datos">
                <select name="seleccion_usuario" id="tipo_usuario" class="lista_desplegable">
                    <option value="<?php $usuario -> rol_tipo?>" selected="selected">--Seleccione--</option>
                    <?php
                        while ($seleccion = $resultado -> fetch_object()){

                    ?>
                    <option value="<?php echo $seleccion -> id_rol?>"><?php echo $seleccion -> rol_tipo?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <input type="submit" value="Actualizar Usuario" class="boton_submit">

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
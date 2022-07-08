<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header("location:../../index.php?x=2");
    }
    require '../../controlador/conexion.php';
    extract($_REQUEST);
    $objConexion = conectarse();

    //Se oculta un error de tipo "Notice" debido a que el programa funciona de forma correcta y no hay variables sin declarar.    
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    $sql = "SELECT * from tbl_usuarios inner join tbl_usu_telefonos on tbl_usuarios.id_usuario = tbl_usu_telefonos.tbl_usuarios_id_usuario inner join tbl_usu_emails on tbl_usuarios.id_usuario = tbl_usu_emails.tbl_usuarios_id_usuario inner join tbl_roles on tbl_usuarios.usu_id_rol = tbl_roles.id_rol where id_usuario = '$_REQUEST[dato_buscar]'";

    $resultado = $objConexion -> query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Consultar Usuarios Levapan</title>
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
            <h2>Consultar o actualizar usuarios del sistema</h2>
        </div>

        <form class="consultar_usuario" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            
            <div class="nombre_item">
                <label for="buscar_usuario">Ingrese número de identificación del usuario:</label>
            </div>
            
            <div class="ingresar_datos" name="input_buscar">
                <input type="number" id="buscar_usuario" name="dato_buscar" required>
            </div>
            <input type="submit" value="Búscar" class="boton_submit">
        </form>

        <form name="formularioBuscarUsuario" method="post" >
        <table class="tablaConsulta">
            <tr>
                <th class="itemTabla">Identificación del usuario</th>
                <th class="itemTabla">Nombre del usuario</th>
                <th class="itemTabla">Dirección calle o carrera</th>
                <th class="itemTabla">Dirección número</th>
                <th class="itemTabla">Ciudad</th>
                <th class="itemTabla">Teléfono</th>
                <th class="itemTabla">Email</th>
                <th class="itemTabla">Fecha de nacimiento</th>
                <th class="itemTabla">Rol</th>
                <th class="itemTabla">Editar</th>
                <th class="itemTabla">Eliminar</th>

            </tr>

            <?php
            //El resultado de la consulta se mostrará en una tabla creada gracias al siguiente ciclo while.
                while ($usuarios = $resultado -> fetch_object()){
            ?>            
                <tr>
                    <td class="itemTabla"><?php echo $usuarios -> id_usuario?></td>
                    <td class="itemTabla"><?php echo $usuarios -> usu_nombre?></td>
                    <td class="itemTabla"><?php echo $usuarios -> usu_calle?></td>
                    <td class="itemTabla"><?php echo $usuarios -> usu_numero_casa?></td>
                    <td class="itemTabla"><?php echo $usuarios -> usu_ciudad?></td>
                    <td class="itemTabla"><?php echo $usuarios -> tbl_telefono?></td>
                    <td class="itemTabla"><?php echo $usuarios -> tbl_email?></td>
                    <td class="itemTabla"><?php echo $usuarios -> usu_fecha_nac?></td>
                    <td class="itemTabla"><?php echo $usuarios -> rol_tipo?></td>
                    
                    <td class="itemTabla"><a class="boton" href="usuarios__actualizar.php?id=<?php echo $usuarios -> id_usuario?>">Editar</a></td>

                    <td class="itemTabla"><a class="boton botonEliminar" href="../../modelo/validador.php?idUsuario=<?php echo $usuarios -> id_usuario?>&accion=eliminarUsuario">Eliminar</a></td>
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
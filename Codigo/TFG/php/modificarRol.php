<?php
// FUNCIONES COMUNES A TODO EL PROYECTO
include_once 'fun2.php';
session_start();

if (!isset($_SESSION['usuario']))
    header('location: login.php')
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>COV-BI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--FUENTE: Open Sans-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!--ESTILOS PROPIOS DE COMUNIDAD-->       
        <link rel="stylesheet" type="text/css" href="../css/estiloPagina.css">
        <link href="../css/estiloModRol.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        //INCLUIMOS EL HEADER y NAV CON INTERACCIÓN COMÚN A TODA LA PAGINA
        include './header.php';
        ?>
        <main>
            <div id="ventanaPerfil">
                <div id="perfil">
                    <div class="grid">
                        <figure id="logoP"><img src="../img/iconos/user.png" alt="logo"/></figure>
                        <h2 id="usuario"><?php echo $_GET['modRol'];?></h2>
                    </div>
                    <div id="botones">
                        <form action="verUsuarios.php" method="post">
                            <?php
                            $rol= consultaRol($_GET['modRol']);
                            if($rol=='estandar'){                                   
                                echo '<input type="radio" id="rol" sel name="rol" value="estandar" checked> <label for="rol">Estándar</label><br>';
                            }else
                                echo '<input type="radio" id="rol" sel name="rol" value="estandar"> <label for="rol">Estándar</label><br>';
                            if($rol=='medio'){
                                echo '<input type="radio" id="rol" name="rol" value="medio" checked><label for="rol">Medio</label><br>';
                            }else
                                echo '<input type="radio" id="rol" name="rol" value="medio"><label for="rol">Medio</label><br>';                            
                            if($rol=='avanzado'){
                                echo '<input type="radio" id="rol" name="rol" value="avanzado" checked><label for="rol">Avanzado</label><br> ';
                            }else
                                echo '<input type="radio" id="rol" name="rol" value="avanzado"><label for="rol">Avanzado</label><br> ';                                
                            if($rol=='admin'){
                                echo '<input type="radio" id="rol" name="rol" value="admin" checked><label for="rol">Administrador</label><br>';
                            }else
                                echo '<input type="radio" id="rol" name="rol" value="admin"><label for="rol">Administrador</label><br>';                                
                            ?>
                            <div class="boton">
                                <input type='hidden' name='user' value=<?php echo $_GET['modRol'] ?>/>
                                <input type='submit' name='modificar' value='Modificar Rol'/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>      
        </main>
    </body>
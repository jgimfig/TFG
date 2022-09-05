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
        <link href="../css/estiloMenu.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        //INCLUIMOS EL HEADER y NAV CON INTERACCIÓN COMÚN A TODA LA PAGINA
        include './header.php';
        ?>
        <main>
            <div id="ventanaMenu">
                <div id="menu">
                    <?php if (getAdmin()) { ?>                    
                        <div class="boton" id="btn1">
                            <form action="verUsuarios.php" method="GET">
                                <input class='inputLogin' name='verUsuarios' type='submit' value='Ver Usuarios'/>
                            </form>
                        </div>
                        <div class="boton">
                            <form action="casosConfirmados.php" method="GET">
                                <input class='inputLogin' name='verAnalisis' type='submit' value='Ver Análisis'/>
                            </form>
                        </div>
                        <div class="boton" id="btn2">
                            <form action="perfil.php" method="GET">
                                <input class='inputLogin' name='verPerfil' type='submit' value='Perfil Administrador'/>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="boton" id="btn1">
                            <form action="casosConfirmados.php" method="GET">
                                <input class='inputLogin' name='verAnalisis' type='submit' value='Ver Análisis'/>
                            </form>
                        </div>
                        <div class="boton" id="btn2">
                            <form action="perfil.php" method="GET">
                                <input class='inputLogin' name='verPerfil' type='submit' value='Ver Perfil'/>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>      
        </main>
    </body>

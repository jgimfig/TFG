<?php
// FUNCIONES COMUNES A TODO EL PROYECTO
include_once 'fun2.php';
session_start();

if (!isset($_SESSION['usuario']))
    header('location: login.php');
    
if(isset($_POST['eliminar'])){
    eliminarUsuario();    
    header('location: logout.php');
}

if (isset($_POST['guardar'])) {
    $user = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['contrasena'], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    modificarUsuario($user, $_SESSION['dni'], $pass, $mail);
}

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
        <link href="../css/estiloPerfil.css" rel="stylesheet" type="text/css"/>
        <!--FUNCIONES JS-->       
        <script type='text/javascript' src='../js/confirmaciones.js'></script>
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
                        <h2 id="usuario"><?php echo $_SESSION['usuario']; ?></h2>
                    </div>
                    <div id="otros">
                        <h4 id="dni"><?php echo $_SESSION['dni']; ?></h4>
                        <h4 id="email"><?php echo $_SESSION['email']; ?></h4>
                        <h4 id="rol"><?php echo $_SESSION['tipo']; ?></h4>
                    </div>
                    <div id="botones">
                        <form action="modificarUsuario.php" method="post">
                            <div class="boton">
                                <input type='submit' name='modificar' value='Modificar perfil'/>
                            </div>
                        </form>
                        <form action="#" method="post" onsubmit="return eliminarUsuarioConf()">
                            <div class="boton">
                                <input type='submit' name='eliminar' value='Eliminar cuenta'/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>      
        </main>
    </body>

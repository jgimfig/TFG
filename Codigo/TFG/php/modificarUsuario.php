<?php
// FUNCIONES COMUNES A TODO EL PROYECTO
include_once 'fun2.php';
session_start();

if (!isset($_SESSION['usuario']))
    header('location: login.php');
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
        <link href="../css/estiloModificar.css" rel="stylesheet" type="text/css"/>
        <!-- FUNCIONES JS -->
        <?php include 'libreriasJS.php'; ?>
        <script type='text/javascript' src='../js/confirmaciones.js'></script>
    </head>
    <body>
        <?php
//INCLUIMOS EL HEADER y NAV CON INTERACCIÓN COMÚN A TODA LA PAGINA
        include './header.php';
        ?>
        <main>
            <div id="ventanaLogin">
                <form action="perfil.php" method="POST" onsubmit="return comprobarRegistros()">
                    <!--TEXT FIELD DE NOMBRE DE USUARIO-->
                    <div class="inputLogin">
                        <figure><img src="../img/iconos/user.png" alt="icono de contraseña"/></figure>
                        <input id='usuarioTextField' type='text' name='usuario' value=<?php echo $_SESSION['usuario']; ?> placeholder='Usuario'/><br/>
                    </div>
                    <!--TEXT FIELD DE DNI-->
                    <div class="inputLogin">                    
                        <figure><img src="../img/iconos/user.png" alt="icono de usuario"/></figure>                    
                        <input id='dniTextField' disabled="true" type='text' name='dni' value=<?php echo $_SESSION['dni']; ?> placeholder='DNI'/><br/>
                    </div>
                    <!--TEXT FIELD DE CONTRASEÑA-->
                    <div class="inputLogin">                    
                        <figure><img src="../img/iconos/password.png" alt="icono de usuario"/></figure>                    
                        <input id='contrasenaTextField' type='password' name='contrasena' value='' placeholder='Contraseña'/><br/>
                    </div>

                    <!--TEXT FIELD DE EMAIL-->
                    <div class="inputLogin">                    
                        <figure><img src="../img/iconos/correo.png" alt="icono de correo"/></figure>                    
                        <input id='emailTextField' type='text' name='email' value=<?php echo $_SESSION['email']; ?> placeholder='Email'/><br/>
                    </div>

                    <!--BOTON REGISTRAR: submit-->
                    <div class="boton" id="divRegistrar">
                        <input type='submit' name='guardar' value='Guardar Datos'/>
                    </div>
                </form>
            </div>

        </div>
    </main>
</body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <title>COV-BI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--FUENTE: Open Sans-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        
        <!--ESTILOS PROPIOS DE REGISTRO-->
        <link rel="stylesheet" type="text/css" href="../css/estiloRegistro.css"> 
        
        <!--INCLUSIÓN DE LIBRERIAS JS COMUNES A TODO EL PROYECTO-->
        <?php include 'libreriasJS.php'; ?>
        
        <!--FUNCIONES E INTERACCIONES JS ESPECÍFICAS DE LA PAGINA DE USUARIO-->
        <script type='text/javascript' src='../js/comprobacionRegistro.js'></script>
    </head>
    
    <body>
        <!--TARJETA PRINCIPAL: SE INCLUYE LOGOTIPO Y FORMULARIO-->
        <div id='ventanaLogin'>
            <!--LOGOTIPO DE LA MARCA:-->
            <figure><a href="./login.php"><img src="../img/logo.jpg" alt='logo'/></a></figure>
            
            <!-- FORMULARIO DE REGISTRO DE USUARIO -->
            <form action="#" method="POST" onsubmit="return comprobarRegistro()">
                
                <!--TEXT FIELD DE NOMBRE DE USUARIO-->
                <div class="inputLogin">
                    <figure><img src="../img/iconos/user.png" alt="icono de contraseña"/></figure>
                    <input id='usuarioTextField' type='text' name='usuario' value='' placeholder='Usuario'/><br/>
                </div>
                 <!--TEXT FIELD DE DNI-->
                <div class="inputLogin">                    
                    <figure><img src="../img/iconos/user.png" alt="icono de usuario"/></figure>                    
                    <input id='dniTextField' type='text' name='dni' value='' placeholder='DNI'/><br/>
                </div>
                <!--TEXT FIELD DE CONTRASEÑA-->
                <div class="inputLogin">                    
                    <figure><img src="../img/iconos/password.png" alt="icono de usuario"/></figure>                    
                    <input id='contrasenaTextField' type='password' name='contrasena' value='' placeholder='Contraseña'/><br/>
                </div>
                
                <!--TEXT FIELD DE EMAIL-->
                <div class="inputLogin">                    
                    <figure><img src="../img/iconos/correo.png" alt="icono de correo"/></figure>                    
                    <input id='emailTextField' type='text' name='email' value='' placeholder='Email'/><br/>
                </div>
                
                 <!--BOTON REGISTRAR: submit-->
                <div class="boton" id="divRegistrar">
                    <input type='submit' name='registrar' value='Registrar'/>
                </div>
            </form>
        </div>
    </body>
</html>
<!--Validación de registro en el servidor-->
<?php
include_once 'funciones.php'; // Funciones comunes a todo el proyecto

if(isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['email'])){
    
    $usuario = $_POST['usuario'];  // Nombre de usuario escogido
    $passwd = $_POST['contrasena']; // Contraseña
    $email = $_POST['email']; // Email proporcionado
    $dni = $_POST['dni']; // DNI proporcionado
    
    if(strlen($usuario) > 0 && strlen($passwd) > 0 && strlen($email) > 0 && strlen($dni) > 0){
        
        //Saneamiento de valores introducidos
        $us = filter_var($usuario, FILTER_SANITIZE_STRING);
        $pass = filter_var($passwd, FILTER_SANITIZE_STRING);
        $em = filter_var($email, FILTER_SANITIZE_STRING);
        $dn = filter_var($dni, FILTER_SANITIZE_STRING);
        
        if(strlen($us) > 0 && $us !== false && strlen($pass) > 0 && $pass !== false && strlen($em) > 0 && $em !== false && strlen($dn) > 0 && $dn !== false){
            
            //Validación del email
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
            
            if(strlen($em) > 0 && $em !== false){
                
                /*
                 * Si pudo efectuarse el registro, se enviará al usuario 
                 * a la pagina de login
                 */
                $res=registrarUsuario($us, $pass, $em, $dn, 'estandar');
                if($res !== false){ 
                    header('location: login.php'); 
                } else{
                     echo " <script type='text/javascript'>"
                    . "usuarioExiste();"
                    . "</script>";
                }
            }
        }
    }
}
?>
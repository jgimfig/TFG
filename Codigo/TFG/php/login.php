<?php
// INLCUIMOS LAS FUNCIONES PHP COMUNES A TODO EL PROYECTO
include_once 'funciones.php';
?>

<!--Validación de inicio de sesión en el servidor-->
<?php
$error = false;

if (isset($_POST['iniciarSesion'])) {

    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {

        $usuario = $_POST['usuario']; // NOMBRE DE USUARIO
        $passwd = $_POST['contrasena']; // CONTRASEÑA INTRODUCIDA

        if (strlen($usuario) > 0 && strlen($passwd) > 0) {

            //SANEAMOS LAS ENTRADAS RECIBIDAS
            $us = filter_var($usuario, FILTER_SANITIZE_STRING);
            $pass = filter_var($passwd, FILTER_SANITIZE_STRING);
            if (strlen($us) > 0 && strlen($pass) > 0 && $us !== false && $pass !== false) {
                if (comprobarLogin($us, $pass)) { // SI EL LOGIN SE HACE CORRECTAMENTE
                    // ESTABLECEMOS UNA COOKIE QUE RECUERDE EL NOMBRE DE USUARIO
                    /* SI SE MARCA LA OPCIÓN
                    if (isset($_POST['recordar'])) {
                        setcookie('usuario', $us, time() + 86400 * 30);
                    }
                     */
                        header('location: menu_usuario.php');
                } else {
                    $error = true;
                }
            }
        }
    }
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

        <!--ESTILOS PROPIOS DE LOGIN-->
        <link rel="stylesheet" type="text/css" href="../css/estiloLogin.css"> 

        <!--INCLUSIÓN DE LIBRERIAS JS COMUNES A TODO EL PROYECTO-->
        <?php include 'libreriasJS.php'; ?>

        <!--FUNCIONES E INTERACCIONES JS ESPECIFICAS DE LA PAGINA DE USUARIO-->
        <script type='text/javascript' src='../js/comprobacionLogin.js'></script>

    </head>
    <body>

        <!--TARJETA PRINCIPAL: SE INCLUYE LOGOTIPO Y FORMULARIO-->
        <div id='ventanaLogin'>

            <!--LOGOTIPO DE LA MARCA:-->
            <figure><img src="../img/logo.jpg" alt='logo'/></figure>
            <!-- FORMULARIO DE INICIO DE SESION -->
            <form action="../php/login.php" method="POST" onsubmit="return comprobarLogin()">

                <!--TEXT FIELD DE NOMBRE DE USUARIO-->
                <div class="inputLogin">
                    <figure><img src="../img/iconos/user.png" alt="icono de contraseña"/></figure>
                    <input id='usuarioTextField' type='text' name='usuario' value='<?php $_COOKIE["usuario"] ?>' placeholder='Usuario'/><br/>

                </div>

                <!--TEXT FIELD DE PASSWORD-->
                <div class="inputLogin">
                    <figure><img src="../img/iconos/password.png" alt="icono de usuario"/></figure>
                    <input id='contrasenaTextField' type='password' name='contrasena' value='' placeholder='Contraseña'/><br/>
                </div>

                <!--CHECKBOX: Recordar usuario
                <div id="inputRecuerdame">
                    <input type='checkbox' name='recordar' value=''/>Recuérdame<br/>
                </div>
                -->

                <!--BOTON INICIAR SESIÓN: submit-->
                <div class="boton" id="divIniciarSesion">
                    <input type='submit' name='iniciarSesion' value='Iniciar sesión'/>
                </div>
            </form>

            <!--BOTON REGISTRAR: submit-->
            <form action="registro.php" method="post">
                <div class="boton">
                    <input type='submit' name='registrar' value='Registrar'/>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
if ($error) {
    echo " <script type='text/javascript'>"
    . "loginIncorrecto();"
    . "</script>";
}
?>
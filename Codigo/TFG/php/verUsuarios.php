<?php
// FUNCIONES COMUNES A TODO EL PROYECTO
include_once 'fun2.php';
session_start();

if (!isset($_SESSION['usuario']))
    header('location: login.php');
elseif ($_SESSION['tipo'] != 'admin') {
    header('location: menu_usuario.php');
}

if (isset($_POST['modificar'])) {
    $user=substr($_POST['user'],0, strlen($_POST['user'])-1);
    modificarRol($_POST['rol'], $user);
}

function muestraUsuarios() {
    $consulta = ("select * from usuarios");
    $usuarios = consultaUsers($consulta);

    for ($i = 0; $i < count($usuarios); $i++) {
        echo "<tr>"
        . "<td>" . $usuarios[$i]['usuario'] . "</td>"
        . "<td>" . $usuarios[$i]['dni'] . "</td>"
        . "<td>" . $usuarios[$i]['email'] . "</td>"
        . "<td>" . $usuarios[$i]['tipo'] . "</td>"
        ?>
        <form action='modificarRol.php' method='GET' >
            <?php
            echo "<input name='modRol' type='hidden' value=" . $usuarios[$i]['usuario'] . ">";
            echo "<td><input class='boton' name='modificarRol' type='submit' value='Modificar Rol'/></td>";
            ?></form>
        <form action = '#' method = 'GET' >
            <?php
            echo "<input name='eliminar' type='hidden' value=" . $usuarios[$i]['usuario'] . ">";
            echo "<td><input class='boton' name='eliminarBtn' type='submit' value='Eliminar'/></td>";
            ?></form><?php
        echo "</tr>";
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!--ESTILOS PROPIOS-->
        <link rel="stylesheet" type="text/css" href="../css/estiloPagina.css">
        <link href="../css/estiloVerUsuarios.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        //INCLUIMOS EL HEADER y NAV CON INTERACCIÓN COMÚN A TODA LA PAGINA
        include './header.php';
        ?>
        <div id='linea'>
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <?php muestraUsuarios() ?>
                </tr>
            </table>
        </div>
        <?php
        //INCLUIMOS EL FOOTER
        include './footer.php';
        ?>
    </body>
</html>
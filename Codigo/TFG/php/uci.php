<?php
// FUNCIONES COMUNES A TODO EL PROYECTO
include_once 'funciones.php';
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
        <!--ESTILOS PROPIOS-->
        <link rel="stylesheet" type="text/css" href="../css/estiloPagina.css">
        <link href="../css/estiloPPrincipal.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        //INCLUIMOS EL HEADER y NAV CON INTERACCIÓN COMÚN A TODA LA PAGINA
        include './header.php';
        ?>
        <div class="grid">
            <div class="btnCasos" id="divCasos">
                <button class="tablink" id="btnCaso" onclick="location.href = './casosConfirmados.php';">Casos confirmados</button>
            </div>
            <div class="btnDefunciones" id="divDefunciones">
                <button class="tablink" id="btnDefuncion" onclick="location.href = './defunciones.php';">Defunciones</button>
            </div>
            <div class="btnUci" id="divUci">
                <button class="tablink" id="btnUC" style="background-color: orange;" onclick="location.href = './uci.php';">UCI</button>
            </div>
            <div class="btnVacunaciones" id="divVacunaciones">
                <button class="tablink" id="btnVacunacion" onclick="location.href = './vacunacion.php';">Vacunación</button>
            </div>            
            <div class="btnHospitalizaciones" id="divHospitalizaciones">
                <button class="tablink" id="btnHospitalizacion" onclick="location.href = './hospitalizaciones.php';">Hospitalizaciones</button>
            </div>
            <div class="btnIAs" id="divIAs">
                <button class="tablink" id="btnIA" onclick="location.href = './IA.php';">Incidencia Acumulada</button>
            </div>     
        </div>
        <iframe title="UCI - UCI Provinc" width="1900" height="1060" src="https://app.powerbi.com/view?r=eyJrIjoiYTQ4MDUyYzQtY2MyYi00ODAxLTk2ZmMtMTEyOWZjZDk2YjNiIiwidCI6ImY3ZGY1NjA1LWE4OGItNDRkMy05NDFkLWIzMGQ3MjE3M2JjNCIsImMiOjh9" frameborder="0" allowFullScreen="true"></iframe>
        <?php
        //INCLUIMOS EL FOOTER
        include './footer.php';
        ?>
    </body>
</html>
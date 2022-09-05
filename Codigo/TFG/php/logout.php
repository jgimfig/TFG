<?php

/*
    ESTE FICHERO CIERRA LA SESIÓN ACTIVA SI LA HUBIESE Y ENVÍA AL USUARIO DE VUELTA
    A LA VENTANA DE LOGIN
  
*/

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

session_destroy();

header('location: login.php');
?>
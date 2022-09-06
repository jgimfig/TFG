<?php

include_once './funciones.php';

function getNombreUsuario() {

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (comprobarLogin()) {
        return $_SESSION['usuario'];
    }

    return "";
}

function getAdmin() {

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (comprobarLogin()) {
        if ($_SESSION['tipo'] == "admin")
            return true;
        else
            return false;
    }
    return false;
}

function consultaUsers($consulta) {

    $con = OpenConnection();
    if ($con) {
        $resultadoConsulta = sqlsrv_query($con, $consulta);
        if ($resultadoConsulta == false) {
            return false;
        }
        $i = 0;
        while ($res = sqlsrv_fetch_array($resultadoConsulta)) {
            $array[$i]['usuario'] = $res['usuario'];
            $array[$i]['dni'] = $res['dni'];
            $array[$i]['email'] = $res['email'];
            $array[$i]['tipo'] = $res['tipo'];
            $i++;
        }
        sqlsrv_close($con);
        return $array;
    }

    return false;
}

function consultaRol($usuario) {
    $consulta = "select * from usuarios where usuario='$usuario'";
    $result = consulta($consulta);
    return $result['tipo'];
}

function modificarRol($rol, $usuario) {
    $consulta = "UPDATE usuarios SET tipo='$rol' WHERE usuario='$usuario'";
    $result = consulta($consulta);
    return $result;
}

function eliminarUsuario() {
    $usuario = $_SESSION['usuario'];
    $consulta = "DELETE FROM usuarios WHERE usuario='$usuario'";
    $result = consulta($consulta);
    return $result;
}

function eliminarUsuario2($usuario) {
    $consulta = "DELETE FROM usuarios WHERE usuario='$usuario'";
    $result = consulta($consulta);
    return $result;
}

function modificarUsuario($user, $dni, $pass, $mail) {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $consulta = "UPDATE usuarios SET usuario='$user', email='$mail', hash='$hash' WHERE dni='$dni'";
    $result = consulta($consulta);
     $_SESSION['usuario']=$user;
     $_SESSION['email']=$mail;
    return $result;
}

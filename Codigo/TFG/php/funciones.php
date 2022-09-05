<?php

//CONSTANTES PARA LA CONEXIÓN CON LA BASE DE DATOS
define("HOST", "tfg-upo.database.windows.net");
define("USUARIO_BD", "sejavichan");
define("CONTRASENA_BD", "qpzm_WOXN");
define("NOMBRE_BD", "Covid");

/*
 * FUNCIÓN: consulta()
 *   - Recibe un string con una sentencia SQL
 *   - Ejecuta la sentencia sobre la base de datos
 *   - Devuelve un array con los resultados o booleano según el tipo de clausula urilizada
 */

function OpenConnection() {
    $serverName = HOST;
    $connectionOptions = array("Database" => NOMBRE_BD,
        "Uid" => USUARIO_BD, "PWD" => CONTRASENA_BD);
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn == false)
        return false;
    return $conn;
}

function consulta($consulta) {

    $con = OpenConnection();
    if ($con) {
        $resultadoConsulta = sqlsrv_query($con, $consulta);
        if ($resultadoConsulta == false) {
            return false;
        }
        
        $res = sqlsrv_fetch_array($resultadoConsulta);
        sqlsrv_close($con);
        return $res;
    }
    
    return false;
}

function comprobarLogin($usuario = "", $passwd = "") {

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
        return true;
    }

    $sql = "SELECT * FROM [dbo].[usuarios] WHERE usuario='$usuario'";
    $resul = consulta($sql);
    if ($resul && count($resul) > 0) {
        $pass = password_verify($passwd, $resul['hash']);
        
        if ($pass) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['email'] = $resul['email'];
            $_SESSION['dni'] = $resul['dni'];
            $_SESSION['tipo'] = $resul['tipo'];            
            return true;
        }
    }
    return false;
}

/*
  function consulta($consulta) {

  $con = mysqli_connect(HOST, USUARIO_BD, CONTRASENA_BD, NOMBRE_BD);

  if ($con) {
  mysqli_set_charset($con, 'utf8');
  $resultadoConsulta = mysqli_query($con, $consulta);

  if ($resultadoConsulta === true) {
  mysqli_close($con);
  return true;
  }

  if ($resultadoConsulta) {
  $res = mysqli_fetch_all($resultadoConsulta);
  mysqli_close($con);
  return $res;
  }
  mysqli_close($con);
  }
  return false;
  }
 */

function registrarUsuario($usuario, $passwd, $email, $dni, $tipo) {
    $hash = password_hash($passwd, PASSWORD_DEFAULT);
    $existeDNI = "select count(1) from [dbo].[usuarios] where dni='$dni'";
    $existeUser = "select count(1) from [dbo].[usuarios] where usuario='$usuario'";
    $res1 = consulta($existeDNI);
    $res2 = consulta($existeUser);
    if ($res1[0] > 0 or $res2[0] > 0)
        return false;
    else {
        $sql = "INSERT INTO [dbo].[usuarios](usuario, email, dni, hash, tipo) VALUES ('$usuario','$email','$dni','$hash','$tipo')";
        $res2 = consulta($sql);
        return true;
    }

    /*
     * FUNCIÓN: comprobarLogin()
     *   - Recibe dos strings opcionales, usuario y contraseña
     *   - Realiza la consulta pertinente a la base datos para iniciar la sesión 
     *     del usuario. Si no se especifica algún parametro, se intentará usar 
     *     los datos de la sesión activa, si la hubiera.
     *   - Devuelve un booleano que indica si el usuario ha podido iniciado sesión
     */

    function getNombreUsuario() {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (comprobarLogin()) {
            return $_SESSION['usuario'];
        }

        return "";
    }

    function getAdministrador() {

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

    
    function verificaPass($pass) {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $sql = "SELECT * FROM usuarios WHERE usuario='" . $_SESSION['usuario'] . "'";
        $resul = consulta($sql);
        if ($resul && count($resul) > 0) {
            $passw = password_verify($pass, $resul[0][2]);
            if ($passw)
                return true;
            else
                return false;
        }
    }

}

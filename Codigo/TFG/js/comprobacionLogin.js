/*
 * 
 * ESTE SCRIPT JS VALIDARÁ LOCALMENTE LAS ENTRADAS DEL FORMULARIO DE LOGIN
 * ANTES DE SER ENVIADAS AL SERVIDOR 
 */

function comprobarLogin() {
    
    var validarUsuario = new RegExp('^[a-z0-9_-]{3,16}$', 'gi');

    if (!validarUsuario.test($("#usuarioTextField").val())) {
        alert('Usuario incorrecto');
        $("#usuarioTextField").css({"border-color": "red"});
        return false;
    }else{
        $("#usuarioTextField").css({"border-color": "black"});
    }

    if ($("#contrasenaTextField").val().length <= 0) {
        alert('Contraseña incorrecta');
        $("#contrasenaTextField").css({"border-color": "red"});
        return false;
    }else{
        $("#contrasenaTextField").css({"border-color": "black"});
    }
    return true;
}

function loginIncorrecto(){
     alert('Las credenciales no coinciden');
}
function eliminarUsuarioConf() {
    iconf = confirm("¿Desea eliminar el usuario?");
    if(iconf){
        return true;
    }else
        return false;
    
}

function comprobarRegistros() {
    var validarUsuario = new RegExp('^[a-z0-9_-]{3,16}$', 'gi');
    if (!validarUsuario.test($("#usuarioTextField").val())) {
        alert('Usuario inválido');
        $("#usuarioTextField").css({"border-color": "red"});
        return false;
    } else {
        $("#usuarioTextField").css({"border-color": "black"});
    }
    var validarPass = new RegExp('^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,16}$', 'gi');
    if (!validarPass.test($("#contrasenaTextField").val())){
        alert('La contraseña debe tener entre 5 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.');
        $("#contrasenaTextField").css({"border-color": "red"});
        return false;
    } else {
        $("#contrasenaTextField").css({"border-color": "black"});
    }

    if (!validarEmail($("#emailTextField").val())) {
        alert('Email inválido');
        $("#emailTextField").css({"border-color": "red"});
        return false;
    } else {
        $("#emailTextField").css({"border-color": "black"});
    }


    return true;
}

function validarEmail(email)
{
    var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    return re.test(email);
}

function usuarioExiste(){
     alert('El nombre de usuario ya existe');
}
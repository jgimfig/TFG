function elimina(){
    var res=prompt("¿ESTA SEGURO DE ELIMINAR LA CUENTA?\n(Los comentarios, valoraciones,chollos creados también se eliminarán)\n Introduzca S para Si o N para no");
    if(res=="S"){
        return true;
    }
    else{
        return false;
    }
        
}
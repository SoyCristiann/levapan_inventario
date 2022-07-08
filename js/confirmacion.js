function confirmarBorrado(e){
    if (confirm("¿Está seguro que desea borrar el registro?")){
        return true;
    } else{
        e.preventDefault();
    }
}

function confirmarCerrarSesion(e){
    if (confirm("¿Está seguro que desea cerrar la sesión?")){
        return true;
    } else{
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".botonEliminar");
let linkCerrarSesion = document.querySelectorAll(".cerrarSesion");



for(var i = 0; i < linkCerrarSesion.length; i++){
    linkCerrarSesion[i].addEventListener('click', confirmarCerrarSesion);
}

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmarBorrado);
}
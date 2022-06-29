function confirmar(e){
    if (confirm("¿Está seguro que desea borrar el registro?")){
        return true;
    } else{
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll(".botonEliminar");

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmar);
}


function abrir_ventana(id) {

    let agregar = document.getElementById('agregar');
    let editar = document.getElementById('editar');
    let eliminar = document.getElementById('eliminar');
    if (id == 'agregabtn') {
        agregar.showModal();
    }
    if (id == 'edita') {
        
        
        editar.showModal();


    }
    if (id == 'elimina') {
        eliminar.showModal();
    }
}
function cerra_ventana() {
    let agregar = document.getElementById('agregar');
    let editar = document.getElementById('editar');
    let eliminar = document.getElementById('eliminar');
    agregar.close();
    editar.close();
    eliminar.close();
 window.location.reload();
    
}


function actualizarCategoria(id) {


    var idCategoria = document.getElementById("nueva-id-categoria").value;
    var nombreCategoria = document.getElementById("nuevo-categoria-nombre").value;

    var xhr = new XMLHttpRequest();


     if (id==='update'){
    xhr.open("POST", "../Vistas/categoria_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            // Aquí puedes manejar la respuesta del servidor si es necesario
        }
    };
    
    xhr.send("id=" + idCategoria + "&nombre=" + nombreCategoria + "&opcion=actualizar");
}


    var idCategoria = document.getElementById("nueva-id-categoria-e").value;
    var nombreCategoria = document.getElementById("nuevo-categoria-nombre-e").value;
if (id==='delete'){
    xhr.open("POST", "../Vistas/categoria_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    
   
    xhr.send("id=" + idCategoria + "&nombre=" + nombreCategoria + "&opcion=eliminar");
}

}




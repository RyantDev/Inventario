



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
     //window.location.reload();
    
}


function actualizarProducto(id) {


    var idProducto = document.getElementById("nuevo-id-producto").value;
    var nombreProducto = document.getElementById("nuevo-producto-nombre").value;
    var precioProducto = document.getElementById("nuevo-precio-producto").value;
    var cantidadProducto = document.getElementById("nueva-cantidad-producto").value;

    var xhr = new XMLHttpRequest();


     if (id ==='update'){
    xhr.open("POST", "../Vistas/producto_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            // Aquí puedes manejar la respuesta del servidor si es necesario
        }
    };
    
    xhr.send("id=" + idProducto + "&nombre=" + nombreProducto + "&precio=" + precioProducto +"&cantidad=" + cantidadProducto +"&opcion=actualizar");
}


var idProducto = document.getElementById("nuevo-id-producto-e").value;
var nombreProducto = document.getElementById("nuevo-producto-nombre-e").value;
var precioProducto = document.getElementById("nuevo-precio-producto-e").value;
var cantidadProducto = document.getElementById("nueva-cantidad-producto-e").value;
if (id==='delete'){
    xhr.open("POST", "../Vistas/producto_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    
   
    xhr.send("id=" + idProducto + "&nombre=" + nombreProducto + "&precio=" + precioProducto +"&cantidad=" + cantidadProducto +"&opcion=eliminar");
}

}

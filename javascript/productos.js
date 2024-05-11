

document.getElementById("agregar-producto").addEventListener("click", function() {
    var idProducto = document.getElementById("nuevo-id-producto").value;
    var nombreProducto = document.getElementById("nuevo-producto-nombre").value;
    var precioProducto = document.getElementById("nuevo-precio-producto").value;
    var cantidadProducto = document.getElementById("nueva-cantidad-producto").value;
    var categoria = document.getElementById("nuevo-producto-categoria").value;



    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Vistas/producto_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          
        }
    };
 xhr.send("id=" + idProducto + "&nombre=" + nombreProducto + "&precio=" + precioProducto +"&cantidad=" + cantidadProducto +"&categoria=" + categoria + "&opcion=agregar");

});

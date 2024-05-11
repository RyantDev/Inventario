

document.getElementById("agregar-categoria").addEventListener("click", function() {
    var idCategoria = document.getElementById("nueva-id-categoria").value;
    var nombreCategoria = document.getElementById("nuevo-categoria-nombre").value;
    console.log('entro'); 


    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Vistas/categoria_serve.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          
        }
    };
    xhr.send("id=" + idCategoria + "&nombre=" + nombreCategoria + "&opcion=agregar");


});


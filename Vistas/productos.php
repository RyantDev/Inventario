<?php

include('conexion.php');

$sql = "SELECT p.Producto_id, p.Nombre AS Nombre_Producto, p.Precio, p.Cantidad, c.Nombre Nombre_Categoria
FROM productos p

LEFT JOIN categorias c ON p.Categoria_idp = c.Categoria_id;";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/producto-estilo.css">
    <link rel="stylesheet" href="../css/Modal-estilo.css">

    <style>


/* Estilos para el contenedor del formulario */
.formulario {
    margin-bottom: 20px;
    }
    
    /* Estilos para las etiquetas de los campos */
    .formulario label {
        display: inline-block;
        width: 120px;
        font-weight: bold;
    }
    
    /* Estilos para los campos de entrada */
    .formulario input[type="number"],
    .formulario input[type="text"] {
        width: 200px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }
    
    /* Estilos para el botón de actualizar */
    #update {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    #update:hover {
        background-color: #45a049;
    }
    

    #delete {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    #deletedate:hover {
        background-color: #45a049;
    }
    /* Estilos para los botones de editar y eliminar */
    .button-editar{
        

    padding: 8px 16px;
    background-color: #FFD700; /* Color verde */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;

    }
    .button-eliminar {
    padding: 8px 16px;
    background-color: #FF0000; /* Color verde */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    }

.button-editar:hover,
.button-eliminar:hover {
  background-color: #000000; /* Color verde más oscuro al pasar el mouse */
}

</style>

    <script>
        function editarProducto(id, nombre, precio, cantidad) {
            // Aquí puedes hacer lo que necesites con el ID y el nombre de la categoría seleccionada
            console.log("Editar producto con ID: " + id + " y nombre: " + nombre + "y precio: "+ precio + "y cantidad"+cantidad);
            document.getElementById("nuevo-id-producto").value = id;
            document.getElementById("nuevo-producto-nombre").value = nombre;
            document.getElementById("nuevo-precio-producto").value = precio;
            document.getElementById("nueva-cantidad-producto").value = cantidad;
            
            var modal = document.getElementById("editar");
            modal.showModal();
        }
        function eliminarProducto(id, nombre, precio, cantidad) {
            // Aquí puedes hacer lo que necesites con el ID y el nombre de la categoría seleccionada
            console.log("Editar producto con ID: " + id + " y nombre: " + nombre + "y precio: "+ precio + "y cantidad"+cantidad);
            document.getElementById("nuevo-id-producto-e").value = id;
            document.getElementById("nuevo-producto-nombre-e").value = nombre;
            document.getElementById("nuevo-precio-producto-e").value = precio;
            document.getElementById("nueva-cantidad-producto-e").value = cantidad;
            
            var modal = document.getElementById("eliminar");
            modal.showModal();
        }

    </script>
</head>
<body>
    <h2>Tabla Productos</h2>

    <hr>
    <nav>
    <a id="agregabtn" onclick="abrir_ventana(id)">Agregar</a>
</nav>

<dialog id="agregar" class="ventana">
            <iframe id="modalContent" src="../ventanas-emergentes/agregar_producto.php" frameborder="0" width="100%" height="100%"></iframe>
            <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>

<dialog id="editar" class="ventana">
    <div class="formulario">
        <label for="nuevo-id-producto">Id: </label>
        <input type="number" id="nuevo-id-producto" placeholder="Id de el nuevo Producto">
        </div>  
        
    <div class="formulario">
        <label for="nuevo-producto-nombre">Nombre:</label>
        <input type="text" id="nuevo-producto-nombre" placeholder="Nombre de el nuevo Producto">
    </div>
    <div class="formulario">
        <label for="nuevo-precio-producto">Precio: </label>
        <input type="number" id="nuevo-precio-producto" placeholder="precio de el nuevo Producto">
    <div class="formulario">
        <label for="nueva-cantidad-producto">Cantidad:</label>
        <input type="number" id="nueva-cantidad-producto" placeholder="Cantidad de el nuevo Producto">
    </div>

    <button id="update" onclick="actualizarProducto(id)" style="margin-top: 10px;">Actualizar</button>
    <hr>
    <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>

<dialog id="eliminar" class="ventana">
    <h1>¿ESTAS SEGURO DE ELIMINAR?</h1>
    <div class="formulario">
        <label for="nuevo-id-producto-e">Id: </label>
        <input type="number" id="nuevo-id-producto-e" placeholder="Id de el nuevo Producto">
    <div class="formulario">
        <label for="nuevo-producto-nombre-e">Nombre:</label>
        <input type="text" id="nuevo-producto-nombre-e" placeholder="Nombre de el nuevo Producto">
    </div>
    <div class="formulario">
        <label for="nuevo-precio-producto-e">Precio: </label>
        <input type="number" id="nuevo-precio-producto-e" placeholder="precio de el nuevo Producto">
    <div class="formulario">
        <label for="nueva-cantidad-producto-e">Cantidad:</label>
        <input type="number" id="nueva-cantidad-producto-e" placeholder="Cantidad de el nuevo Producto">
    </div>

    <button id="delete" onclick="actualizarProducto(id)" style="margin-top: 10px;">Confirmar</button>
    <hr>
    <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>

<hr>
    <table id="miTabla">
        <tr>
            <th class="as">Id</th>
            <th>Nombre Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Nombre Categoria</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td id='idproducto'>" . $row["Producto_id"] . "</td>";
                echo "<td id='nombre'>" . $row["Nombre_Producto"] . "</td>";   
                echo "<td id='precio'>" . $row["Precio"] . "</td>";
                echo "<td id='cantidad'>" . $row["Cantidad"] . "</td>"; 
                echo "<td id='cnombre'>" . $row["Nombre_Categoria"] . "</td>";  
                echo "<td><button class='button-editar' onclick='editarProducto(\"" . $row["Producto_id"] . "\", \"" . $row["Nombre_Producto"] . "\", \"" . $row["Precio"] . "\" , \"" . $row["Cantidad"] . "\")'>Editar</button></td>";
                echo "<td><button class='button-eliminar' onclick='eliminarProducto(\"" . $row["Producto_id"] . "\", \"" . $row["Nombre_Producto"] . "\", \"" . $row["Precio"] . "\" , \"" . $row["Cantidad"] . "\")'>Eliminar</button></td>";
                
                      
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay productos </td></tr>";
        }
        ?>
    </table>
    <script src="../javascript/script-modal_producto.js" type="text/javascript"></script>





</body>
</html>
<?php
$conn->close();
?>
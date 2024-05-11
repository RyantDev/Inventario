<!DOCTYPE html>
<?php

include('../Vistas/conexion.php');

$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/producto-agregar.css">
</head>
<body>
    

<h2>Agregar Producto</h2>
<div class="formulario">
        <label for="nuevo-id-producto">Id: </label>
        <input type="number" id="nuevo-id-producto" placeholder="Id de el nuevo Producto">
    <div class="formulario">
        <label for="nuevo-producto-nombre">Nombre:</label>
        <input type="text" id="nuevo-producto-nombre" placeholder="Nombre de el nuevo Producto">
    </div>
    <div class="formulario">
        <label for="nuevo-producto-categoria">Categoria:</label>
        <select id="nuevo-producto-categoria">
        <option value="categoria1">Ninguna</option>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Generar una opción para cada categoría
                echo "<option value='" . $row["Categoria_id"] . "'>" . $row["Categoria_id"]. "</option>";
            }
        } else {
            // En caso de que no haya categorías en la base de datos
            echo "<option value=''>No hay categorías disponibles</option>";
        }
        ?>

      </select>

    </div>

    <div class="formulario">
        <label for="nueva-imagen-producto">Imagen:</label>
        <input type="file" id="nueva-imagen-producto" name="nueva-imagen-producto">
    </div>

    <div class="formulario">
        <label for="nuevo-precio-producto">Precio: </label>
        <input type="number" id="nuevo-precio-producto" placeholder="Precio de el nuevo Producto">
    <div class="formulario">
        <label for="nueva-cantidad-producto">Cantidad:</label>
        <input type="number" id="nueva-cantidad-producto" placeholder="Cantidad de el nuevo Producto">
    </div>
    <button id="agregar-producto" style="margin-top: 10px;">Agregar Producto</button>
    <hr>
   
    <script src="../javascript/productos.js" type="text/javascript"></script>

</body>
</html>
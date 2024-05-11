<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/producto-agregar.css">
</head>
<body>

<h2>Editar</h2>
<div class="formulario">
        <label for="nuevo-id-producto">Id: </label>
        <input type="number" id="nuevo-id-producto" placeholder="Id de el nuevo Producto">
    <div class="formulario">
        <label for="nuevo-producto-nombre">Nombre:</label>
        <input type="text" id="nuevo-categoria-nombre" placeholder="Nombre de el nuevo Producto">
    </div>
    <div class="formulario">
        <label for="nuevo-precio-producto">Precio: </label>
        <input type="number" id="nuevo-precio-producto" placeholder="precio de el nuevo Producto">
    <div class="formulario">
        <label for="nueva-cantidad-producto">Cantidad:</label>
        <input type="number" id="nueva-cantidad-producto" placeholder="Cantidad de el nuevo Producto">
    </div>

    <button onclick="actualizarProducto()" style="margin-top: 10px;">Actualizar</button>
    <hr>
   
    <script src="../javascript/productos.js" type="text/javascript"></script>
    

</body>
</html>
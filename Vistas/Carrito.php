<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrito de Compras</title>
<style>
    /* Estilos para el contenedor del carrito */
    .carrito {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
    }

    /* Estilos para la imagen del producto */
    .carrito img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 5px;
    }

    /* Estilos para la información del producto */
    .info-producto {
        flex-grow: 1;
    }

    /* Estilos para cada elemento de la información */
    .info-producto p {
        margin: 5px 0;
    }
</style>
</head>
<body>

<div class="carrito">
 <!-- <img src="imagen.jpg" alt="Producto"> -->
    <div class="info-producto">
        <p>ID: 123</p>
        <p>Nombre: Producto 1</p>
        <p>Precio: $50.00</p>
        <p>Cantidad: 2</p>
        <p>Fecha de Venta: 2024-04-05</p>
    </div>
</div>

<div class="carrito">
    <!-- <img src="imagen.jpg" alt="Producto"> -->
    <div class="info-producto">
        <p>ID: 124</p>
        <p>Nombre: Producto 2</p>
        <p>Precio: $30.00</p>
        <p>Cantidad: 1</p>
        <p>Fecha de Venta: 2024-04-05</p>
    </div>
</div>

<!-- Agrega más elementos de carrito aquí si es necesario -->

</body>
</html>

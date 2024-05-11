<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO</title>
    <link rel="stylesheet" href="../css/styles_inicio.css">

</head>



<body>
   


<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>



<div class="menuinicio">
    <div class="logo">
    <img src="../imagenes/LOGO.png">
    </div>
    <button class="tab-button menu" onclick="changeTab(0)">Inicio</button>
    <button class="tab-button menu" onclick="changeTab(1)">Inventario de Productos</button>
    <button class="tab-button menu" onclick="changeTab(2)">Ventas</button>
    <button class="tab-button menu" onclick="changeTab(3)">Registros</button>
    <button class="tab-button menu" onclick="changeTab(4)">Carrito</button>
    <button class="tab-button menu" onclick="changeTab(5)">Categoria</button>
</div>
    


    <div class="contenidos">
            <div id="tabContent1" class="tab-content">
            <iframe src="productos-vender.php" width="250px" height="250px" frameborder="1"></iframe> 
            </div>

            <div id="tabContent2" class="tab-content">
        <iframe src="productos.php" width="250px" height="250px" frameborder="1"></iframe> 
            </div>

            <div id="tabContent3" class="tab-content">
            <p>Contenido de Inicio2</p>
            </div>

            <div id="tabContent4" class="tab-content">
            <p>Contenido de Inicio3</p>
            </div>

            <div id="tabContent5" class="tab-content">
            <iframe src="Carrito.php" width="250px" height="250px" frameborder="1"></iframe>
            </div>

            <div id="tabContent6" class="tab-content">
            <iframe src="Categorias.php" width="250px" height="250px" frameborder="1"></iframe> 
            </div>



    </div>
    
    <script src="../javascript/inicio.js"></script>

</body>
</html>
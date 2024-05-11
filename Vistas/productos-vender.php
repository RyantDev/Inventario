<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('conexion.php');


// Definir el filtro de precio inicial y final
$precio_inicial = isset($_GET['precio_inicial']) ? $_GET['precio_inicial'] : 0;
$precio_final = isset($_GET['precio_final']) ? $_GET['precio_final'] : PHP_INT_MAX;

// Consulta SQL con el filtro de precio
$sql = "SELECT * FROM productos WHERE Precio BETWEEN $precio_inicial AND $precio_final";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agrega Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrito de Compras</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
        /* Estilos personalizados */
        .card {
            margin-bottom: 20px;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        .filter-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-filter {
            background-color: #007bff;
            color: #fff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-filter:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Formulario de filtro -->
        <form method="GET" action="">
            <label for="precio_inicial">Precio inicial:</label>
            <input type="number" name="precio_inicial" id="precio_inicial" value="<?php echo $precio_inicial; ?>">
            <label for="precio_final">Precio final:</label>
            <input type="number" name="precio_final" id="precio_final" value="<?php echo $precio_final; ?>">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>

    <div class="row">
    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-4'>";
                        echo "<div class='card'>";
                //        echo "<img src='" . $row['imagen'] . "' class='card-img-top' alt='" . $row['nombre_producto'] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $row['Nombre'] . "</h5>";
                        echo "<p class='card-text'>ID: " . $row['Producto_id'] . "</p>";
                        echo "<p class='card-text'>Precio: $" . $row['Precio'] . "</p>";
                        echo "<p class='card-text'>Cantidad: " . $row['Cantidad'] . "</p>";
                        echo "<p class='card-text'>Cantidad: " . $row['Cantidad'] . "</p>";
                      //  echo "<p class='card-text'>Fecha de Venta: " . $row['fecha_venta'] . "</p>";
                        echo "</div>";
                        echo "<div class='card-footer'>";
                        echo "<button class='btn btn-primary'>Agregar  <i class='fas fa-shopping-cart'></i></button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No hay productos disponibles en este rango de precio.</p>";
                }
                ?>
    </div>
</div>

</body>
</html>

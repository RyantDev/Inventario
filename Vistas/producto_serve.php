<?php
include('conexion.php');
$idProducto = $_POST['id'];
$nombreProducto = $_POST['nombre'];
$precioProducto = $_POST['precio'];
$cantidadProducto = $_POST['cantidad'];
$categoria = $_POST['categoria'];

if (isset($_POST['opcion']) && $_POST['opcion'] === 'actualizar') {

    $sql = "UPDATE productos SET Nombre = ?, Precio = ?, Cantidad = ?, Categoria_idp = ? WHERE Producto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nombreProducto, $precioProducto, $cantidadProducto, $idProducto, $categoria);
    if ($stmt->execute()) {
        echo "Producto actualizado correctamente";
    } else {
        echo "Error al actualizar el Producto: " . $conn->error;
    }
}

if (isset($_POST['opcion']) && $_POST['opcion'] === 'eliminar') {
    // Verificar si se recibió el ID de la categoría
 
        


        // Preparar la consulta SQL para eliminar la categoría
        $sql = "DELETE FROM productos WHERE Producto_id =  $idProducto";
        
        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Producto eliminado correctamente";
        } else {
            echo "Error al eliminar Producto: " . $conn->error;
        }
    
}


if (isset($_POST['opcion']) && $_POST['opcion'] === 'agregar') {
   
    $sql = "INSERT INTO productos (Producto_id, Nombre, Precio, Cantidad, Categoria_idp) VALUES ('$idProducto', '$nombreProducto', '$precioProducto', '$cantidadProducto' , '$categoria')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado correctamente";
    } else {
        echo "Error al actualizar el Producto: " . $conn->error;
    }
}



















//-----------------------------------------------------------------------------------------------------------------------------------//


if (isset($_POST['opcion']) && $_POST['opcion'] === 'agregar' ) {

    if (isset($_FILES['nueva-imagen-producto']) && $_FILES['nueva-imagen-producto']['error'] === UPLOAD_ERR_OK) {
        // Obtener la información del archivo
        $imagenTmpName = $_FILES['nueva-imagen-producto']['tmp_name'];
        $imagenName = $_FILES['nueva-imagen-producto']['name'];

        // Leer el contenido del archivo
        $imagenProducto = file_get_contents($imagenTmpName);

        // Escapar el contenido del archivo para evitar inyección SQL
        $imagenProducto = mysqli_real_escape_string($conn, $imagenProducto);

// Preparar la consulta para insertar el producto con la imagen

    $sql = "INSERT INTO productos (Producto_id, Nombre,Precio,Cantidad,imagen) VALUES ('$idProducto', '$nombreProducto', '$precioProducto','$cantidadProducto','$imagenProducto')";
    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error al agregar Producto: " . $conn->error;
    }
}


}

if (isset($_POST['opcion']) && $_POST['opcion'] === 'aghjjyhjhjhgjmgjhgfyufgyjhfyftregar' ) {


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST['id'];
    $nombreProducto = $_POST['nombre'];
    $precioProducto = $_POST['precio'];
    $cantidadProducto = $_POST['cantidad'];

    // Verificar si se recibió la imagen
    if (isset($_FILES['imagen'])) {
        // Obtener información sobre el archivo de imagen
        $nombreArchivo = $_FILES['imagen']['name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $tamañoArchivo = $_FILES['imagen']['size'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];
        $errorArchivo = $_FILES['imagen']['error'];

        // Definir la ruta de destino para guardar la imagen
        $directorioDestino = "ruta/de/destino/";

        // Mover el archivo de imagen de la ubicación temporal al directorio de destino
        if (move_uploaded_file($rutaTemporal, $directorioDestino . $nombreArchivo)) {
            // La imagen se cargó correctamente, ahora puedes procesar otros datos del formulario
            // Aquí puedes realizar la inserción en la base de datos, por ejemplo:
            $sql = "INSERT INTO productos (Producto_id, Nombre, Precio, Cantidad, imagen) VALUES ('$idProducto', '$nombreProducto', '$precioProducto', '$cantidadProducto', '$nombreArchivo')";
            if ($conn->query($sql) === TRUE) {
                echo "Producto agregado correctamente";
            } else {
                echo "Error al agregar Producto: " . $conn->error;
            }
        } else {
            // Hubo un error al cargar la imagen
            echo "Error al cargar la imagen";
        }
    }
}
}
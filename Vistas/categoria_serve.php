<?php
include('conexion.php');
$idCategoria = $_POST['id'];
$nombreCategoria = $_POST['nombre'];



if (isset($_POST['opcion']) && $_POST['opcion'] === 'actualizar') {

    $sql = "UPDATE categorias SET Nombre = '$nombreCategoria' WHERE Categoria_Id = $idCategoria";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría actualizada correctamente";
    } else {
        echo "Error al actualizar la categoría: " . $conn->error;
    }
}

if (isset($_POST['opcion']) && $_POST['opcion'] === 'eliminar') {
    // Verificar si se recibió el ID de la categoría
 
        
        // Preparar la consulta SQL para eliminar la categoría
        $sql = "DELETE FROM categorias WHERE Categoria_Id =  $idCategoria";
        
        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Categoría eliminada correctamente";
        } else {
            echo "Error al eliminar categoría: " . $conn->error;
        }
    
}

if (isset($_POST['opcion']) && $_POST['opcion'] === 'agregar' ) {
  
    $sql = "INSERT INTO categorias (Categoria_id, Nombre) VALUES ('$idCategoria', '$nombreCategoria')";
    if ($conn->query($sql) === TRUE) {
        echo "Categoría agregada correctamente";
    } else {
        echo "Error al agregar categoría: " . $conn->error;
    }
}













$conn->close();
?>

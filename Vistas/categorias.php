<?php

include('conexion.php');

$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <link rel="stylesheet" href="../css/producto-estilo.css">
    <link rel="stylesheet" href="../css/Modal-estilo.css">


    <script>
        function editarCategoria(id, nombre) {
            // Aquí puedes hacer lo que necesites con el ID y el nombre de la categoría seleccionada
            console.log("Editar categoría con ID: " + id + " y nombre: " + nombre);
            document.getElementById("nueva-id-categoria").value = id;
            document.getElementById("nuevo-categoria-nombre").value = nombre;
            
            var modal = document.getElementById("editar");
            modal.showModal();
        }
        function eliminarcategoria(id, nombre) {
            // Aquí puedes hacer lo que necesites con el ID y el nombre de la categoría seleccionada
            console.log("Editar categoría con ID: " + id + " y nombre: " + nombre);
            document.getElementById("nueva-id-categoria-e").value = id;
            document.getElementById("nuevo-categoria-nombre-e").value = nombre;
            
            var modal = document.getElementById("eliminar");
            modal.showModal();
        }



    </script>

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



</head>
<body>
    <h2>Tabla Categorias</h2>

    <hr>
    <nav>
    <a id="agregabtn" onclick="abrir_ventana(id)">Agregar</a>
</nav>

<dialog id="agregar" class="ventana">
            <iframe id="modalContent" src="../ventanas-emergentes/agregar_categoria.php" frameborder="0" width="100%" height="100%"></iframe>
            <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>

<dialog id="editar" class="ventana">
    <div class="formulario">
        <label for="nueva-id-categoria">Id: </label>
        <input type="number" id="nueva-id-categoria" placeholder="Id de la categoria">
    </div>
    <div class="formulario">
        <label for="nuevo-categoria-nombre">Nombre:</label>
        <input type="text" id="nuevo-categoria-nombre" placeholder="Nombre de la nueva categoria">
    </div>

    <button id="update" onclick="actualizarCategoria(id)" style="margin-top: 10px;">Actualizar</button>
    <hr>
    <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>

<dialog id="eliminar" class="ventana">
    <h1>ESTAS SEGURO DE ELIMINAR</h1>
    <div class="formulario">
        <label for="nueva-id-categoria">Id: </label>
        <input type="number" id="nueva-id-categoria-e" placeholder="Id de la categoria">
    </div>
    <div class="formulario">
        <label for="nuevo-categoria-nombre">Nombre:</label>
        <input type="text" id="nuevo-categoria-nombre-e" placeholder="Nombre de la nueva categoria">
    </div>

    <button id="delete" onclick="actualizarCategoria(id)" style="margin-top: 10px;">CONFIRMAR</button>
    <hr>
    <button id="closeModalBtn" onclick="cerra_ventana()"> <span class="close">X</span></button>
</dialog>


<hr>
    <table id="miTabla">
        <tr>
            <th class="as">Id</th>
            <th>Nombre</th>
         
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td id='idcategoria'>" . $row["Categoria_id"] . "</td>";
                echo "<td id='nombre'>" . $row["Nombre"] . "</td>";   
                echo "<td><button class='button-editar' onclick='editarCategoria(\"" . $row["Categoria_id"] . "\", \"" . $row["Nombre"] . "\")'>Editar</button></td>";
                echo "<td><button class='button-eliminar' onclick='eliminarcategoria(\"" . $row["Categoria_id"] . "\", \"" . $row["Nombre"] . "\")'>Eliminar</button></td>";
                      
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No hay productos </td></tr>";
        }
        ?>
    </table>
    <script src="../javascript/script-modal.js" type="text/javascript"></script>





</body>
</html>
<?php
$conn->close();
?>

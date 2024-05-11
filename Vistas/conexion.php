<?php
  $conn=mysqli_connect("localhost","root","","minegocio");
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
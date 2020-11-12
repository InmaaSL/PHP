<?php

    $conexion = mysqli_connect('localhost','root','','bdlibros');
    if ($conexion->connect_errno) 
    {
    die("Lo siento, hubo un problema en la base de datos. (". $conexion->connect_error .")");
    } 

    $sql = "DELETE FROM libros WHERE id = $_REQUEST[id]";
    $conexion->query($sql);
    $conexion->close();
    header("Location:pagina.php");



?>

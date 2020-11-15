<?php

   $conexion = mysqli_connect('localhost','root','','bdlibros');
   if ($conexion->connect_errno) 
   {
   die("Lo siento, hubo un problema en la base de datos. (". $conexion->connect_error .")");
   } 
   
   $id = $_GET['id'];

   $sql = "DELETE FROM libros WHERE id = $id";
   $registros = mysqli_prepare($conexion, $sql);
   $registros->execute();

   mysqli_stmt_close($registros);
   mysqli_close($conexion);


   header("Location:pagina.php");



?>

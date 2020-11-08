
<?php

require_once("ud04ejer02.php");



$insertar = $conexion->insertarLibros($id, $titulo, $autor, $paginas);

if($resultado){
    echo "<meta http-equiv='refresh' content='0'>";
}

?>
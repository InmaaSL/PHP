<?php
    //Imprime por pantalla los errores del código.     
    ini_set('display_errors', 1);     
    ini_set('display_startup_errors',1);     
    error_reporting(E_ALL);
    
function miniatura($name_org, $name_dst, $ancho, $alto){
        // Separamos el nombre y la extensión en un array de 2 elementos
        $arrNombre = explode(".", $name_org);
        $nombre = $arrNombre[0];
        $extension = $arrNombre[1];
    
        // Creamos una nueva imagen, para cada tipo de extensión posible
        if($extension=="jpg" || $extension=="jpeg") $source = imagecreatefromjpeg($name_org);
        elseif($extension=="png") $source = imagecreatefrompng($name_org);
        elseif($extension=="gif") $source = imagecreatefromgif($name_org);
    
        // Creamos el thumbnail vacio
        $thumb = imagecreatetruecolor($ancho, $alto);
        $ancho_orig = imagesx($source);
        $alto_orig = imagesy($source);
    
        // Copiamos la imagen en un thumbnail pasándole los parámetros necesarios
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $ancho, $alto, $ancho_orig, $alto_orig);
    
        // Exportamos al formato elegido (Con el formato jpg o jpeg podemos elegir calidad).
        if($extension=="jpg" || $extension=="jpeg") imagejpeg($thumb, $name_dst, 90);
        elseif($extension=="png") imagepng($thumb, $name_dst);
        elseif($extension=="gif") imagegif($thumb, $name_dst);
    }

    
$nombre1 = $_FILES['imagen']['name'];
miniatura($nombre1, "muestra120.jpg", 120, 120);
miniatura($nombre1, "muestra200.jpg", 200, 200);
?> 
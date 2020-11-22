<?php
function miniatura($archivo, $local, $ancho, $alto){    
    $arrNombre = explode(".", $local);
    $nombre = $arrNombre[0];
    $extension = $arrNombre[1];
    if($extension=="jpg" || $extension=="jpeg") $nuevo = imagecreatefromjpeg($archivo);
    if($extension=="png") $nuevo = imagecreatefrompng($archivo);
    if($extension=="gif") $nuevo = imagecreatefromgif($archivo);
    $thumb = imagecreatetruecolor($ancho, $alto); // Lo haremos de un tamaño 100x100
    $ancho_original = imagesx($nuevo);
    $alto_original = imagesy($nuevo);
    imagecopyresampled($thumb,$nuevo,0,0,0,0,$ancho,$alto,$ancho_original,$alto_original);
    $thumb_name = "thumb_$nombre.$extension";
    if($extension=="jpg" || $extension=="jpeg") imagejpeg($thumb, $thumb_name,90); // 90 es la calidad de compresión
    if($extension=="png") imagepng($thumb, $thumb_name);
    if($extension=="gif") imagegif($thumb, $thumb_name);
}
miniatura("muestra.jpg", "muestra100.jpg", 100, 100);
miniatura("muestra.jpg", "muestra256.jpg", 256, 256);
?>
<!doctype html>
<html>
    <head>
        <meta lang="es" />
        <meta charset="utf-8" />
        <title>Miniatura de imágenes con PHP</title>
    </head>
    <body>
        <p><img src="thumb_muestra100.jpg" alt="Miniatura" /></p>
        <p><img src="thumb_muestra256.jpg" alt="Miniatura" /></p>
    </body>
</html>

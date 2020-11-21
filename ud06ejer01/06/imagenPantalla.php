<?php
// Creación de la imagen
$imagen = imagecreatefromjpeg("Galicia.jpg");
// crea una nueva imagen a partir de un fichero o de una URL.
// Envío de la imagen
header("Content-Type: image/jpeg");
// envia la cabecera del tipo de archivo gráfico que se quiere mostrar.
imagejpeg($imagen);
// envia la imagen con imagepng().
// Liberación de la imagen de memoria
imagedestroy($imagen);
?> 
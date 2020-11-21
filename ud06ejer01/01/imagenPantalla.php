<?php
    // Creación de la imagen a partir de un fichero o de una URL.
    $imagen = imagecreatefromjpeg("Galicia.jpg");

    // Envío de la imagen a la cabecera del tipo de archivo gráfico que se quiere mostrar.
    header("Content-Type: image/jpeg");

    // Envia la imagen con imagepng().
    imagejpeg($imagen);

    // Liberación de la imagen de memoria
    imagedestroy($imagen);
?> 
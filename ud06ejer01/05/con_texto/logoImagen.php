<?php
    //Primero vamos a crear la estampa: 
    $estampa = imagecreatetruecolor(225, 70);

    // dibuja un rectangulo con relleno
    imagefilledrectangle($estampa, 0, 0, 200, 50, 0xF4A41A);
    imagefilledrectangle($estampa, 10, 10, 190, 40, 0xEDFAFC);

    //dibuja un texto horizontal
    imagestring($estampa, 4, 15, 17, '#TiraMillasConMochila', 0x03171A); 

    // Cargar la estampa y la foto para aplicarle la marca de agua
    $img = imagecreatefromjpeg('fotoMar.jpg');

    // Establecer los márgenes para la estampa
    $margen_dcho = 10;
    $margen_inf = 10;

    // obtener el alto/ancho de la imagen de la estampa
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    imagecopymerge($img, $estampa, imagesx($img) - $sx - $margen_dcho, imagesy($img) - $sy - $margen_inf,
                0, 0, imagesx($estampa), imagesy($estampa), 50);

    // Copiar la imagen de la estampa sobre nuestra foto usando los índices de
    // márgen y el ancho de la foto para calcular la posición de la estampa.
    // imagecopy($img, $estampa_dst, imagesx($img) - $sx - $margen_dcho , imagesy($img) - $sy - $margen_inf, 0, 0, 
    //         imagesx($estampa_dst), imagesy($estampa_dst));

    // Imprimir y mostrar 
    header('Content-type: image/png');
    imagepng($img);

    // // Guardar en un archivo nuevo
    imagepng($img, "mar_registrado.png");

    // Liberar memoria
    imagedestroy($img);
    imagedestroy($estampa);
?> 
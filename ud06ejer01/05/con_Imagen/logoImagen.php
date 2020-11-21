<?php
    //Primero le cambiamos el tamaño al logo porque es enorme: 
    // Creamos una imagen cargándola desde el archivo gif
    $estampa_org = imagecreatefrompng('logo_TMCM.png');

    // Obtenemos el tercio de las dimensiones de la imagen origen
    $ancho_dst = intval(imagesx($estampa_org)/2);
    $alto_dst = intval(imagesy($estampa_org)/2);

    // Creamos un lienzo para la imagen destino con las dimensiones calculadas
    $estampa_dst = imagecreatetruecolor($ancho_dst, $alto_dst);

    /* Escalamos la imagen gif origen sobre la imagen nueva destino especificando
    punto de inicio para destino y origen, y punto final para destino y origen. */
    imagecopyresampled($estampa_dst, $estampa_org, 0, 0, 0, 0,
    $ancho_dst, $alto_dst, imagesx($estampa_org), imagesy($estampa_org));

    // Cargar la estampa y la foto para aplicarle la marca de agua
    $img = imagecreatefromjpeg('fotoMar.jpg');

    // Establecer los márgenes para la estampa
    $margen_dcho = 10;
    $margen_inf = 10;

    // obtener el alto/ancho de la imagen de la estampa
    $sx = imagesx($estampa_dst);
    $sy = imagesy($estampa_dst);

    // Copiar la imagen de la estampa sobre nuestra foto usando los índices de
    // márgen y el ancho de la foto para calcular la posición de la estampa.
    imagecopy($img, $estampa_dst, imagesx($img) - $sx - $margen_dcho , imagesy($img) - $sy - $margen_inf, 0, 0, 
            imagesx($estampa_dst), imagesy($estampa_dst));

    // Imprimir y mostrar    // Damos salida a la imagen final cambiando el formato a png
    // header("Content-type: image/png");
    // imagepng($estampa_dst);
    header('Content-type: image/png');
    imagepng($img);

    // // Guardar en un archivo nuevo
    imagepng($img, "mar_registrado.png");

    // Liberar memoria
    imagedestroy($img);
    imagedestroy($estampa_org);
    imagedestroy($estampa_dst);
?> 
<?php
// Creamos una imagen cargándola desde el archivo gif
$img_org = imagecreatefromjpeg("Vaquitas.jpeg");

// Obtenemos el tercio de las dimensiones de la imagen origen
$ancho_dst = intval(imagesx($img_org) / 10);
$alto_dst = intval(imagesy($img_org) / 10);

// Creamos un lienzo para la imagen destino con las dimensiones calculadas
$img_dst = imagecreatetruecolor($ancho_dst, $alto_dst);

/* Escalamos la imagen gif origen sobre la imagen nueva destino especificando
 punto de inicio para destino y origen, y punto final para destino y origen. */
imagecopyresampled($img_dst, $img_org, 0, 0, 0, 0,
$ancho_dst, $alto_dst, imagesx($img_org), imagesy($img_org));

// Damos salida a la imagen final cambiando el formato a png
header("Content-type: image/jpeg");
imagejpeg($img_dst);

// Destruimos ambas imágenes
imagedestroy($img_org);
imagedestroy($img_dst);
?> 
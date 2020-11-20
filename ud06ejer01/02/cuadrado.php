<?php
// a. Creación y configuración del lienzo
$alto = 250;
$ancho = 250;

$imagen = imagecreatetruecolor($ancho, $alto);
//Definimos los colores:
$verdeC = imagecolorallocate($imagen, 63, 191, 127);
$verdeO = imagecolorallocate($imagen, 12, 38, 25);

// b. Dibujamos la imagen
imagefill($imagen, 0, 0, $verdeO);
imageline($imagen, 125, $ancho, 125, 0, $verdeC);
imageline($imagen, 0, 125, $ancho, 125, $verdeC);

imagestring($imagen, 3, 35, 175, 'BONICO', $verdeC);
imagestring($imagen, 5, 175, 75, 'FEO', $verdeC);


// c. Generación de la imagen
header('content-type: image/png');
imagepng ($imagen);
// d. Liberamos la imagen de memoria
imagedestroy($imagen);
?>
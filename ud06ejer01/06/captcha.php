<?php
    session_start();
    // Creación de cadena aleatoria
    // mktime: marca de tiempo Unix de una fecha
    $crypt = md5(mktime() * rand());

    // Solo necesitamos 5 caracteres aleatorios.
    $string = substr($crypt, 0, 5);

    // Creamos una imagen partiendo de una de fondo.
    // Debemos subir una imagen de fondo al servidor).
    $captcha = imagecreatefromjpeg("captcha.jpg");

    // Redimensionamos la imagen origen:
    $ancho_dst = intval(imagesx($captcha)/15);
    $alto_dst = intval(imagesy($captcha)/25);

    // Creamos un lienzo para la imagen destino con las dimensiones calculadas
    $captcha_f = imagecreatetruecolor($ancho_dst, $alto_dst);

    /* Escalamos la imagen gif origen sobre la imagen nueva destino especificando
    punto de inicio para destino y origen, y punto final para destino y origen. */
    imagecopyresampled($captcha_f, $captcha, 0, 0, 0, 0,
                    $ancho_dst, $alto_dst, imagesx($captcha), imagesy($captcha));

    // Colores usados para generan las líneas (RGB).
    $brown = imagecolorallocate($captcha_f, 80, 70, 30);

    // Añadimos líneas a nuestra imagen.
    imageline($captcha_f, 0, 0, $ancho_dst, $alto_dst, $brown);
    imageline($captcha_f, 40, 0, 64, 29, $brown);

    // Escribimos la cadena aleatoriamente en la imagen
    imagestring($captcha_f, 5, 20, 10, $string, $brown);

    // Encriptamos y almacenamos el valor en una variable de sesión
    $_SESSION['key'] = md5($string);

    // Devolvemos la imagen para mostrarla
    header("Content-type: image/jpeg");
    imagejpeg($captcha_f);

    imagedestroy($captcha_f);
    imagedestroy($captcha);
?>

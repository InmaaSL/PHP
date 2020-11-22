<?php
    //Imprime por pantalla los errores del código.     
    ini_set('display_errors', 1);     
    ini_set('display_startup_errors',1);     
    error_reporting(E_ALL);

    // Comprobamos si hay un error al subirlo
    if ($_FILES['imagen']['error'] != UPLOAD_ERR_OK) {
        echo 'Error: ';
        switch ($_FILES['imagen']['error'])
        {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'El fichero es demasiado grande';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo 'El fichero no se ha podido subir entero';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'No se ha podido subir el fichero';
                break;
            default:
            echo 'Error indeterminado';
        }
    // Comprobamos que el fichero es del tipo que esperamos
    } elseif ($_FILES['imagen']['type'] != 'image/gif' &&
            $_FILES['imagen']['type'] != 'image/png' &&
            $_FILES['imagen']['type'] != 'image/jpeg') 
    {
        echo 'Error: No se trata de una imagen.';
    }

    // Si se ha podido subir, lo guardamos.
    /* Indica si el archivo fue subido mediante HTTP POST. Esto es útil para intentar
    asegurarse de que un usuario malicioso no ha intentado engañar al script. */
    elseif (is_uploaded_file($_FILES['imagen']['tmp_name']) === true)
    {
        /* Concatenamos la ruta destino y comprobamos si el nombre ya existe previamente,
        en cuyo caso añadiremos una marca de tiempo. */
        $nombre = $_FILES['imagen']['name'];
        if (is_file($nombre) === true)
        {
            $nombre = time() . "_" .$nombre;
        } 
        
        // Movemos el fichero a su nueva ubicación
        // move_uploaded_file ( string $filename , string $destination ) : bool
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $nombre))
        {

            header("Location:ud06ejer02.php");

        } else {
            echo 'Error: No se puede mover el fichero a su destino.';
        }
    } else {
        echo 'Error: posible ataque. Nombre: ' . $_FILES['imagen']['name'];
    }
include_once("funcionMiniatura.php");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD06EJER02: </title>
</head>
<body>

    <h1>Elija la foto que desea:</h1>

    <form enctype="multipart/form-data" action="funcionMiniatura.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZW" value="10000000">
        <label for="imagen">Selecciones el fichero a subir:</label>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" value="Enviar">
    </form>

    <?php        
        ini_set('display_errors', 1); 
        ini_set('display_startup_errors',1);
        error_reporting(E_ALL);

        if(isset($_GET['img'])){
            echo "<p><img src='120_" . $_GET['img']  . "' alt='miniatura'/></p>";
            echo "<p><img src='200_" . $_GET['img']  . "' alt='miniatura'/></p>";                        
        }
    ?>   

</body>
</html>
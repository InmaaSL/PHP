<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros: </title>
</head>
<body>
    <h1>Elija la foto que desea:</h1>
    <form enctype="multipart/form-data" action="subida.php" method="post">
        <input type="hidden" name="MAX_FILE_SIZW" value="10000000">
        <label for="imagen">Selecciones el fichero a subir:</label>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
<?php
    session_start();

    if (!isset ($_SESSION['usuario'])){
    header("Location:login.php");
    }
    echo "¡Bienvenido, ". $_SESSION['usuario'] ."! En esta página puedes: "; 

    if ($_SESSION['lectura'] == 1)
        echo ' (ver)';
    if ($_SESSION['escritura'] == 1)
        echo ' (escribir)';
    if ($_SESSION['administracion'] == 1)
        echo ' (eliminar)';

    echo " libros. <br> Tu última conexión fue el día: ";
    echo " <br> <a href='logout.php'>Cerrar Sesión</a>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tabla de libros</h1>

    <ul>
<?php
    if ($_SESSION['lectura'] == 1)
    echo '<li> Lectura </li>';
    if ($_SESSION['escritura'] == 1)
    echo '<li> Escritura </li>';
    if ($_SESSION['administracion'] == 1)
    echo '<li> Administracion </li>';
?>
</ul>


</body>
</html>
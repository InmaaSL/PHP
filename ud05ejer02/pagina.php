<?php
    session_start();

    if (!isset ($_SESSION['nombre'])){
    header("Location:login.php");
    }
    echo "¡Bienvenido, ". $_SESSION['nombre'] ."!<br>";
    echo "<a href='logout.php'>Cerrar Sesión</a>";
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
<?php
    session_start();

    if (!isset ($_SESSION['usuario'])){
    header("Location:login.php");
    }else{
        if (isset($_COOKIE['ultimoLogeo'])) {
            $ultimoLogeo = $_COOKIE['ultimoLogeo'];
        }
        setcookie("ultimoLogeo", time(), time()+60*60*24*365);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    echo "¡Bienvenido, ". $_SESSION['usuario'] ."! En esta página puedes: "; 

    if ($_SESSION['lectura'] == 1)
        echo ' (ver)';
    if ($_SESSION['escritura'] == 1)
        echo ' (escribir)';
    if ($_SESSION['administracion'] == 1)
        echo ' (eliminar)';


        if (isset($ultimoLogeo)) {
            echo " libros. <br> Tu última conexión fue el día: " . @date("d/m/y \a \l\a\s H:i", $ultimoLogeo);
            }else{
            echo " libros. <br> ¡Bienvenido por primera vez!";
            }
        
    echo " <br> <a href='logout.php'>Cerrar Sesión</a>";
?>

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
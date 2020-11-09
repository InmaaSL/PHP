<?php
session_start(); // Permite continuar la sesión.
// Si no existe la variable de sesión, volvemos a login.php
if (!isset ($_SESSION['nombre'])){
header("Location:login.php");
}
echo "¡Bienvenido, ". $_SESSION['nombre'] ."!<br>";
echo "<a href='logout.php'>Cerrar Sesión</a>";
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Desarrollo web en entorno servidor – ud 5</title>
</head>
<body>
<h1>Permisos de acceso en esta aplicación:</h1>
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

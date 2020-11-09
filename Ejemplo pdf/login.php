<?php
session_start();
if (!empty($_POST['userid']) && !empty($_POST['password']))
{
 // El usuario acaba de intentar conectarse
$userid = $_POST['userid'];
$password = sha1($_POST['password']);
// Conectamos con la Base de Datos y comprobamos la identidad del usuario
$conexion = new mysqli('localhost','root','','bdusuarios');
$sql = "SELECT * FROM usuarios WHERE login = '$userid' AND password= '$password'";
$consulta = $conexion->query($sql);
// Si existe un registro, el usuario ha proporcionado las credenciales correctas
$resultado = $consulta->fetch_assoc();
if ($resultado != null){
// Guardamos los datos en la sesión
$_SESSION['nombre'] = $resultado['nombre'];
$_SESSION['lectura'] = $resultado['lectura'];
$_SESSION['escritura'] = $resultado['escritura'];
$_SESSION['administracion'] = $resultado['administracion'];
header("Location:pagina.php");
}
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Desarrollo web en entorno servidor – ud 5</title>
</head>
<body>
<h1>Pagina de entrada</h1>
<?php
if (isset($_SESSION['nombre'])) {
// si existe usuario logueado, saltamos a pagina.php
header("Location:pagina.php");
}else{
if (isset($userid)){
// el usuario ha intentado conectarse y no lo ha conseguido
echo 'No has conseguido acceder al sistema.<br>';
}else{
// el usuario todavía no ha intentado autenticarse
echo 'Loguéate para entrar en el sistema.<br>';
}
?>
<!-- si no hay ningún usuario logueado, mostramos el formulario para loguearse. -->
<form name="formulariologin" method="POST" action="login.php">
<label for="userid">Usuario</label><input type="text" name="userid"><br>
<label for="password">Contraseña</label><input type="password" name="password"><br>
<input type="submit" name="entrar" value="Entrar">
</form>
<?php
}
?>
</body>
</html>

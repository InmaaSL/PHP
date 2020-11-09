<!DOCTYPE html>
<?php
    session_start();
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena']))
    {
        // El usuario acaba de intentar conectarse
        $usuario = $_POST['usuario'];
        $contrasena = sha1($_POST['contrasena']);

        // Conectamos con la Base de Datos y comprobamos la identidad del usuario
        $conexion = new mysqli('localhost','root','','bdlibros');

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

        $consulta = $conexion->query($sql);
        // Si existe un registro, el usuario ha proporcionado las credenciales correctas
        $resultado = $consulta->fetch_assoc();
        if ($resultado != null){
            // Guardamos los datos en la sesión
            $_SESSION['usuario'] = $resultado['usuario'];
            $_SESSION['lectura'] = $resultado['lectura'];
            $_SESSION['escritura'] = $resultado['escritura'];
            $_SESSION['administracion'] = $resultado['administracion'];
            header("Location:pagina.php");
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Introduce tus credenciales: </h1>
    
<?php
if (isset($_SESSION['usuario'])) {
    header("Location:pagina.php");
}else{
    if (isset($usuario)){
?>
        <div id="intro" style= 'color:red'> Datos incorrectos. Prueba de nuevo. </div>

<?php
    } else {
?>
    <div id="intro" style= 'color:blue'> Introduce tus credenciales para entrar: </div>
<?php
    }
?>

    <form action="" method="post">
        <table>
            <tr>
                <td> Usuario:</td>
                <td><input type="text" name="usuario" value = "<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"/> </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['usuario'])) echo "<span style='color:red'> Debes introducir el usuario</span>" ?> </td>
            </tr>
            <tr>
                <td> Constraseña: </td>
                <td><input type="password" name="contrasena" value = "<?php if (isset($_POST['contrasena'])) echo $_POST['contrasena']; ?>"/></td>
                <td><?php if (isset($_POST['enviar']) && empty($_POST['contrasena'])) echo "<span style='color:red'> Debes introducir una contraseña</span>" ?></td>
            </tr>
        </table>
        <input type="submit" value="Entrar" name="Entrar"/>
    </form>
<?php
}
?>
    <div>
        ¿Aún no te has registrado? 
        <a href="registros.php">¡Regístrate!</a>
    </div>
</body>
</html>
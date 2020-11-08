<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Introduce tus credenciales: </h1>

    <h5>Introduce tus credenciales para entrar</h5>

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
        <input type="submit" value="Regístrame" name="enviar"/>
    </form>

    <div> 
        ¿Aún no te has registrado? 
        <a href="regitros.php">¡Regístrate!</a>
    </div>

</body>
</html>
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD 5 Ejercicio 1</title>
</head>
<body>
    <h1>Registrame</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td> Usuario:</td>
                <td><input type="text" name="usuario" value = "<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>"/> </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['usuario'])) echo "<span style='color:red'> Debe introducir el usuario</span>" ?> </td>
            </tr>
            <tr>
                <td> Constraseña: </td>
                <td><input type="password" name="contrasena" value = "<?php if (isset($_POST['contrasena'])) echo $_POST['contrasena']; ?>"/></td>
                <td><?php if (isset($_POST['enviar']) && empty($_POST['contrasena'])) echo "<span style='color:red'> Debe introducir una contraseña</span>" ?></td>
            </tr>
        </table>
        <input type="submit" value="Instroducir libros" name="enviar"/>
    </form>
    
</body>
</html>
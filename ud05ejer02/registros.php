<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

<?php
    $conexion = mysqli_connect("localhost", "root", "");
    $db_nombre = "bdlibros";

    if(mysqli_connect_errno()){
        echo "Existe un problema con la conexión...";
        exit();
    }

    mysqli_select_db($conexion, $db_nombre) or die ("NO encuentro la base de datos.");
    
    if(!empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['contrasena2'])) 
    {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $contrasena_encristada = sha1($contrasena);

        $user = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
        $consulta = $conexion->query($user);

        if($contrasena === $_POST['contrasena2'])
        {
            if($consulta->fetch_assoc() == null){
    
                $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (?,?)";
                $resultado = mysqli_prepare($conexion, $sql);
        
                $ok = mysqli_stmt_bind_param($resultado, "ss", $usuario, $contrasena_encristada);
        
                $ok = mysqli_stmt_execute($resultado);
        
                if (!$ok){
?>
                    <script> 
                    alert("Ha ocurrido un problema en el registro");
                    </script>
<?php
                }else{
?>
                    <script>
                    alert("Usuario regitrado");
                    </script>
<?php
                    
                    echo "<meta http-equiv='refresh' content='0'>";
                    mysqli_stmt_close($resultado);
                }
                mysqli_close($conexion);
                header("Location:login.php");
                
            } else {
?>
                <script> 
                alert("Ya existe dicho usuario");
                </script>
<?php
            }
        }  
    }

?>

    <h1>Registrame</h1>
    <!-- Me está petando el action login -->
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
            <tr>
                <td> Repite constraseña: </td>
                <td><input type="password" name="contrasena2" value = "<?php if (isset($_POST['contrasena2'])) echo $_POST['contrasena2']; ?>"/></td>
                <td><?php if (isset($_POST['enviar']) && empty($_POST['contrasena2']) || @$_POST['contrasena2'] != @$_POST['contrasena']) echo "<span style='color:red'> Revise bien su contraseña</span>" ?></td>
            </tr>
        </table>
        <input type="submit" value="Regístrame" name="enviar"/>
    </form>

</body>
</html>
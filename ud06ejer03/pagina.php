<?php
    session_start();

    if (!isset ($_SESSION['usuario'])){
    header("Location:login.php");
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

require_once("datosConexion.php");
$conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena);

if(mysqli_connect_errno()){
    echo "Existe un problema con la conexión...";
    exit();
}

mysqli_select_db($conexion, $db_nombre) or die ("NO encuentro la base de datos.");
mysqli_set_charset($conexion, "utf8");
echo "¡Bienvenido, ". $_SESSION['usuario'] ."! "; 
    
echo " <br> <a href='logout.php'>Cerrar Sesión</a>";

?>

    <h1>Tabla de libros</h1>

    <form name="input" action="cargar.php" method="post">
        <table id="form">
            <tr>
                <td> Título: </td>
                <td> <input type="text" name="titulo" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_POST['titulo'])) echo $_POST['titulo']; ?>"/> </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['titulo'])) echo "<span style='color:red'> Debe introducir un titulo</span>" ?> </td>
            </tr>
            <tr>
                <td> Autor: </td>
                <td> <input type="text" name="autor" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_POST['autor'])) echo $_POST['autor']; ?>"/> </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['autor'])) echo "<span style='color:red'> Debe introducir un autor</span>" ?> </td>
            </tr>
            <tr>
                <td> Páginas: </td>
                <td><input type="text" name="paginas" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_POST['paginas'])) echo $_POST['paginas']; ?>"/> </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['paginas'])) echo "<span style='color:red'> Debe introducir el número de páginas del libro</span>" ?></td>
            </tr>
            <tr>
                <td> Foto: </td>
                <td><input type="file" name="imagen" accept = "image/*"/> </td>
            </tr>
            <tr>
                <td> <input type="submit" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value="Instroducir libros" name="enviar"/> </td>
            </tr>
        </table>
    </form>

<?php

    $sql = "SELECT id, titulo, autor, paginas, foto, creado FROM libros";
    $registros = mysqli_prepare($conexion, $sql);
    $registros->execute();
    $registros->bind_result($id, $titulo, $autor, $paginas, $imgContenido, $fecha);


    echo "<br><div class='tabla'>
    <table border=2>
        <tr> 
            <td> ID </td> 
            <td> NOMBRE </td> 
            <td> TITULO </td>
            <td> PÁGINAS </td>
            <td> FOTO </td>
            <td> CREADO </td>";
            if($_SESSION['administracion'] == 1){
                echo "<td>ELIMINAR</td>";
            }
            echo "</tr>";

        while ($registros->fetch())
        {
            echo "<tr><td>" . $id . " </td><td>" . $titulo . " </td><td>". $autor ."</td><td> ". $paginas . "</td><td><img src=img". $imgContenido . "></td><td>". $fecha . "</td>";
            if($_SESSION['administracion'] == 1){
                echo "<td><a href='eliminar.php?id=$id'>Eliminar</a></td>";
            }
            echo "</tr>";
        }

        echo "</table>";
                    


        //IMPORTANTE: Cerramos el objeto $resultado
        mysqli_stmt_close($registros);
    
    // cerramos conexión
    mysqli_close($conexion);

?>

</body>
</html>
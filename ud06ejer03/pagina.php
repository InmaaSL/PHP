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

    if(!empty($_GET['autor']) && !empty($_GET['titulo']) && !empty($_GET['paginas'])) 
    {

        if(isset($_POST["submit"])){
            //Devolverá las dimensiones de un fichero.
            $revisar = getimagesize($_FILES["image"]["tmp_name"]);

            //Comprobamos si el usuario ha seleccionado alguna imagen
            if($revisar !== false){
                $imagen = $_FILES["image"]["tmp_name"];
                //file_get_contents: Devuelve un fichero completo a una cadena
                $imgContenido = addslashes(file_get_contents($imagen));
            }else{
            echo "Por favor selecciona imagen a subir.";
            }
        }
        

        $titulo = $_GET['titulo'];
        $autor = $_GET['autor'];
        $paginas = $_GET['paginas'];
        $fecha = date("Y-m-d H:i:s");

        $sql = "INSERT INTO libros (titulo, autor, paginas, foto, creado) VALUES (?,?,?,?,?)";
        $resultado = $conexion->prepare($sql);
        $resultado->bind_param("ssibs", $titulo, $autor, $paginas, $imgContenido, $fecha);
        $resultado->execute();
        
        if($resultado){
            // echo "<meta http-equiv='refresh' content='0'>";
            mysqli_stmt_close($resultado);
            header("Location:pagina.php");
        }
        
    }
?>

    <h1>Tabla de libros</h1>

    <form name="input" action="" method="get">
        <table id="form">
            <tr>
                <td> Título: </td>
                <td> <input type="text" name="titulo" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_GET['titulo'])) echo $_GET['titulo']; ?>"/> </td>
                <td> <?php if (isset($_GET['enviar']) && empty($_GET['titulo'])) echo "<span style='color:red'> Debe introducir un titulo</span>" ?> </td>
            </tr>
            <tr>
                <td> Autor: </td>
                <td> <input type="text" name="autor" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_GET['autor'])) echo $_GET['autor']; ?>"/> </td>
                <td> <?php if (isset($_GET['enviar']) && empty($_GET['autor'])) echo "<span style='color:red'> Debe introducir un autor</span>" ?> </td>
            </tr>
            <tr>
                <td> Páginas: </td>
                <td><input type="text" name="paginas" 
                <?php if ($_SESSION['lectura'] === 1){ echo "disabled";}?>
                value = "<?php if (isset($_GET['paginas'])) echo $_GET['paginas']; ?>"/> </td>
                <td> <?php if (isset($_GET['enviar']) && empty($_GET['paginas'])) echo "<span style='color:red'> Debe introducir el número de páginas del libro</span>" ?></td>
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
            echo "<tr><td>" . $id . " </td><td>" . $titulo . " </td><td>". $autor ."</td><td> ". $paginas . "</td><td><img src=img". . "></td><td>". $fecha . "</td>";
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
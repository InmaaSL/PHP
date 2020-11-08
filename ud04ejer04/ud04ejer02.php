<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
    <title>UD 4 Ejercicio 2</title>
</head>
<body>
    
    <?php

        require_once('Modelo/clase_consulta.php');

        //Comenzamos insertando los libros:
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();

        if(!empty($_POST['id']) && !empty($_POST['autor']) && !empty($_POST['titulo']) && !empty($_POST['paginas'])) 
        {
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $paginas = $_POST['paginas'];
            
        }
    ?> 

        <form name="input" action="" method="post">
            <table id="form">
                <tr>
                    <td>
                        Id:
                    </td>
                    <td>
                        <input type="text" name="id" value = "<?php if (isset($_POST['id'])) echo $_POST['id']; ?>"/>
                    </td>
                    <td>
                        <?php if (isset($_POST['enviar']) && empty($_POST['id'])) echo "<span style='color:red'> Debe introducir el id</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Título:
                    </td>
                    <td>
                        <input type="text" name="titulo" value = "<?php if (isset($_POST['titulo'])) echo $_POST['titulo']; ?>"/>
                    </td>
                    <td>
                        <?php if (isset($_POST['enviar']) && empty($_POST['titulo'])) echo "<span style='color:red'> Debe introducir un titulo</span>" ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Autor:
                    </td>
                    <td>
                    <input type="text" name="autor" value = "<?php if (isset($_POST['autor'])) echo $_POST['autor']; ?>"/>
                    </td>
                    <td>
                        <?php if (isset($_POST['enviar']) && empty($_POST['autor'])) echo "<span style='color:red'> Debe introducir un autor</span>" ?>                    
                    </td>
                </tr>
                <tr>
                    <td>
                        Páginas:
                    </td>
                    <td>
                        <input type="text" name="paginas" value = "<?php if (isset($_POST['paginas'])) echo $_POST['paginas']; ?>"/>    
                    </td>
                    <td>
                        <?php if (isset($_POST['enviar']) && empty($_POST['paginas'])) echo "<span style='color:red'> Debe introducir el número de páginas del libro</span>" ?>                
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Instroducir libros" name="enviar"/>
                    </td>
                </tr>
            </table>
    </form>


    <?php

        echo "<div class='tabla'>
        <table border=2>
        <tr> 
        <td> ID </td> 
        <td> NOMBRE </td> 
        <td> TITULO </td>
        <td> PÁGINAS </td>
        </tr>";

        $insertar = $conexion->cargarLibros();

        echo "</table>";

    ?>


</body>
</html>
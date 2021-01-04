<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opcion 2</title>
</head>
<body>
<?php
    ini_set('display_errors', 1);     
    ini_set('display_startup_errors',1);     
    error_reporting(E_ALL);

    if (!empty($_POST["nomcompleto"]) && !empty($_POST["genero"]) && !empty($_POST["horario"]) && !empty($_POST["animales"]) && !empty($_POST["otros"])){

        ?> 
    <h2>Datos del usuario</h2>
<?php
        $nombre = $_POST['nomcompleto'];
        $genero = $_POST['genero'];
        $horario = $_POST["horario"];
        $animales = $_POST['animales'];
        $otros = $_POST['otros'];
        
        echo("El nombre del cliente es: $nombre. Su género es $genero. El horario que le interesa para la consulta es: ");
        
        foreach ($horario as $tiempo)
        {
            echo $tiempo . ' - ';
        } 
        
        echo(" <br>El horario de atencion que le interesa para atender a su mascota (");
        
        foreach ($animales as $animal){
            echo $animal . ' - ';
        }
        echo(") Es importante tener en cuenta su comentario: $otros");

        ?>
        </br>
        <a href="ejer1.php"> Volver al formulario</a>

        <?php
        } else {

        ?>

    <h1>FORMULARIO EJERCICIO 1:</h1>

    <form action="" method="post">
        <table>
            <tr> 
                <td><label for="nomcompleto">Nombre completo:</label> </td> 
                <td><input type="text" name="nomcompleto" value="<?php if(isset($_POST['nomcompleto'])) echo $_POST['nomcompleto'];?>"/></td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['nomcompleto'])) echo "<span style='color:red'> Debe introducir un nombre, por favor </span>"; ?></td>
            </tr>
            <tr>
                <td><label for="genero"> Género: </label></td>
                <td><input type="radio" name="genero" value="hombre" <?php if(isset($_POST['genero'])) echo 'checked';?>> <label for="genero ">Masculino</label>  
                <input type="radio" name="genero" value="mujer"> <label for="genero">Femenino</label></td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['genero'])) echo "<span style='color:red'> Debe seleccionar un género, por favor </span>"; ?> </td>
            </tr>
            <tr>
                <td><label for="horario">Horario:</label></td>
                <td> <input type="checkbox" name="horario[]" value="mati" <?php if(isset($_POST['horario']) && in_array("mati",$_POST['horario'])) echo "checked = 'checked'"; ?> /> 
                <label for="mati"> Mati </label> 
                <input type="checkbox" name="horario[]" value="vesprada" <?php if(isset($_POST['horario']) && in_array("vesprada",$_POST['horario'])) echo "checked = 'checked'"; ?> /> 
                <label for="vesprada"> Vesprada </label> 
                <input type="checkbox" name="horario[]" value="nit" <?php if(isset($_POST['horario']) && in_array("nit",$_POST['horario'])) echo "checked = 'checked'"; ?> /> 
                <label for="nit"> Nit </label> </td>
                <td>
                <?php if (isset($_POST['enviar']) && empty($_POST['horario'])) echo "<span style='color:red'> Debe escoger al menos un horario</span>";?>
                </td>
            </tr>
            <tr>
                <td><label for="animales">Seleccione al menos un animal: </label> </td>
                <td>    <select multiple size="4" name="animales[]">
                        <option value="perros" <?php if(isset($_POST['animales']) && in_array("perros",$_POST['animales'])) echo "selected"; ?>> <label for="animales" >Perros</label> </option>
                        <option value="gatos" <?php if(isset($_POST['animales']) && in_array("gatos",$_POST['animales'])) echo "selected"; ?>> <label for="animales" >Gatos</label> </option>
                        <option value="roedores" <?php if(isset($_POST['animales']) && in_array("roedores",$_POST['animales'])) echo "selected"; ?>> <label for="animales" >Roedores</label> </option>
                        <option value="reptiles" <?php if(isset($_POST['animales']) && in_array("reptiles",$_POST['animales'])) echo "selected"; ?>> <label for="animales" >Reptiles</label> </option>
                        </select>
                </td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['animales'])) echo "<span style='color:red'> Debe seleccionar un animal, por favor </span>"; ?> </td>

            </tr>
            <tr>
                <td><label for="otros">Otros: </label> </td>
                <td><textarea cols="60" rows="4" name="otros" value="<?php if(isset($_POST['otros'])) echo $_POST['otros'];?>"></textarea></td>
                <td> <?php if (isset($_POST['enviar']) && empty($_POST['otros'])) echo "<span style='color:red'> Debe comentar algo :) </span>"; ?> </td>

            </tr>
            <tr>
                <td><button type="submit" name="enviar">Enviar</button></td>
            </tr>
            
        </table>
    </form>

<?php
        }
?>
</body>
</html>
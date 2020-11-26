<?php
    require_once("datosConexion.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena);
    
    if(mysqli_connect_errno()){
        echo "Existe un problema con la conexión...";
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die ("NO encuentro la base de datos.");
    mysqli_set_charset($conexion, "utf8");

    if(!empty($_POST['autor']) && !empty($_POST['titulo']) && !empty($_POST['paginas'])) 
    {
        // if(isset($_POST["submit"])){
            //Devolverá las dimensiones de un fichero.
            $revisar = getimagesize($_FILES["imagen"]["tmp_name"]);

            //Comprobamos si el usuario ha seleccionado alguna imagen
            if($revisar !== false){
                $imagen = $_FILES["imagen"]["tmp_name"];
                //file_get_contents: Devuelve un fichero completo a una cadena
                $imgContenido = addslashes(file_get_contents($imagen));
            }else{
            echo "Por favor selecciona imagen a subir.";
            }
        // }

        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $paginas = $_POST['paginas'];
        $fecha = date("Y-m-d H:i:s");

        $sql = "INSERT INTO libros (titulo, autor, paginas, foto, creado) VALUES (?,?,?,?,?)";
        $resultado = $conexion->prepare($sql);
        $resultado->bind_param("ssibs", $titulo, $autor, $paginas, $imgContenido, $fecha);
        $resultado->execute();
        
        if($resultado){
            //echo "<meta http-equiv='refresh' content='0'>";
            mysqli_stmt_close($resultado);
            header("Location:pagina.php");
        }

    }
?>
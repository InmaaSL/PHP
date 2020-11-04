<?php

require_once("clase_conexion.php");

class Consulta
{
    public function insertarLibros($id,$titulo,$autor,$paginas)
    {
        $conexion= new Conexion();
        $pdoObject = $conexion->getConexion();

        $sql = "INSERT INTO libros (id, titulo, categoria, precio) VALUES (:id, :titulo, :autor, :paginas)";
        $sentencia = $pdoObject->prepare($sql);

        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':autor', $autor);
        $sentencia->bindParam(':paginas', $paginas);

        if (@$sentencia->execute()) {
            $mensaje = "Registro creado correctamente.";
        } else {
            $mensaje = "Fallo al crear el registro.";
        }
        return $mensaje;
    }

    public function cargarLibros()
    {
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();

        $sql = "SELECT * FROM libros";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();

        while ($fila = $resultado->fetch())
        {
                echo "<tr><td>" . $fila['id'] . "</td><td>" . $fila['titulo'] . "</td><td>" . $fila['autor'] . "</td> <td>" . $fila['paginas'] . "</td> </tr>";
        }
        

    }
}
?>

<?php
class Empleado
{
    private $dni;
    private $nombre;
    private $contratos = [];

    public function __construct($dni, $nombre, $contratos)
    {
        $this->DNI = $dni;
        $this->Nombre = $nombre;
        $this->Contratos = $contratos;
    }

    // public function __construct($row)
    // {
    //     $this->dni = $row['DNI'];
    //     $this->nombre = $row['Nombre'];
    //     $this->contratos = $row['Contratos'];
    // }

//Creamos los getteers y los setters: 
public function __set($name, $valor){
    switch($name){
        case 'DNI':
            $this->DNI = $valor;
        break;
        case 'Nombre':
            $this->nombre = $valor;
        break;
        case 'Contratos':
            $this->contratos = $valor;
    }
}

public function __get($name){
    switch($name){
        case 'DNI':
            return $this->DNI;
        case 'nombre':
            return $this->nombre;
        case 'contratos':
            return $this->contratos;
    }
}

public function __toString() {
    return sprintf("DNI: %s, Nombre %s, Contratos: %s", $this->DNI, $this->nombre, $this->contratos);
    }





}

?>
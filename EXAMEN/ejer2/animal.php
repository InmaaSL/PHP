<?php
class Animal
{
    private $nombre;
    private $vacunas = [];
    private $veterinario;

//Creamos los getteers y los setters: 
public function __set($name, $valor){
    switch($name){
        case 'nombre':
            $this->nombre = $valor;
        break;
        case 'vacunas':
            $this->vacunas = $valor;
        break;
        case 'veterinario':
            $this->veterinario = $valor;
    }
}

public function __get($name){
    switch($name){
        case 'nombre':
            return $this->nombre;
        case 'vacunas':
            return $this->vacunas;
        case 'veterinario':
            return $this->veterinario;
    }
}

public function __toString() {
    return sprintf("Nombre: %s, Vacunas %s, Veterinario: %s", $this->nombre, $this->vacunas, $this->veterinario);
    }

public function eliminaVacuna(){
    unset($vacunas);
}

public function __clone(){

    $this->nombre = "clone $this->nombre";

    foreach($this->vacunas as $valor){            
        $valor = clone $valor;
    }
    $this->veterinario = clone $this->veterinario;

}

//Con este no da el error:
// public function __clone(){

//     $this->nombre = "P3rrito";

//     foreach($this->vacunas as $valor){            
//         $valor = "Holi";
//     }
//     $this->veterinario = "fulano";

// }

}

?>
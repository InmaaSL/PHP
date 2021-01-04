<?php
    require_once("animal.php");
    require_once("empleado.php");

    $animal1 = new Animal();
    $empleado = new Empleado("75168767Y", "Inma Serano",['001', '002', '003', '004']);

    $animal1->nombre = "Estrelli";
    $animal1->vacunas = ['Parvo', 'Hepatitis', 'Rabia'];
    $animal1->veterinario = "Conce Linde";

    echo "Nombre: ".$animal1->__get('nombre') . "<br> Vacunas: ";
    foreach($animal1->__get('vacunas') as $Vacunas){
        echo $Vacunas . " ";
    }
    //echo $animal1->__get('vacunas');
    echo "<br>Veterinario: ". $animal1->__get('veterinario');

    $copiaAnimal = clone $animal1;

    $copiaAnimal->nombre = "Lunita";
    $copiaAnimal->eliminaVacuna;
    $copiaAnimal->veterinario = $empleado->nombre;

    echo $copiaAnimal->__toString;



?>
<?php 
// carga del modelo y los controladores 
require_once __DIR__ . '/../app/Config.php'; 
require_once __DIR__ . '/../app/Model.php'; 
require_once __DIR__ . '/../app/Controller.php';

// RUTAS
// Este array asociativo se usa para saber qué acción (función del controlador) se debe disparar
$map = array( 
	'inicio' => array('controller' =>'Controller', 'action' => 'inicio'), 
	'listar' => array('controller' =>'Controller', 'action' => 'listar'), 
	'listarOrdenados' => array('controller' => 'Controller', 'action' => 'listarOrdenados'),
	'insertar' => array('controller' =>'Controller', 'action' => 'insertar'), 
    'buscarPorNombre'=>array('controller' =>'Controller', 'action' => 'buscarPorNombre'),
    'buscarPorEnergia'=>array('controller' =>'Controller', 'action' => 'buscarPorEnergia'), 
	'ver' => array('controller' =>'Controller', 'action' => 'ver'),
	'eliminarPorNombre' => array('controller' =>'Controller', 'action' => 'eliminarPorNombre') 
);

// Parseo de la ruta 
if (isset($_GET['ruta'])) 
{ 
	if (isset($map[$_GET['ruta']])) 
	{ 
		$ruta = $_GET['ruta']; 
	} 
	else 
	{ 
		//Este error saltará si no está definida la ruta arriba en el array asociativo
		header('Status: 404 Not Found'); 
		echo '<html><body><p style="color:red"><b>ERROR: No existe la ruta '.$_GET['ruta'].'</b></p></body></html>'; 
		exit; 
	} 
}
else 
{ 
	$ruta = 'inicio'; 
}

$controlador = $map[$ruta];

// Ejecucion del controlador asociado a la ruta 
if(method_exists($controlador['controller'], $controlador['action'])) 
{ 
	call_user_func(array(new $controlador['controller'], $controlador['action'])); 
}
else 
{
	//Este error saltará si no está definida la función asociada a la ruta en Controller.php
	header('Status: 404 Not Found'); 
	echo '<html><body><p style="color:red"><b>ERROR: El controlador '.$controlador['controller'].'->'.$controlador['action']. 'no existe</b></p></body></html>'; 
}
?>
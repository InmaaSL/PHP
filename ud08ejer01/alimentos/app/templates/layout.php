<!doctype html> 
<html lang="es"> 
	<head> 
		<meta charset="utf-8"> 
		<title>Página de Alimentos</title> 
		<link rel="stylesheet" href="<?php echo 'css/'.Config::$mvc_css ?>"/> 
	</head> 
	<body> 
		<header> 
			<h1>Página de alimentos</h1> 
		</header> 
		<nav> 
			<ul> 
				<li><a href="index.php?ruta=inicio">inicio</a></li> 
				<li><a href="index.php?ruta=listar">ver alimentos</a></li> 
				<li><a href="index.php?ruta=insertar">insertar alimento</a></li> 
				<li><a href="index.php?ruta=buscarPorNombre">buscar por nombre</a></li> 
				<li><a href="index.php?ruta=buscarPorEnergia">buscar por energía</a></li>				
			</ul>
		</nav> 
		<main> 
			<?php echo $contenido; ?> 
		</main> 
		<footer> 
			- Desarrollo Web en Entorno Servidor - 
		</footer> 
	</body> 
</html>
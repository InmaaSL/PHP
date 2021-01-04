<?php ob_start() ?>

	<h2>Inicio</h2>	
	<time> Fecha: <?php echo $params['fecha'] ?> </time> 
	<p>Bienvenido a la aplicación de alimentos</p> 

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>

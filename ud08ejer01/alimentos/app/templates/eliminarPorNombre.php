<?php ob_start() ?>

	<h2>Eliminar por nombre</h2>

	<?php if(isset($params['mensaje'])) :?> 
		<div class="mensaje"><?php echo $params['mensaje'] ?></div> 
	<?php endif; ?>

	<form name="formBusqueda" action="index.php?ruta=eliminarPorNombre" method="POST">
		<label for="nombre">nombre del alimento que quieres eliminar:</label> 
			<input type="text" name="nombre" id="nombre" value="<?php echo $params['nombre'] ?>" /> 
		<span>(tiene que ser exacto)</span> 
		<input type="submit" value="eliminar" name="eliminar"/> 
	</form>
	


<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
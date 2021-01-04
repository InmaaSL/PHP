<?php ob_start() ?>

	<h2>Buscar por energía</h2>
	<form name="formBusqueda" action="index.php?ruta=buscarPorEnergia" method="POST">
		<label for="energia">energía alimento:</label> 
			<input type="text" name="energia" id="energia" value="<?php echo $params['energia'] ?>" /> 
		<input type="submit" value="buscar" /> 
	</form>
	
	<?php if (count($params['resultado'])>0): ?> 
		<table> 
			<tr> 
				<th>alimento (por 100g)</th> 
				<th>energia (Kcal)</th> 
				<th>grasa (g)</th> 
			</tr> 
			<?php foreach ($params['resultado'] as $alimento) : ?> 
			<tr> 
				<td><a href="index.php?ruta=ver&id=<?php echo $alimento['id'] ?>"><?php echo $alimento['nombre'] ?></a></td> 
				<td><?php echo $alimento['energia'] ?></td> 
				<td><?php echo $alimento['grasatotal'] ?></td> 
			</tr> 
			<?php endforeach; ?> 
		</table> 
	<?php endif; ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
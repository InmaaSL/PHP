<?php ob_start() ?>
	
	<h2>Ver alimentos</h2>
	<table> 
		<tr> 
			<th>alimento (por 100g)</th> 
			<th>energia (Kcal)</th> 
			<th>grasa (g)</th> 
		</tr> 
		<?php foreach ($params['alimentos'] as $alimento) : ?> 
		<tr> 
			<td><a href="index.php?ruta=ver&id=<?php echo $alimento['id']?>">
				<?php echo $alimento['nombre'] ?></a></td> 
			<td><?php echo $alimento['energia']?></td> 
			<td><?php echo $alimento['grasatotal']?></td> 
		</tr> 
		<?php endforeach; ?> 
	</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>

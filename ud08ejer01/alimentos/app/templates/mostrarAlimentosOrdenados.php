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
    <form name="formOrdenar" action="index.php?ruta=listarOrdenados" method="POST">
        <label for="ordenarPor"> Ordena por
            <select name="ordenarPor">
                <option  <?php if(isset($_POST['ordenarPor']) && $_POST['ordenarPor'] == 'nombre') echo "selected"; ?> value="nombre">nombre</option>
                <option  <?php if(isset($_POST['ordenarPor']) && $_POST['ordenarPor'] == 'energia') echo "selected"; ?> value="energia"> energía</option>
                <option  <?php if(isset($_POST['ordenarPor']) && $_POST['ordenarPor'] == 'grasa') echo "selected"; ?> value="grasa">grasa</option>
            </select>
            en sentido 
            <select name="sentido">
                <option <?php if(isset($_POST['sentido']) && $_POST['sentido'] == 'asc') echo "selected"; ?> value="asc"> ascendente </option>
                <option <?php if(isset($_POST['sentido']) && $_POST['sentido'] == 'desc') echo "selected"; ?> value="desc"> descendente </option>
            </select>
        </label>
        <input type="submit" value="Ordenar" name="ordenar" /> 
    </form>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>


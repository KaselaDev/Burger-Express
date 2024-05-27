<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso Producto</title>
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>
<body>
	<section class="menu">
		<form action="../Controladores/agregar_producto.php" class="form">
			<h2 style="text-align:center;">Ingreso Producto</h2>
			<label for="ing_nom">Nombre</label>
			<input type="text" name="ing_nom" id="ing_nom" required>
			<p>
			<label for="ing_des">Descripcion</label>
			<input type="text" name="ing_des" id="ing_des" required>
			<p>
			<label for="ing_pre">Precio</label>
			<input type="number" name="ing_pre" id="ing_pre" min="0" required>
			<p>
			<input type="submit" class="boton-submit" value="Agregar" >
		</form>
	</section>
</body>
</html>

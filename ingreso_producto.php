<!DOCTYPE html>
<html>
<head>
	<title>Ingreso Producto</title>
	<style type="text/css">
		section{
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100%;
		}

		form{
			display: inline-grid;
			width: 300px;
    		line-height: 40px;
		}

		input{
			height: 30px;
		}
		
		.boton-submit{
			margin: 20px 0;
		}
	</style>
</head>
<body>
	<section>
		<form action="agregar_producto.php">
			<h2>Ingreso Producto</h2>
			<label for="ing_nom">Nombre</label>
			<input type="text" name="ing_nom" id="ing_nom" required>

			<label for="ing_des">Descripcion</label>
			<input type="text" name="ing_des" id="ing_des" required>

			<label for="ing_pre">Precio</label>
			<input type="number" name="ing_pre" id="ing_pre" min="0" required>

			<input type="submit" class="boton-submit" value="Agregar" >
		</form>
	</section>
</body>
</html>

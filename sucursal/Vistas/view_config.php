<?php 
	include_once 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configuracion</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
	<section>
		<div style="display: flex;justify-content: center;">
			<form action="../Controladores/configuracion.php" class="form" enctype="multipart/form-data" method="POST">
				<h1 style="margin: 10px 0;">Configuración</h1>
				<hr>
				<div style="line-height: 50px">
					<img src="data:image/jpg;base64,<?= $info[0]['logo'] ?>" id="img" width="200" height="200">
					<input type="file" name="logo" id="foto" accept="image/*">
					<p>
					<label for="foto" class="boton-file">Cambiar Logo</label>
				</div>
				<div style="margin:10px 0;">
					<label for="N">Nombre</label><br>
					<input type="text" name="titulo" id="N" value="<?= $info[0]['nombre'] ?>" placeholder="<?= $info[0]['nombre'] ?>" required>	
				</div>

				<button type="submit" class="buton-carrito-r" >
					Guardar Cambios
				</button>
			</form>	
		</div>
		
	</section>
	<script src="JavaScript/config.js"></script>
</body>
</html>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />	
	<link rel="stylesheet" type="text/css" href="./styles/style.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Listado</title>
	<script src="./JavaScript/script.js"></script>
</head>
<body>
	<section class="menu">
		<?php 
			require '../Modelos/consultas.php';

			$datos=view_tabla("productos");
			echo"<table id='table'border='1'><thead><th>Id Productos</th><th>Nombre</th><th>Descripcion</th><th>Precio</th> <th>Editar</th> <th>Eliminar</th></thead>";
			
			foreach($datos as $key){
				if ($key['Id_producto']%2 != 0) {
					echo"<tr>";
				}
				else{
					echo"<tr class='gray'>";
				}
				echo "<td>".$key['Id_producto']."</td><td>".$key['Nombre']."</td><td>".$key['Descripcion']."</td><td>$".$key['Costo']."</td> ";
				echo '<td><a href="listado_producto.php?ubi='.$key['Id_producto'].'" style="background: green;"<span class="material-symbols-outlined">edit</span></a></td> 
				<td><a onclick="eliminar('.$key['Id_producto'].')" style="background: red;cursor:pointer;"<span class="material-symbols-outlined">delete</span></a></td></tr>';
			}
		 ?>	
	</section>
</body>
</html>
<?php 
	if (isset($_GET['ubi'])) {
		foreach($datos as $el){
			if ($el['Id_producto']==$_GET['ubi']) {
				$cont='<form action="../Controladores/modificar_producto.php">
					Id Producto<input type="text" name="ubi_Id" value="'.$el['Id_producto'].'" class="swal2-input" readonly>
					Nombre<input type="text" name="nuev_nombre" value="'.$el['Nombre'].'" class="swal2-input" required>
					Descripcion<input type="text" name="nuev_descrip" value="'.$el['Descripcion'].'" class="swal2-input" required>
					Precio<input type="number" name="nuev_precio" value="'.$el['Costo'].'" class="swal2-input" required>
					<input type="submit" value="Enviar">
					</form>';
			?>
				<script type="text/javascript">
					Swal.fire({
						title:"Editar Producto",
						html: `<?= $cont ?>`,
						showConfirmButton: false,
						showCloseButton: true,
					})
				</script>

			<?php
			}	
		}
	}

 ?>

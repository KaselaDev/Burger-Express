<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<style type="text/css">
		body{
			font-family: 'Arial';
		}

		table{
			border-collapse: collapse;
			border-color:black;
			text-align:center;
		}
		
		th,td{
			padding: 10px 20px;
			border-left: none;
			border-right: none;
		}

		th{
			background: cadetblue;
		}

		.gray{
			background: #D6D6E0;
		}

		span{
			cursor: pointer;
			border-radius: 4px;
		}

		input[type="submit"]{
			width: 50%;
			font-size: 1rem;
			padding: 10px;
		}
		
	</style>
	<script type="text/javascript">
		function eliminar(ubi) {
    		Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA ELEGIR INGREDIENTES
                title: "Seguro",
                text: "Seguro quieres eliminar el producto?",
                icon: "warning",
                showDenyButton: true,
				confirmButtonText: "Realizar",
				denyButtonText: `Cancelar`,
                allowOutsideClick: true,
                showCloseButton: true,
            })//MUESTRA UNA VENTANA EMERGENTE PARA ELEGIR INGREDIENTES
            .then((result) => {//PARA SABER LA RESPUESTA DE Swal.fire
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {//SI DESAE CANCELAR
				    Swal.fire({
				    	title: "Se ha eliminado el producto!", 
				    	icon: "success",
				    	showConfirmButton: false,
				    	timer: 1000,
				    }).then((res)=>{
				    	if (res) {//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				    		window.location.assign(`eliminar_producto.php?ubi=${ubi}`);
				    	}//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				    });
				}//SI DESA CANCELAR
			});//PARA SABER LA RESPUESTA DE Swal.fire
    	}

		function modificar(ubi){
			window.location.assign(`listado_producto.php?ubi=${ubi}`);
        }
	</script>
</head>
<body>
	<?php 
		require 'conexion.php';

		$consulta=$conexion->prepare("SELECT * FROM productos");// prepara la consulta SQL
		$consulta->execute();// ejecuta la consulta SQL
		$datos=$consulta->fetchAll(PDO::FETCH_ASSOC);// genera un diccionario con datos 

		$iconDel='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
		  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
		</svg>';
		$iconEdi='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
		  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
		</svg>';
		$c=0;
	 	echo "<table border='1'>";
	 	echo "<tr> <th>Id Producto</th> <th>Nombre</th> <th>Descripcion</th> <th>Precio</th> <th>Editar</th> <th>Eliminar</th> </tr>";
	 	foreach ($datos as $key) {
			if(($c%2)!=0){
				echo "<tr class='gray'>";
			}
			else{
				echo "<tr>";
			}
			$c++;
	 		echo " 
			 <td>".$key['Id_producto']."</td> 
			 <td>".$key['Nombre']."</td> 
			 <td>".$key['Descripcion']."</td> 
			 <td>$".$key['Costo']."</td>
			 <td><span class='material-symbols-outlined' onclick='modificar(".$key['Id_producto'].")' style='background: #099122;'>edit</span></td>
			 <td><span class='material-symbols-outlined' onclick='eliminar(".$key['Id_producto'].")' style='background: #F33627;'>delete</span></td> 
			</tr>";
	 	}
	 	echo "</table>";
	 ?>
	 <a href="enlaces.php">Volver</a>
</body>
</html>
<?php
	if(isset($_GET['ubi'])){
		foreach($datos as $el){
			if ($el['Id_producto']==$_GET['ubi']) {
				$cont='<form action="modificar_producto.php">
					Nombre
					<br>
					<input type="text" name="nuev_nom" value="'.$el['Nombre'].'" class="swal2-input" required>
					<p>
					Descripcion
					<br>
					<input type="text" name="nuev_des" value="'.$el['Descripcion'].'" class="swal2-input" required>
					<p>
					Precio
					<br>
					<input type="number" name="nuev_pre" value="'.$el['Costo'].'" min="0" class="swal2-input" required>
					<p>
					<input type="hidden" name="ubi" value="'.$_GET['ubi'].'">
					<input type="submit" value="Enviar">
					</form>';
			?>
				<script type="text/javascript">
					Swal.fire({
						title:"Editar Producto",
						html: `<?= $cont ?>`,
						showConfirmButton: false,
						showCloseButton: true,
						footer: "Esta informacion es importante",
					})
				</script>

			<?php
			}
		
		}
	}
?>
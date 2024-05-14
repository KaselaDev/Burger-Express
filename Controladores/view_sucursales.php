<!DOCTYPE html>
<html>
<head>
	<title>View sucursales</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../Vistas/styles/styles.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<script src="../Vistas/JavaScript/view_sucursales.js
"></script>
<nav class="nav">
	<h2>Titulo</h2>
	<ul class="nav-menu">
		<li class="nav-menu-item"><a href="../Vistas/index.php">Inicio</a></li>
		<li class="nav-menu-item"><a href="pedido.php">k</a></li>
		<li class="nav-menu-item"><a href="../Vistas/select.php">Estadisticas</a></li>
	</ul>
</nav>
</html>
<?php
	require'../Modelos/consultas.php';
	echo"<table id='table'border='1'><thead><th>Cod. Sucursal</th><th>Direccion</th><th>Capacidad</th><th>Fecha de alta</th><th>Empleado a cargo</th><th>Cantidad de empleados</th><th>Modificar</th><th>Eliminar</th></thead><tbody>";
	if(isset($_GET['mod'])){
		$cod = $_GET['codigo'];
		$datos=search($cod);
		$a="";
		foreach ($datos as $elemento) {
			$a=$elemento['Cod_sucursal'];
			$a=$a.",".'"'.$elemento['Direccion'].'"';
			$a=$a.",".$elemento['Capacidad'];
			$a=$a.",".'"'.$elemento['Cod_supervisor'].'"';
			$a=$a.",".'"'.$elemento['Fecha'].'"';
			$a=$a.",".$elemento['Cant_empleados'];

		}
		echo"<script>modificar(".$a.")</script>";		
	}
		$datos=view_sucursales();
		if(empty($datos)){
			echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr>';
			echo'<script type="text/javascript">
					Swal.fire({
	  					icon: "question",
	 					title: "No hay sucursales registradas",
	  					text: "Desea ingresar una?",
	  					footer: "",
					}).then((result) => {
    				if (result.isConfirmed) {
						add()
					}});
				</script>';
		}
		else{
		
		$c=0;
		foreach($datos as $elemento){
			$c++;
			if($c%2==0){
				echo"<tr class='gray'>";
			}
			else{
				echo"<tr class='white'>";

			}
			echo"<td>".$elemento['Cod_sucursal']."</td><td>".$elemento['Direccion']."</td><td>".$elemento['Capacidad']."</td><td>".$elemento['Fecha']."</td><td>".$elemento['Cod_supervisor']."</td><td>".$elemento['Cant_empleados']."</td>";
			echo'<td><a href="view_sucursales.php?mod=true&codigo='.$elemento['Cod_sucursal'].'"><span class="material-symbols-outlined" >edit</span></a></td>
                                    <td><span onclick="eliminar('.$elemento['Cod_sucursal'].')" class="material-symbols-outlined">delete</span></td></tr>';
            
		}
		echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr></tbody></table>';
		}
	
?>
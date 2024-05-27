<!DOCTYPE html>
<html>
<head>
	<title>View sucursales</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles/styles.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<script src="JavaScript/view_empleados.js
"></script>
</html>
<?php
	include'header.php';
	require'../Modelos/consultas.php';
	echo"<table id='table'border='1'><thead><th>Id_empleado</th><th>DNI</th><th>Nombre</th><th>Apellido</th><th>Telefono</th><th>Direccion</th><th>Fecha ing.</th><th>Fecha nac.</th><th>Puesto</th><th>Sueldo</th><th>Modificar</th><th>Eliminar</th></thead><tbody>";
	if(isset($_GET['mod'])){
		$cod = $_GET['codigo'];
		echo($cod);
		$cons = "WHERE `id_empleado` = '$cod'";
		$datos=getEmpleados($cons);
		foreach ($datos as $elemento) {
		$a=$cod;
			$a.=','.$elemento['DNI'];
			$a.=',"'.$elemento['Nombre'].'"';
			$a.=',"'.$elemento['Apellido'].'"';
			$a.=','.$elemento['Telefono'];
			$a.=',"'.$elemento['Direccion'].'"';
			$a.=',"'.$elemento['Fnac'].'"';
			$a.=',"'.$elemento['Puesto'].'"';
			$a.=',"'.$elemento['Sueldo'].'"';

		}
		echo"<script>modificar(".$a.")</script>";		
	}
		$datos=getEmpleados();
		if(empty($datos)){
			echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr>';
			echo'<script type="text/javascript">
					Swal.fire({
	  					icon: "question",
	 					title: "No hay empleados registrados",
	  					text: "Desea ingresar uno?",
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
			echo"<td>".$elemento['id_empleado']."</td><td>".$elemento['DNI']."</td><td>".$elemento['Nombre']."</td><td>".$elemento['Apellido']."</td><td>".$elemento['Telefono']."</td><td>".$elemento['Direccion']."</td><td>".$elemento['Ingreso']."</td><td>".$elemento['Fnac']."</td><td>".$elemento['Puesto']."</td><td>".$elemento['Sueldo']."</td>";
			echo'<td><a href="view_empleados.php?mod=true&codigo='.$elemento['id_empleado'].'"><span class="material-symbols-outlined" >edit</span></a></td>
                                    <td><span onclick="eliminar('.$elemento['id_empleado'].')" class="material-symbols-outlined">delete</span></td></tr>';
            
		}
		echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr></tbody></table>';
		}
	
?>
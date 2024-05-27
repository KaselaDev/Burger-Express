<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
<?php
	include'header.php';
	require'../Modelos/consultas.php';
	$DNI = filter_input(INPUT_POST, 'dni');
	$Nombre = filter_input(INPUT_POST, 'nom');
	$Apellido = filter_input(INPUT_POST, 'ape');
	$Telefono = filter_input(INPUT_POST, 'tel');
	$Direccion = filter_input(INPUT_POST, 'dir');
	$Fnac = filter_input(INPUT_POST, 'fec');
	$Puesto = filter_input(INPUT_POST, 'puesto');
	$Sueldo = filter_input(INPUT_POST, 'sueldo');

	postEmpleado($DNI,$Nombre,$Apellido,$Telefono,$Direccion,$Fnac,$Puesto,$Sueldo);
		
?>

<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Excelente...",
  		text: "Empleado ingresado con exito",
  		footer: "",
	});
	window.location.href = "../Vistas/view_empleados.php"
</script>

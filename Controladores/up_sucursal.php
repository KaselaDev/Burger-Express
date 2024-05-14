<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
<?php
	require'../Modelos/consultas.php';
	$direccion = filter_input(INPUT_POST, 'dir');
	$capacidad = filter_input(INPUT_POST, 'cap');
	$cantidad = filter_input(INPUT_POST, 'cant');
	add_sucursal($direccion,$capacidad,$cantidad);
		
?>

<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Excelente...",
  		text: "Nueva sucursal ingresada con exito",
  		footer: "",
	});
	window.location.href = "view_sucursales.php"
</script>

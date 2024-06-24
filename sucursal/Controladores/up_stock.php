<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
<?php
	//include'header.php';
	require'../Modelos/consultas.php';
	$idNombre = filter_input(INPUT_POST, 'nom');
	$Cantidad = filter_input(INPUT_POST, 'cant');
    $Sucursal=filter_input(INPUT_POST, 'sucursal');
    $Nombre=view_tabla("productos WHERE Id_producto=$idNombre");
	insert_stock($Nombre[0]['Nombre'],$Cantidad,$Sucursal);
		
?>

<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Excelente...",
  		text: "Producto ingresado con exito",
  		showConfirmButton: false,
  		timer: 1000
	}).then((result) => {
		window.location.href = "../Vistas/infoStock.php"
	});
</script>

<?php
	require'../Modelos/consultas.php';
	$id = filter_input(INPUT_POST, 'ubi');
	$Nombre = filter_input(INPUT_POST, 'nuev_nombre');
	$Cantidad = filter_input(INPUT_POST, 'nuev_cantidad');
	$Sucursal=filter_input(INPUT_POST, 'sucursal');
	update_stock($id,$Nombre,$Cantidad);
	header('location:../Vistas/infoStock.php');
?>
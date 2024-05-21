<?php 
	require 'conexion.php';

	$ubica=filter_input(INPUT_GET,'ubi');
	$nombre=filter_input(INPUT_GET, 'nuev_nom');
	$descri=filter_input(INPUT_GET, 'nuev_des');
	$precio=filter_input(INPUT_GET, 'nuev_pre');		

	$consulta=$conexion->prepare(" UPDATE productos SET Nombre=:nom, Descripcion=:des, Costo=:pre WHERE productos.Id_producto=:id;");
	$consulta->bindParam(':nom',$nombre);//el bindParam vincula la variable 'nroHistoria' con otra nueva(:nroHist)
	$consulta->bindParam(':des',$descri);
	$consulta->bindParam(':pre',$precio);
	$consulta->bindParam(':id',$ubica);

	if ($consulta->execute()) {
		echo "si";
		header("Location:listado_producto.php");
	}
	else{
		echo "No se pudo dar de alta";
	}
	
 ?>
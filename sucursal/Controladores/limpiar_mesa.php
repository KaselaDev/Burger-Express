<?php 
	require '../Modelos/consultas.php';

	$mesa=filter_input(INPUT_GET, 'ubi');
	$idP=filter_input(INPUT_GET,'id');
	echo $mesa."-".$idP;

	estado_mesa(1,$mesa,"libre");
	estado_pedido("finalizado",$idP);
	header("Location:../Vistas/user/menu_pedidos.php");
 ?>
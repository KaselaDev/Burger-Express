<?php 
	require '../Modelos/consultas.php';

	$mesa=filter_input(INPUT_GET, 'ubi');
	$idPedido=filter_input(INPUT_GET, 'id');
	echo $mesa;

	estado_pedido("en preparacion",$idPedido);
	estado_mesa(1,$mesa,"ocupada");
	header("Location:../Vistas/user/menu_pedidos.php");
 ?>
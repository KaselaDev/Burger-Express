<?php 
	require '../Modelos/consultas.php';

	$nombre=filter_input(INPUT_GET,'nom');
	$producto=filter_input(INPUT_GET,'pro');
	$mesa=filter_input(INPUT_GET,'mesa');
	$idPedido=filter_input(INPUT_GET,'id');

	$val=true;
	$tablaPedido=view_tabla("pedido");
	foreach ($tablaPedido as $key) {//Foreach recorre tabla 'pedido'
		if ($idPedido == $key['idPedido']) {//Si el idPedido coincide
			if ($producto == $key['producto']) {//Si el producto se repite sume la cantidad
				modificar_pedido($key['Cod_pedido'],$key['idPedido'],$key['producto'],$key['cantidad']+1);
				$val=false;
			}//Si el producto se repite sume la cantidad
		}//Si el idPedido coincide
	}//Foreach recorre tabla 'pedido'

	if ($val) {
		agregar_pedido($producto,$nombre,'1',$mesa,$idPedido);
		estado_mesa(1,$mesa,"en proceso");
	}
	echo $nombre.$mesa.$idPedido.$producto;
	header("Location:../Vistas/user/tomar_pedido.php?nom=$nombre&mesa=$mesa&id=$idPedido");
 ?>
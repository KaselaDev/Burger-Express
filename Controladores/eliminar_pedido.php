<?php 
	require '../Modelos/consultas.php';

	$idPedido=filter_input(INPUT_GET,'id');
	$accion=filter_input(INPUT_GET,'ac');
	$producto=filter_input(INPUT_GET, 'pro');
	$tablaPedido=view_tabla("pedido");
	
	if ($accion == "elProducto") {
		
		foreach ($tablaPedido as $key) {//Foreach recorre tabla 'pedido'
			if ($idPedido == $key['idPedido']) {//Si el idPedido coincide
				if ($producto == $key['producto']) {//Si el producto se repite sume la cantidad
					if ($key['cantidad']==1) {//si la cantidad del producto es 1 lo borre
						delete_pedido($idPedido,$producto,"eliminarPro");
						header("Location:../Vistas/user/tomar_pedido.php?nom=".$key['cliente']."&mesa=".$key['mesa']."&id=".$key['idPedido']."");	
					}//si la cantidad del producto es 1 lo borre
					else{////si la cantidad del producto mayor 1 que lo reste
						update_pedido($key['Cod_pedido'],$key['idPedido'],$key['producto'],$key['cantidad']-1);
						header("Location:../Vistas/user/tomar_pedido.php?nom=".$key['cliente']."&mesa=".$key['mesa']."&id=".$key['idPedido']."");	
					}////si la cantidad del producto mayor 1 que lo reste
				}//Si el producto se repite sume la cantidad
			}//Si el idPedido coincide
		}//Foreach recorre tabla 'pedido'
	}
	elseif ($accion == "elPedido") {//Si quiere eliminar el pedido
		foreach ($tablaPedido as $key) {//FOREACH recorre tabla 'pedido'
			if ($idPedido=$key['idPedido']) {//Si para buscar la mesa 
				$mesa=$key['mesa'];
			}//Si para buscar la mesa 
		}//FOREACH recorre tabla 'pedido'
		delete_pedido($idPedido,"d","eliminarPed"); 
		estado_mesa(1,$mesa,"libre");//Para modificar el estado de la mesa
		header("Location:../Vistas/user/menu_pedidos.php");
	}//Si quiere eliminar el pedido

 ?>
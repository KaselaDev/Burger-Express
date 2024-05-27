<?php
#ACA VAN LAS CONSULTAS SQL
	function delete($cod){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM productos WHERE Id_producto=:cod");
	    $consulta->bindParam(":cod",$cod);
	    $consulta->execute();
	}

	function search($cod){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM sucursales WHERE `Cod_sucursal` = '$cod'");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function view_tabla($nombre){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM $nombre");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	//FUNCIONES PRODUCTOS
	function modificar_producto($id,$nombre,$descri,$precio){
		require'conexion.php';
		$consulta=$conexion->prepare(" UPDATE productos SET Nombre=:nom, Descripcion=:des, Costo=:pre WHERE productos.Id_producto=:id;");	    
		$consulta->bindParam(':nom',$nombre);
		$consulta->bindParam(':des',$descri);
	    $consulta->bindParam(':pre',$precio);
	    $consulta->bindParam(':id',$id);
	    $consulta->execute();
	}

	function agregar_producto($nombre,$descri,$precio){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT Id_producto FROM productos");
		$consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($datos as $elemento){
        	$nump_id = $elemento['Id_producto'];
        }
        $nump_id++;
        //echo $nump_id;
        $consulta=$conexion-> prepare("INSERT INTO `productos` (`Nombre`, `Id_producto`, `Descripcion`, `Costo`) VALUES (:nom, :id, :des, :pre);");
		$consulta->bindParam(':nom',$nombre);//el bindParam vincula la variable 'nroHistoria' con otra nueva(:nroHist)
		$consulta->bindParam(':des',$descri);
	    $consulta->bindParam(':pre',$precio);
	    $consulta->bindParam(':id',$nump_id);
	    return $consulta->execute();
	}

	///FUNCIONES PEDIDOS
	function search_pedido($nombre,$mesa,$id){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido WHERE `idPedido` = '$id' AND `cliente` = '$nombre' AND `mesa` = '$mesa' ");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function agregar_pedido($producto,$nombre,$cant,$mesa,$id){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT Cod_pedido FROM pedido");
		$consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($datos as $elemento){
        	$nump_id = $elemento['Cod_pedido'];
        }
        $nump_id++;
        //echo $nump_id;
        $fecha=date("Y-m-d");
        $consulta=$conexion-> prepare("INSERT INTO `pedido` (`Cod_pedido`, `idPedido`, `producto`, `cantidad`, `fecha`, `cliente`, `mesa`) VALUES (:cod, :id, :pro, :cant, :fec, :nom, :mesa);");
        $consulta->bindParam(':mesa',$mesa);
		$consulta->bindParam(':nom',$nombre);//el bindParam vincula la variable 'nroHistoria' con otra nueva(:nroHist)
		$consulta->bindParam(':fec',$fecha);
	    $consulta->bindParam(':cant',$cant);
	    $consulta->bindParam(':pro',$producto);
	    $consulta->bindParam(':id',$id);
	    $consulta->bindParam(':cod',$nump_id);
	    return $consulta->execute();
	}

	function modificar_pedido($cod,$id,$producto,$cant){
		require'conexion.php';
		$consulta=$conexion->prepare(" UPDATE pedido SET idPedido=:id, producto=:pro, cantidad=:cant WHERE pedido.Cod_pedido=:cod;");
	    $consulta->bindParam(':cant',$cant);
	    $consulta->bindParam(':pro',$producto);
	    $consulta->bindParam(':id',$id);
	    $consulta->bindParam(':cod',$cod);
	    $consulta->execute();
	}

	function delete_pedido($id,$producto,$accion){
		require'conexion.php';
		if ($accion == "eliminarPro") {//Si eliminar el producto del pedido
			$consulta=$conexion->prepare("DELETE FROM pedido WHERE idPedido=:id AND producto=:pro");
			$consulta->bindParam(":pro",$producto);
		}//Si eliminar el producto del pedido
		else if ($accion == "eliminarPed") {//Si eliminar el pedido
			$consulta=$conexion->prepare("DELETE FROM pedido WHERE idPedido=:id");
		}//Si eliminar el pedido
	    $consulta->bindParam(":id",$id);
	    $consulta->execute();
	}

	//FUNCIONES MESAS
	function estado_mesa($cod,$mesa,$estado){
		require'conexion.php';
		$consulta=$conexion->prepare(" UPDATE mesas SET estado=:est WHERE mesas.cod_sucursal=:cod AND mesas.mesa=:mesa;");
		$consulta->bindParam(':est',$estado);
	    $consulta->bindParam(':mesa',$mesa);
	    $consulta->bindParam(':cod',$cod);
	    $consulta->execute();
	}	
?>
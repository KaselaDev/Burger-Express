<?php
#Functions of sucursal
	function deleteSucursal($cod){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM sucursales WHERE Cod_sucursal=:cod");
		$consulta->bindParam(":cod",$cod);
		$consulta->execute();
	}
	function getSucursales($one=" "){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM sucursales $one");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function updateSucursal($dire,$capa,$co,$fecha,$cant,$cod){
		require'conexion.php';
		$change=$conexion->prepare("UPDATE sucursales SET Direccion=:dir, Capacidad=:cap, Cod_supervisor=:cod_s, Fecha=:fec, Cant_empleados=:c_e WHERE sucursales.Cod_sucursal= :code ");
		$change->bindParam(':dir',$dire);
		$change->bindParam(':cap',$capa);
		$change->bindParam(':cod_s',$co);
		$change->bindParam(':fec',$fecha);
		$change->bindParam(':c_e',$cant);
		$change->bindParam(':code',$cod);
		$change->execute();
	}

	function postSucursal($dir,$cap,$cant){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT Cod_sucursal FROM sucursales");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		foreach($datos as $elemento){
			$codigo = $elemento['Cod_sucursal'];
		}
		$codigo++;
		date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("d-m-Y");
		$insert = $conexion->prepare("INSERT INTO `sucursales` (`Cod_sucursal`,`Direccion`,`Capacidad`,`Cant_empleados`,`Fecha`) VALUES (:cod, :dir, :cap, :can, :fec)");
		$insert->bindParam(':cod',$codigo);
		$insert->bindParam(':dir',$dir);
		$insert->bindParam(':cap',$cap);
		$insert->bindParam(':can',$cant);
		$insert->bindParam(':fec',$fecha);
		$insert->execute();
	}
	#functions of empleado
	function deleteEmpleado($id){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM empleados WHERE id_empleado=:id");
		$consulta->bindParam(":id",$id);
		$consulta->execute();
	}
	function getEmpleados($one=" "){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM empleados $one");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function updateEmpleado($id,$dni,$name,$ape,$tel,$dir,$ing,$fn,$tur,$puesto,$sueldo){
		require'conexion.php';
		$change=$conexion->prepare("UPDATE empleados SET Nombre=:name, Apellido=:ape, Telefono=:tel, Direccion=:dir, Ingreso=:ing, Fnac=:fn, Turno=:tur, Puesto=:puesto, Sueldo=:sueldo, DNI=:dni WHERE empleados.id_empleado= :id ");
		$change->bindParam(':id',$id);
		$change->bindParam(':dni',$dni);
		$change->bindParam(':name',$name);
		$change->bindParam(':ape',$ape);
		$change->bindParam(':tel',$tel);
		$change->bindParam(':dir',$dir);
		$change->bindParam(':ing',$ing);
		$change->bindParam(':fn',$fn);
		$change->bindParam(':tur',$tur);
		$change->bindParam(':puesto',$puesto);
		$change->bindParam(':sueldo',$sueldo);
		$change->execute();
	}

	function postEmpleado($id,$dni,$name,$ape,$tel,$dir,$ing,$fn,$tur,$puesto,$sueldo){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT  FROM empleados");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		foreach($datos as $elemento){
			$codigo = $elemento['Cod_sucursal'];
		}
		$codigo++;
		date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("d-m-Y");
		$insert = $conexion->prepare("INSERT INTO `empleados` (`Cod_sucursal`,`Direccion`,`Capacidad`,`Cant_empleados`,`Fecha`) VALUES (:cod, :dir, :cap, :can, :fec)");
		$insert->bindParam(':id',$id);
		$insert->bindParam(':dni',$dni);
		$insert->bindParam(':name',$name);
		$insert->bindParam(':ape',$ape);
		$insert->bindParam(':tel',$tel);
		$insert->bindParam(':dir',$dir);
		$insert->bindParam(':ing',$ing);
		$insert->bindParam(':fn',$fn);
		$insert->bindParam(':tur',$tur);
		$insert->bindParam(':puesto',$puesto);
		$insert->bindParam(':sueldo',$sueldo);
		$insert->execute();
	}
	function getVentas(){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido");
		$consulta->execute();
			$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

#Login
	function userExists($DNI, $Clave) {
		require 'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM Empleados WHERE $DNI=DNI AND $Clave=Clave");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
   }
#ACA VAN LAS CONSULTAS SQL
	function delete_producto($cod){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM productos WHERE Id_producto=:cod");
	    $consulta->bindParam(":cod",$cod);
	    $consulta->execute();
	}

	function view_tabla($nombre){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM $nombre");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	//FUNCIONES PRODUCTOS
	function update_producto($id,$nombre,$descri,$precio){
		require'conexion.php';
		$consulta=$conexion->prepare(" UPDATE productos SET Nombre=:nom, Descripcion=:des, Costo=:pre WHERE productos.Id_producto=:id;");	    
		$consulta->bindParam(':nom',$nombre);
		$consulta->bindParam(':des',$descri);
	    $consulta->bindParam(':pre',$precio);
	    $consulta->bindParam(':id',$id);
	    $consulta->execute();
	}

	function insert_producto($nombre,$descri,$precio){
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

	function update_pedido($cod,$id,$producto,$cant){
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
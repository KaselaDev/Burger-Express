<?php
/*********************************************
*
*	AGREGADO CAJA
*
********************************************* */
function cerrarCaja(){
		require '../Modelos/conexion.php';
		date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("Y-m-d");
		$cie=0;
		$change=$conexion->prepare("UPDATE caja SET cierre=$cie WHERE fecha LIKE '%".$fecha."%'");
	    $change->execute();
	}
	function cajaCerrada(){
		require 'conexion.php';
		date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("Y-m-d");
		$consulta=$conexion->prepare("SELECT cierre FROM caja WHERE fecha LIKE '%".$fecha."%'");
		$consulta->execute();
		$datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
	}
function getCaja($fecha){
	require '../Modelos/conexion.php';
	$consulta=$conexion->prepare("SELECT actual FROM caja WHERE fecha LIKE '%".$fecha."%'");
	$consulta->execute();
	return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
function getId($fecha){
	require '../Modelos/conexion.php';
	$consulta=$conexion->prepare("SELECT fecha FROM caja WHERE fecha LIKE '%".$fecha."%'");
	$consulta->execute();
	return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
function getGastos($fecha){
	require '../Modelos/conexion.php';
	$consulta=$conexion->prepare("SELECT * FROM gastos WHERE id_caja LIKE '%".$fecha."%'");
	$consulta->execute();
	return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
function getDescGasto($fecha){
	require '../Modelos/conexion.php';
	$consulta=$conexion->prepare("SELECT * FROM gastos WHERE id_caja LIKE '%".$fecha."%'");
	$consulta->execute();
	return $consulta->fetchAll(PDO::FETCH_ASSOC);
	
}
function postGasto($monto, $desc,$id_caja,$hora,$fecha){
		require '../Modelos/conexion.php';
		$consulta= $conexion->prepare("INSERT INTO `gastos` (`id_caja`,`hora`,`descripcion`,`monto`) VALUES(:id, :hora, :des, :mon)");
		$consulta->bindParam(':id',$id_caja);
		$consulta->bindParam(':hora',$hora);
		$consulta->bindParam(':des', $desc);
		$consulta->bindParam(':mon',$monto);
		$consulta->execute();
		updateCaja($monto,"-");
	}
	function updateCaja($monto,$ope){

		require '../Modelos/conexion.php';
		date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("Y-m-d");
		$caja = getCaja($fecha);
		switch ($ope) {
			case '-':
				foreach($caja as $valor){
					$actual=$valor['actual']-$monto;
				}
				break;
			
			case '+':
				foreach($caja as $valor){
					$actual=$valor['actual']+$monto;
				}
				break;
		}
		
		var_dump($actual);
		//var_dump($fecha);
		$change=$conexion->prepare("UPDATE caja SET actual=:act WHERE fecha LIKE '%".$fecha."%'");
	    $change->bindParam(':act',$actual);
	    $change->execute();

	}
function updateGasto($id){
	require'../Modelos/conexion.php';
	date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
	$fecha = date("Y-m-d");
	$datos = getDescGasto($fecha);
	foreach($datos as $gasto){
		if($gasto['hora']==$id){
			$desc="(canceled)".$gasto['descripcion'];
		}
	}
	$change=$conexion->prepare("UPDATE gastos SET descripcion=:des WHERE hora= :id ");
	$change->bindParam(':id',$id);
	$change->bindParam(':des',$desc);
	$change->execute();
}

function postOpen($importe,$encargado){
	require 'conexion.php';
	$consulta=$conexion->prepare("INSERT INTO `caja` (`apertura`,`actual`,`encargado`) VALUES(:ap, :ac, :enc)");
	$consulta->bindParam(':ap',$importe);
	$consulta->bindParam(':ac',$importe);
	$consulta->bindParam(':enc',$encargado);
	$consulta->execute();

}

/*********************************************
*
*	CRUD SUCURSAL
*
********************************************* */

	function deleteSucursal($cod){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare("DELETE FROM sucursales WHERE Cod_sucursal=:cod");
		$consulta->bindParam(":cod",$cod);
		$consulta->execute();
	}
	function getSucursales($one=" "){
		require'../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM sucursales $one");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function updateSucursal($dire,$capa,$co,$fecha,$cod){
		require'../Modelos/conexion.php';
		$change=$conexion->prepare("UPDATE sucursales SET Direccion=:dir, Capacidad=:cap, Cod_supervisor=:cod_s, Fecha=:fec WHERE sucursales.Cod_sucursal= :code ");
	    $change->bindParam(':dir',$dire);
	    $change->bindParam(':cap',$capa);
	    $change->bindParam(':cod_s',$co);
	    $change->bindParam(':fec',$fecha);
	    $change->bindParam(':code',$cod);
	    $change->execute();
	}

	function postSucursal($dir,$cap){
		require'../Modelos/conexion.php';
        date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("Y-m-d");
		$insert = $conexion->prepare("INSERT INTO `sucursales` (`Direccion`,`Capacidad`,`Cod_supervisor`,`Fecha`) VALUES (:dir, :cap, '1', :fec)");
		$insert->bindParam(':dir',$dir);
		$insert->bindParam(':cap',$cap);
		$insert->bindParam(':fec',$fecha);
		$insert->execute();
	}
#functions of empleado
	function deleteEmpleado($cod){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare("DELETE FROM empleados WHERE id_empleado=:id");
	    $consulta->bindParam(":id",$cod);
	    $consulta->execute();
	}
	function getEmpleados($one=" "){
		require'../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM empleados $one");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function updateEmpleado($id,$dni,$clave,$name,$ape,$tel,$dir,$fn,$puesto,$sueldo){
		require'../Modelos/conexion.php';
		$change=$conexion->prepare("UPDATE empleados SET Nombre=:name, Apellido=:ape, Telefono=:tel, Direccion=:dir, Fnac=:fn, Puesto=:puesto, Sueldo=:sueldo, DNI=:dni, Clave=:cla WHERE empleados.id_empleado= :id ");
	    $change->bindParam(':id',$id);
	    $change->bindParam(':dni',$dni);
	    $change->bindParam(':cla',$clave);
	    $change->bindParam(':name',$name);
	    $change->bindParam(':ape',$ape);
	    $change->bindParam(':tel',$tel);
	    $change->bindParam(':dir',$dir);
	   	$change->bindParam(':fn',$fn);
	    $change->bindParam(':puesto',$puesto);
	    $change->bindParam(':sueldo',$sueldo);
	    $change->execute();
	}
	#functions of empleado
	function postEmpleado($dni,$clave,$name,$ape,$tel,$dir,$fn,$puesto,$sueldo){
		require'../Modelos/conexion.php';
        date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("Y-m-d");
		#id_empleado	DNI	Nombre	Apellido	Telefono	Direccion	Ingreso	Fnac	Puesto	Sueldo	

		$insert = $conexion->prepare("INSERT INTO `empleados` (`DNI`,`Clave`,`Nombre`,`Apellido`,`Telefono`,`Direccion`,`Ingreso`,`Fnac`,`Puesto`,`Sueldo`) VALUES (:dni, :cla, :nom, :ape, :tel, :dir, :ing, :fec, :pst, :sld)");
		$insert->bindParam(':dni',$dni);
		$insert->bindParam(':cla',$clave);
	    $insert->bindParam(':nom',$name);
	    $insert->bindParam(':ape',$ape);
	    $insert->bindParam(':tel',$tel);
	    $insert->bindParam(':dir',$dir);
	    $insert->bindParam(':ing',$fecha);
	   	$insert->bindParam(':fec',$fn);
	    $insert->bindParam(':pst',$puesto);
	    $insert->bindParam(':sld',$sueldo);
		$insert->execute();
	}
	function getVentas(){
		require'../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido");
		$consulta->execute();
        	$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

			
#Login
	function userExists($DNI, $Clave) {
		require '../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM empleados WHERE DNI='$DNI' AND Clave='$Clave'");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
   }
#ACA VAN LAS CONSULTAS SQL
	function delete_producto($cod){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare("DELETE FROM productos WHERE Id_producto=:cod");
	    $consulta->bindParam(":cod",$cod);
	    $consulta->execute();
	}

	function view_tabla($nombre){
		require'../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM $nombre");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}
	
	function view_tabla2($nombre){
		require'../../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM $nombre");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	//FUNCIONES PRODUCTOS
	function update_producto($id,$nombre,$descri,$precio){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare(" UPDATE productos SET Nombre=:nom, Descripcion=:des, Costo=:pre WHERE productos.Id_producto=:id;");	    
		$consulta->bindParam(':nom',$nombre);
		$consulta->bindParam(':des',$descri);
	    $consulta->bindParam(':pre',$precio);
	    $consulta->bindParam(':id',$id);
	    $consulta->execute();
	}

	function insert_producto($nombre,$descri,$precio){
		require'../Modelos/conexion.php';
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
		require'../../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido WHERE `idPedido` = '$id' AND `cliente` = '$nombre' AND `mesa` = '$mesa' ");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function agregar_pedido($producto,$nombre,$cant,$mesa,$id,$estado){
		require'../Modelos/conexion.php';
		$consulta = $conexion->prepare("SELECT Cod_pedido FROM pedido");
		$consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($datos as $elemento){
        	$nump_id = $elemento['Cod_pedido'];
        }
        $nump_id++;
        //echo $nump_id;
        $fecha=date("Y-m-d");
        $consulta=$conexion-> prepare("INSERT INTO `pedido` (`Cod_pedido`, `idPedido`, `producto`, `cantidad`, `fecha`, `cliente`, `mesa`, `estado`) VALUES (:cod, :id, :pro, :cant, :fec, :nom, :mesa, :est);");
        $consulta->bindParam(':mesa',$mesa);
		$consulta->bindParam(':nom',$nombre);//el bindParam vincula la variable 'nroHistoria' con otra nueva(:nroHist)
		$consulta->bindParam(':fec',$fecha);
	    $consulta->bindParam(':cant',$cant);
	    $consulta->bindParam(':pro',$producto);
	    $consulta->bindParam(':id',$id);
	    $consulta->bindParam(':est',$estado);
	    $consulta->bindParam(':cod',$nump_id);
	    return $consulta->execute();
	}

	function update_pedido($cod,$id,$producto,$cant){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare(" UPDATE pedido SET idPedido=:id, producto=:pro, cantidad=:cant WHERE pedido.Cod_pedido=:cod;");
	    $consulta->bindParam(':cant',$cant);
	    $consulta->bindParam(':pro',$producto);
	    $consulta->bindParam(':id',$id);
	    $consulta->bindParam(':cod',$cod);
	    $consulta->execute();
	}

	function delete_pedido($id,$producto,$accion){
		require'../Modelos/conexion.php';
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

	function estado_pedido($estado,$id){
		require '../Modelos/conexion.php';
		$consulta=$conexion->prepare(" UPDATE pedido SET estado=:est WHERE pedido.idPedido=:id;");
	    $consulta->bindParam(':est',$estado);
	    $consulta->bindParam(':id',$id);
	    $consulta->execute();
	}

	//FUNCIONES MESAS
	function estado_mesa($cod,$mesa,$estado){
		require'../Modelos/conexion.php';
		$consulta=$conexion->prepare(" UPDATE mesas SET estado=:est WHERE mesas.cod_sucursal=:cod AND mesas.mesa=:mesa;");
		$consulta->bindParam(':est',$estado);
	    $consulta->bindParam(':mesa',$mesa);
	    $consulta->bindParam(':cod',$cod);
	    $consulta->execute();
	}	
?>
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

	function updateSucursal($dire,$capa,$co,$fecha,$cod){
		require'conexion.php';
		$change=$conexion->prepare("UPDATE sucursales SET Direccion=:dir, Capacidad=:cap, Cod_supervisor=:cod_s, Fecha=:fec WHERE sucursales.Cod_sucursal= :code ");
	    $change->bindParam(':dir',$dire);
	    $change->bindParam(':cap',$capa);
	    $change->bindParam(':cod_s',$co);
	    $change->bindParam(':fec',$fecha);
	    $change->bindParam(':code',$cod);
	    $change->execute();
	}

	function postSucursal($dir,$cap){
		require'conexion.php';
        date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("d-m-Y");
		$insert = $conexion->prepare("INSERT INTO `sucursales` (`Direccion`,`Capacidad`,`Fecha`) VALUES (:dir, :cap, :fec)");
		$insert->bindParam(':dir',$dir);
		$insert->bindParam(':cap',$cap);
		$insert->bindParam(':fec',$fecha);
		$insert->execute();
	}
#functions of empleado
	function deleteEmpleado($cod){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM empleados WHERE id_empleado=:id");
	    $consulta->bindParam(":id",$cod);
	    $consulta->execute();
	}
	function getEmpleados($one=" "){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM empleados $one");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function updateEmpleado($id,$dni,$name,$ape,$tel,$dir,$fn,$puesto,$sueldo){
		require'conexion.php';
		$change=$conexion->prepare("UPDATE empleados SET Nombre=:name, Apellido=:ape, Telefono=:tel, Direccion=:dir, Fnac=:fn, Puesto=:puesto, Sueldo=:sueldo, DNI=:dni WHERE empleados.id_empleado= :id ");
	    $change->bindParam(':id',$id);
	    $change->bindParam(':dni',$dni);
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
	function postEmpleado($dni,$name,$ape,$tel,$dir,$fn,$puesto,$sueldo){
		require'conexion.php';
        date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
		$fecha = date("d-m-Y");
		#id_empleado	DNI	Nombre	Apellido	Telefono	Direccion	Ingreso	Fnac	Puesto	Sueldo	

		$insert = $conexion->prepare("INSERT INTO `empleados` (`DNI`,`Nombre`,`Apellido`,`Telefono`,`Direccion`,`Ingreso`,`Fnac`,`Puesto`,`Sueldo`) VALUES (:dni, :nom, :ape, :tel, :dir, :ing, :fec, :pst, :sld)");
		$insert->bindParam(':dni',$dni);
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
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido");
		$consulta->execute();
        	$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

?>
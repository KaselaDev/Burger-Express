<?php
#ACA VAN LAS CONSULTAS SQL
	echo '<script>console.log("se incluyo `consultas.php` correctamente")</script>';
	function delete_suc($cod){
		require'conexion.php';
		$consulta=$conexion->prepare("DELETE FROM sucursales WHERE Cod_sucursal=:cod");
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

	function view_sucursales(){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM sucursales");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	function modify($dire,$capa,$co,$fecha,$cant,$cod){
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

	function add_sucursal($dir,$cap,$cant){
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

	function getVentas(){
		require'conexion.php';
		$consulta = $conexion->prepare("SELECT * FROM pedido");
		$consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $datos;
	}

	
	
?>
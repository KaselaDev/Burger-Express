<?php 
	require 'conexion.php';
	
	$consulta=$conexion->prepare("SELECT * FROM productos");// prepara la consulta SQL
	$consulta->execute();// ejecuta la consulta SQL
	$datos=$consulta->fetchAll(PDO::FETCH_ASSOC);// genera un diccionario con datos de PACIENTE 
	if (isset($datos[0]['Id_producto'])) {//SI LA BASE NO ESTA VACIA
		foreach ($datos as $elemento) {
			$nump=$elemento['Id_producto'];
		}	
		$nump++;
	}//SI LA BASE NO ESTA VACIA
	else {//SI LA BASE ESTA VACIA
		$nump=1;
		foreach ($datos as $elemento) {//FOREACH para incrementar 'id'
			$nump++;
		}//FOREACH para incrementar 'id'
	}//SI LA BASE ESTA VACIA
	echo $nump;
	$nombre=filter_input(INPUT_GET, 'ing_nom');
	$descri=filter_input(INPUT_GET, 'ing_des');
	$precio=filter_input(INPUT_GET, 'ing_pre');

	//INSERT INTO `productos` (`Nombre`, `Id_producto`, `Descripcion`, `Costo`) VALUES ('sfsd', '1', 'fgfdgdf', '200');

	$consulta=$conexion-> prepare("INSERT INTO `productos` (`Nombre`, `Id_producto`, `Descripcion`, `Costo`) VALUES (:nom, :id, :des, :pre);");
	$consulta->bindParam(':nom',$nombre);//el bindParam vincula la variable 'nroHistoria' con otra nueva(:nroHist)
	$consulta->bindParam(':des',$descri);
    $consulta->bindParam(':pre',$precio);
    $consulta->bindParam(':id',$nump);

	

	if ($consulta->execute()) {
		echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>Swal.fire({
			title: "Se agrego el producto!", 
			icon: "success",
			showConfirmButton: false,
			timer: 1000,
		}).then((res)=>{
			if (res) {//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				window.location.assign("enlaces.php");
			}//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
		});</script>';
	}
	else{
		echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>Swal.fire({
			title: "No se pudo agregar el producto!", 
			icon: "error",
			showConfirmButton: false,
			timer: 1000,
		}).then((res)=>{
			if (res) {//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				window.location.assign("ingreso_producto.php");
			}//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
		});</script>';
	}
	//echo $conexion->lastlnsertld();
 ?>
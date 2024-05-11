<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
<?php
	require'conexion.php';
	date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
	$fecha = date("d-m-Y");
	$direccion = filter_input(INPUT_POST, 'dir');
	$cap = filter_input(INPUT_POST, 'cap');
	$cant = filter_input(INPUT_POST, 'cant');
echo($direccion);
	$consulta = $conexion->prepare("SELECT Cod_sucursal FROM sucursales");
		$consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($datos as $elemento){
        	$codigo = $elemento['Cod_sucursal'];
        }
        $codigo++;
		$insert = $conexion->prepare("INSERT INTO `sucursales` (`Cod_sucursal`,`Direccion`,`Capacidad`,`Cant_empleados`,`Fecha`) VALUES (:cod, :dir, :cap, :can, :fec)");
		$insert->bindParam(':cod',$codigo);
		$insert->bindParam(':dir',$direccion);
		$insert->bindParam(':cap',$cap);
		$insert->bindParam(':can',$cant);
		$insert->bindParam(':fec',$fecha);

		$insert->execute();
		
?>

<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Excelente...",
  		text: "Nueva sucursal ingresada con exito",
  		footer: "",
	});
	window.location.href = "view_sucursales.php"
</script>

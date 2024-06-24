<<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php
	require '../Modelos/consultas.php';
	$monto = filter_input(INPUT_POST, 'monto');
	$desc = filter_input(INPUT_POST, 'des');
	date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
	$fecha = date("Y-m-d");
	$hora= date("H:i:s");
	$datos = getId($fecha);
	foreach($datos as $elementos){
		$id_caja=$elementos['fecha'];
	}
	postGasto($monto,$desc,$id_caja,$hora,$fecha);
		
?>
<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Listo...",
  		text: "Gasto registrado",
  		footer: "",
	}).then((result) => {
    if (result.isConfirmed) {
		window.location.href = "../Vistas/caja.php"
	}});
</script>
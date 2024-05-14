<html>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
<?php
	require'../Modelos/consultas.php';
	$cod=filter_input(INPUT_GET, 'codigo');
	if(isset($cod)){
		delete_suc($cod);
	}else{
		header('location:../Vistas/index.php');
	}
	?>
	<script type="text/javascript">
		Swal.fire({
	  		icon: "success",
	 		title: "Realizado...",
	  		text: "Sucursal eliminada con exito",
	  		footer: "",
		}).then((result) => {
    if (result.isConfirmed) {
    	console.log("view")
		window.location.href = "view_sucursales.php"
	}});
	</script>


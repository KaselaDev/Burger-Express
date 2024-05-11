<html>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
</html>
<!-- 
<script type="text/javascript">
	const volver = `<a href="view"`
	Swal.fire({
  title: "Realmente desea eliminar esta sucursal?",
  text: "!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, Eliminarla!"
}).then((result) => {
	if (result.isConfirmed) {
		<?php
			require'conexion.php';
			$cod=filter_input(INPUT_GET, 'codigo');
			if(isset($cod)){
			$consulta=$conexion->prepare("DELETE FROM sucursales WHERE Cod_sucursal=:cod");
		    $consulta->bindParam(":cod",$cod);
			$consulta->execute();
			}else{
				header('location:index.php');
			}

		?>
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});

</script>
 -->
<?php
	require'conexion.php';


$cod=filter_input(INPUT_POST, 'cod');
if(isset($cod)){

$consulta=$conexion->prepare("DELETE FROM sucursales WHERE Cod_sucursal=:cod");
    $consulta->bindParam(":cod",$cod);
    $consulta->execute();
}else{
	header('location:index.php');
}
?>
<script type="text/javascript">
	Swal.fire({
  		icon: "success",
 		title: "Realizado...",
  		text: "Sucursal eliminada con exito",
  		footer: "",
	});
	//window.location.href = "ver_sucursales.php"
</script>

?>
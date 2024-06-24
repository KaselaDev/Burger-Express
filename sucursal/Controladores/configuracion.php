<?php 
	require '../Modelos/consultas.php';
	$info=view_tabla('infoSucursal');
	$titulo=filter_input(INPUT_POST, 'titulo');
	echo $titulo."<br>";
	echo $_FILES["logo"]['name'];
	//var_dump($_FILES);
	if (!empty($_FILES["logo"]['tmp_name'])) {//SI cambia la imagen la envie a la base
		$archivo=$_FILES['logo'];
		$contImg=file_get_contents($archivo['tmp_name']);
		$imgBase64=base64_encode($contImg);
		//var_dump($archivo);
		//var_dump($imgBase64);
	}//SI cambia la imagen la envie a la base
	else{//SI no cambia la imagen 
		$imgBase64=$info[0]['logo'];
	}//SI no cambia la imagen 

	editLocal($titulo,$imgBase64);

/*
	?>
	<div>
		<img src="data:image/png;base64,<?=$imgBase64?>" width="50" hegth="50">
	</div>
	<?php
*/
	header("Location:../Vistas/view_config.php");
 ?>
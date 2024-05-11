<?php 
	$archi=fopen('pedido.csv', 'r');
	$arNom=fopen('nombre.csv', 'r');
	$nom=fgets($arNom);
	$cont_tike="TICKET Pedido";
	$cont_tike.="\n\nFecha: ".date("c");
	$cont_tike.="\nNombre: ".$nom;
	$cont_tike.="\n\nPRODUCTOS";

	while (!feof($archi)) {
		$datos[]=explode(',', fgets($archi));
	}

	$cont_tike.="\nCant. Productos: ".(count($datos)-1);
	$cont_tike.="\nProducto 			Precio";
	fclose($archi);

	$total=0;
	for ($i=0; $i < count($datos)-1; $i++) { 
		$cont_tike.="\n".$datos[$i][0]."	$".$datos[$i][1].".00";
		$total=$total+$datos[$i][1];
	}

	$cont_tike.="\n\n 	TOTAL: $".$total.".00";
	$cont_tike.="\n\n 	GRACIAS POR SU COMPRA";
	$tike=fopen('pedido_'.$nom.'.txt', 'a');

	fwrite($tike, $cont_tike);
	fclose($tike);
	unlink("nombre.csv");
	unlink("pedido.csv");
	header("Location:index.php");
 ?>
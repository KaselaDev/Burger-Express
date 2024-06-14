<!DOCTYPE html>
<html>
<head>
	<title>Balance diario</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles/style.css"/>
        <link rel="stylesheet" href="styles/styles.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<script src="JavaScript/caja.js
"></script>
</html>
<?php
	include'header.php';
	require'../Modelos/consultas.php';
	date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
	$fecha = date("Y-m-d");
	$caja = getCaja($fecha);
	echo"<div id='caja'><a href='../Controladores/cerrar_caja.php'>Cerrar caja</a><h3>Caja: $".$caja[0]['actual']."</h3></div>";
	$gastos = getGastos($fecha);
	echo"<table id='table' border='1'><thead><th>Hora</th><th>Descripcion</th><th>Monto</th><th>Cancelar</th></thead><tbody>";
	if(!empty($gastos)){
		foreach($gastos as $gasto){
			echo"<tr><td>".$gasto['hora']."</td><td>".$gasto['descripcion']."</td><td>".$gasto['monto']."</td>";
			if(strpos($gasto['descripcion'], "(canceled)")===false){
					echo"<td><a href='../Controladores/archivar_gasto.php?id=".$gasto['hora']."'><span class='material-symbols-outlined'>cancel</span></a></td></tr>";
			}
			else{
				echo"</tr>";
			}
		}

	}
	echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr></tbody></table>';




<?php
	$user="id20691074_7to3ra";
	$psw="24_Anios";
	$dbname="id20691074_sucursal";
	$host="localhost";
	try{
		$dsn="mysql:host=localhost;dbname=$dbname";
		$conexion = new PDO($dsn, $user, $psw);
		//echo "Conexion realizada con exito";
	}catch(PDOException $e){
		echo $e->getMessage();

	}
	

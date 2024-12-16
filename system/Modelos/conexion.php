<?php
	$user="KaselaSQL";
	$psw="Sc091005";
	$dbname="sucursal";
	$host="localhost";
	try{
		$dsn="mysql:host=localhost;dbname=$dbname";
		$conexion = new PDO($dsn, $user, $psw);
		// echo "Conexion realizada con exito";
	}catch(PDOException $e){
		echo "Error al conectar: " . $e->getMessage();
	}
?>
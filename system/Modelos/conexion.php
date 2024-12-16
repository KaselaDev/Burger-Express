<?php
	$user="agrega_tus_Credenciales";
	$psw="agrega_tus_Credenciales";
	$dbname="agrega_tus_Credenciales";
	$host="agrega_tus_Credenciales";
	try{
		$dsn="mysql:host=localhost;dbname=$dbname";
		$conexion = new PDO($dsn, $user, $psw);
		// echo "Conexion realizada con exito";
	}catch(PDOException $e){
		echo "Error al conectar: " . $e->getMessage();
	}
?>
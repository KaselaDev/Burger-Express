<?php
    require "header.php";
    require "../Modelos/consultas.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JavaScript/estadisticas.js"></script>

    <title>Estadisticas de ventas</title>
</head>
<body>
	<section id="content">
	<aside>
		<div id="buttons">
			<h2>Filtrar por:</h2>
			<form action="" method="post">
				<input type="submit" name="op" value="Producto mas vendido">
				<input type="submit" name="op" value="Actividad sucursales">
				<input type="submit" name="op" value="Horario mas concurrido">
			</form>
		</div>
	</aside>
	<div id="grafico"><canvas id="Estadistica" height=50px></canvas></div>
</section>
</body>
<?php
	if(isset($_POST['op'])){

		switch ($_POST['op']) {
			case 'Producto mas vendido':
				$productos = getProductos();
				$data=[];
				$label=[];
				foreach($productos as $producto){
					$label[]=$producto['Nombre'];
					$nom=$producto['Nombre'];
					$sql="SELECT Cod_pedido FROM pedido WHERE producto LIKE '%".$nom."%'";
					$data[]=getPedidosEstadisticas($sql);
				}
				break;
			case 'Actividad sucursales':
				$sucursales = getSucursales();
				$data=[];
				foreach($sucursales as $sucursal){
					$label[]=$sucursal['Direccion'];
					$cod=$sucursal['Cod_sucursal'];
					$sql="SELECT Cod_pedido FROM pedido WHERE Cod_sucursal=$cod";
					$data[]=getPedidosEstadisticas($sql);
				}
				break;
		}
		var_dump($data);
		echo"<script type='text/javascript'>graficar(".$data.",".$label.")</script>";

	}


?>
<?php 
	include 'header_user.php'; 

	$mesa=filter_input(INPUT_GET, 'mesa');
	$tablaProductos=view_tabla2("productos");
	$tablaPedido=view_tabla2("pedido");
    $tablaPromo=view_tabla2("promociones");
    $sucursal=$_SESSION['Cod_sucursal'];
	foreach ($tablaPedido as $key) {//foreach recorre tabla 'pedido' y obtine el cliente y el idPedido
        if ($key['mesa'] == $mesa) {//si para buscar las mesas
            $nombre=$key['cliente'];
            $idPedido=$key['idPedido'];
            $fecha=$key['fecha'];
        }//si para buscar las mesas
    }//foreach recorre tabla 'pedido' y obtine el cliente y el idPedido

    $tablaPedidoCliente=search_pedido($nombre,$mesa,$idPedido);
    $cantPedido=0;
    $total=0;
    //Foreach recorre tabla 'pedido'
    foreach ($tablaPedidoCliente as $key) {
        //Si el idPedido coincide
        $cantPedido=$cantPedido+$key['cantidad'];
        //Foreach recorre tabla 'producto'
        foreach ($tablaProductos as $ele) { 
            $precioPro=$ele['Costo'];
            foreach ($tablaPromo as $value) {
                $pro=json_decode($value['productos']);
                for ($i=0; $i < count($pro); $i++) { 
                    //Si el producto tiene descuento los descuento
                    if ($pro[$i] == $ele['Id_producto']) {
                        $descuento="0.".$value['descuento'];
                        $preResta=$ele['Costo']*$descuento;
                        $precioPro=$precioPro-$preResta;
                    }
                }
            } 

            //si el producto de tabla 'producto' es IGUAL a producto 'pedido' calcule el total
            if ($key['producto']  == $ele['Nombre']) {
                //for recorre segun la cantidad del producto
                for ($i=0; $i < $key['cantidad']; $i++) {
                    $total=$total+$precioPro; 
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ver Pedido</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../JavaScript/script.js"></script>
</head>
<body>
	<section class="menu">
		<div class="pedido" style="display: flex;justify-content: center;">
			<div class="pedido-caja">
				<h3 style="font-size: 1.7rem;"><span class="material-symbols-outlined"  style="font-size: 1.7rem;">menu_book</span>Pedido</h3>
				<p>Nº Pedido: <?= $idPedido ?></p>
				<p>Fecha <?= $fecha ?></p>
                <p>Cliente: <b><?= $nombre ?></b></p>
                <p>Mesa: <b><?= $mesa ?></b></p>
                <p>Cantidad Productos <b><?= $cantPedido ?></b></p>
                <p>Total: <b>$<?= $total ?></b></p>
                <table border="1" id="table" style="width: 100%;">
                	<tr>
                		<th>Productos</th>
                		<th>Cantidad</th>
                	</tr>
                <?php 
                	foreach ($tablaPedidoCliente as $key) {//FOreach muestra pedido
                		if($key['cantidad']>0){
                        ?>
                		<tr>
                			<td><?= $key['producto'] ?></td>
                			<td><?= $key['cantidad'] ?></td>
                		</tr>
                		<?php
                        }
                	}//FOreach muestra pedido
                ?>
                </table>
                
			</div>
		</div>
		<button class="buton-carrito-c" style="margin: 10px 0;" onclick="limpiar_mesa(<?= $mesa ?>,<?= $idPedido ?>,<?= $sucursal ?>)">
            Desocupar Mesa
        </button>
	</section>
</body>
</html>
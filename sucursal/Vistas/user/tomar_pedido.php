<?php 
    include 'header_user.php';

    $nombre=filter_input(INPUT_GET,'nom');
    $mesa=filter_input(INPUT_GET,'mesa');
    $accion=filter_input(INPUT_GET,'ac');
    $idPedido=filter_input(INPUT_GET, 'id');
    $sucursal=$_SESSION['Cod_sucursal'];
    $tablaProductos=view_tabla2("productos");
    $tablaStock=view_tabla2("stock WHERE Cod_sucursal='".$sucursal."'");
    $tablaPedido=view_tabla2("pedido WHERE Cod_sucursal='".$sucursal."'");
    $tablaPromo=view_tabla2("promociones");
   
    //Si es un nuevo pedido
    if ($accion == "nuevo") {
        //For each obtiene el idPedido
       foreach ($tablaPedido as $key) {
           $idPedido=$key['idPedido'];
       }
       $idPedido++;
    }
    //si el pedido esta en proceso 
    elseif ($accion == "ver") {
        //foreach recorre tabla 'pedido' y obtine el cliente y el idPedido
        foreach ($tablaPedido as $key) {
            //si para buscar las mesas
            if ($key['mesa'] == $mesa) {
                $nombre=$key['cliente'];
                $idPedido=$key['idPedido'];
            }
        }
    }

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
    //echo $total-$totalDes;
    //echo "<br>".$totalDes2; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    <title>Tomar Pedido</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../JavaScript/script.js"></script>
</head>
<body>
    <section class="menu">
        <div class="pedido">
            <div id="carrito" class="carrito">
                    <h2><span class="material-symbols-outlined" style="font-size: 1.7rem;">menu_book</span>Pedido</h2>
                    <p>Cliente: <b><?= $nombre ?></b></p>
                    <p>Cantidad Productos <b><?= $cantPedido ?></b></p>
                    <p >Total: <b>$<?= $total ?></b> </p>
                    <button class="buton-carrito-r" onclick="realizar_pedido(<?= $mesa ?>,<?= $idPedido ?>,<?= $sucursal ?> )">   
                        <span class="material-symbols-outlined"  id="buton-ico">check</span>
                        <span class="buton-text">Realizar Pedido</span>
                    </button>
                    <button class="buton-carrito-c" onclick="eliminar_pedido(<?= $idPedido ?>, 'elPedido',<?= $sucursal ?>)">
                        <span class="material-symbols-outlined"  id="buton-ico">close</span>
                        <span class="buton-text">Cancelar Pedido</span>
                    </button>
            </div>

            <div class="pedido-menu">
                <!-- PRODUCTOS DISPONIBLES -->
                <div class="pedido-caja">
                    <h3>
                        <span class="material-symbols-outlined">restaurant_menu</span>
                        Productos Disponibles
                    </h3>
                    <table id="table" border="1">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Agregar</th>
                        </tr>
                    <?php
                        foreach ($tablaProductos as $key) {//Foreach recorre productos de base
                            $precioPro=$key['Costo'];
                            $val=true;
                            foreach ($tablaPromo as $ele) {
                                $pro=json_decode($ele['productos']);
                                for ($i=0; $i < count($pro); $i++) { 
                                    //Si el producto tiene descuento los descuento
                                    if ($pro[$i] == $key['Id_producto']) {
                                        $descuento="0.".$ele['descuento'];
                                        $preResta=$key['Costo']*$descuento;
                                        $precioPro=$precioPro-$preResta;
                                        $val=false;
                                    }
                                }
                            }  
                            ?>
                            <tr>
                                <td><?= $key['Nombre'] ?></td>
                                <td><?= $key['Descripcion'] ?></td>
                                <td>
                                    <?php
                                        if(!$val){ 
                                            echo "<span style='text-decoration:line-through;color:red'>$".$key['Costo']."</span> $".$precioPro;
                                        } 
                                        else{
                                            echo "$".$precioPro;
                                        }
                                    ?>
                                    
                                </td>
                                <td><button class="buton-agregar" onclick="addPedido('<?= $key['Nombre'] ?>',<?= $mesa ?>,<?= $idPedido ?>,'<?= $nombre ?>',<?= $sucursal ?>)"><span class="material-symbols-outlined">add_circle</span></button></td>
                            </tr>                           
                            <?php        
                        }//Foreach recorre productos de base
                    ?>
                    </table>
                </div>
                <!-- PRODUCTOS SELECCIONADOS -->
                <div class="pedido-caja">
                    <h3><span class="material-symbols-outlined">list_alt</span>Pedido</h3>
                    <?php 
                        $tablaPedidoCliente=search_pedido($nombre,$mesa,$idPedido);
                        $val=true;
                        foreach ($tablaPedidoCliente as $ele) {
                            if ($ele['cantidad']>0) {
                                $val=false;
                            }
                        }
                        if (!$val) {//SI ecuentra el pedido meustre el 'pedido'
                            ?>
                            <table id="table" border="1">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            <?php
                            foreach ($tablaPedidoCliente as $key) {//Foreaach recoorre tabla 'pedidos'
                                if ($key['cantidad']>0) {
                                ?>
                                <tr>
                                    <td><?= $key['producto'] ?></td>
                                    <td><?= $key['cantidad'] ?></td>
                                    <td>
                                        <button class="buton-agregar" style="background-color: red;" onclick="eliminar_pedidoProducto(<?= $idPedido ?>,'<?= $key['producto'] ?>', 'elProducto')"><span class="material-symbols-outlined">delete</span></button>
                                    </td>
                                </tr>
                                <?php 
                                }  
                            }//Foreaach recoorre tabla 'pedidos' 
                            ?>
                            </table>
                            
                            <?php
                        }//SI ecuentra el pedido meustre el 'pedido'
                        else{
                            echo "<h4>*No se Agrego ningún producto</h4>";
                        }
                     ?>
                </div> 
            </div>
        </div>
    </section>
</body>
</html>
<?php 
    require '../Modelos/consultas.php';

    $nombre = filter_input(INPUT_GET, 'nom');
    $producto = filter_input(INPUT_GET, 'pro');
    $mesa = filter_input(INPUT_GET, 'mesa');
    $idPedido = filter_input(INPUT_GET, 'id');
    $sucursal = filter_input(INPUT_GET, 'suc'); // La sucursal a la que pertenece el pedido

    $val = true;
    $tablaPedido = view_tabla("pedido WHERE idPedido='" . $idPedido . "'");
    
    foreach ($tablaPedido as $key) { // Recorre la tabla 'pedido'
        if ($producto == $key['producto']) { // Si el producto ya está en el pedido, sumar la cantidad
            update_pedido($key['Cod_pedido'], $key['idPedido'], $key['producto'], $key['cantidad'] + 1);
            $val = false;
            break; // Romper el ciclo una vez que el producto ha sido actualizado
        }
    }

    if ($val) { // Si el producto no se encontró, se agrega uno nuevo
        agregar_pedido($producto, $nombre, '1', $mesa, $idPedido, 'tomando..', $sucursal);
        estado_mesa($sucursal, $mesa, "en proceso"); 
    }

    $tablaStock = view_tabla("stock WHERE Cod_sucursal='" . $sucursal . "'");    
    // Ciclo para restar el stock del producto
    $datos = view_tabla("productos");
    
    foreach ($tablaPedido as $pedido) { // Recorre la tabla 'pedido'
        foreach ($datos as $prod) { // Recorre la tabla 'productos'
            if ($prod['Nombre'] == $pedido['producto']) { // Si el producto de pedido coincide con el de productos
                $ingredientes = explode(",", $prod['ingredientes']);
                
                // Decrementar stock por cada ingrediente
                foreach ($ingredientes as $ing) {
                    desc_stock($ing); // Asegúrate de que esta función está correctamente implementada
                }
            }
        }
    }

    // Redirigir al usuario después de realizar el pedido
    header("Location: ../Vistas/user/tomar_pedido.php?nom=$nombre&mesa=$mesa&id=$idPedido");
?>

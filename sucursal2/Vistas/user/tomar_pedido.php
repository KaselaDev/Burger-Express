<?php 
include 'header_user.php';

// Validación de las variables de entrada
$nombre = filter_input(INPUT_GET, 'nom') ?? '';
$mesa = filter_input(INPUT_GET, 'mesa') ?? '';
$accion = filter_input(INPUT_GET, 'ac') ?? '';
$idPedido = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$sucursal = $_SESSION['Cod_sucursal'] ?? null;

// Validar sesión activa y sucursal
if (!$sucursal) {
    die("Error: Sesión no válida o sucursal no establecida.");
}

// Obtener tablas necesarias
$tablaProductos = view_tabla2("productos");
$tablaStock = view_tabla2("stock WHERE Cod_sucursal='" . htmlspecialchars($sucursal) . "'");
$tablaPedido = view_tabla2("pedido WHERE Cod_sucursal='" . htmlspecialchars($sucursal) . "'");

// Lógica para manejar nuevo pedido o pedido existente
if ($accion == "nuevo") {
    // Obtener el último idPedido y asignar uno nuevo
    $ultimoPedido = end($tablaPedido);
    $idPedido = $ultimoPedido ? $ultimoPedido['idPedido'] + 1 : 1;
} elseif ($accion == "ver") {
    // Buscar el pedido correspondiente a la mesa
    foreach ($tablaPedido as $pedido) {
        if ($pedido['mesa'] == $mesa) {
            $nombre = $pedido['cliente'];
            $idPedido = $pedido['idPedido'];
            break;
        }
    }
}

// Obtener los detalles del pedido
$tablaPedidoCliente = search_pedido($nombre, $mesa, $idPedido);
$cantPedido = 0;
$total = 0;

// Calcular cantidad total de productos y el costo total
foreach ($tablaPedidoCliente as $pedido) {
    if ($idPedido == $pedido['idPedido']) {
        $cantPedido += $pedido['cantidad'];
        foreach ($tablaProductos as $producto) {
            if ($pedido['producto'] == $producto['Nombre']) {
                $total += $producto['Costo'] * $pedido['cantidad'];
                break;
            }
        }
    }
}
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
            <!-- Información del pedido -->
            <div id="carrito" class="carrito">
                <h2><span class="material-symbols-outlined" style="font-size: 1.7rem;">menu_book</span> Pedido</h2>
                <p>Cliente: <b><?= htmlspecialchars($nombre) ?></b></p>
                <p>Cantidad Productos: <b><?= $cantPedido ?></b></p>
                <p>Total: <b>$<?= $total ?></b></p>
                <button class="buton-carrito-r" onclick="realizar_pedido(<?= htmlspecialchars($mesa) ?>, <?= $idPedido ?>, <?= htmlspecialchars($sucursal) ?>)">
                    <span class="material-symbols-outlined" id="buton-ico">check</span>
                    <span class="buton-text">Realizar Pedido</span>
                </button>
                <button class="buton-carrito-c" onclick="eliminar_pedido(<?= $idPedido ?>, 'elPedido', <?= htmlspecialchars($sucursal) ?>)">
                    <span class="material-symbols-outlined" id="buton-ico">close</span>
                    <span class="buton-text">Cancelar Pedido</span>
                </button>
            </div>

            <!-- Menú de productos -->
            <div class="pedido-menu">
                <div class="pedido-caja">
                    <h3><span class="material-symbols-outlined">restaurant_menu</span> Productos Disponibles</h3>
                    <table id="table" border="1">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Agregar</th>
                        </tr>
                        <?php foreach ($tablaProductos as $producto): ?>
                            <?php foreach ($tablaStock as $stock): ?>
                                <?php if ($producto['Nombre'] == $stock['Nombre'] && $stock['Cantidad'] > 0): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($producto['Nombre']) ?></td>
                                        <td><?= htmlspecialchars($producto['Descripcion']) ?></td>
                                        <td>$<?= $producto['Costo'] ?></td>
                                        <td>
                                            <button class="buton-agregar" onclick="addPedido('<?= htmlspecialchars($producto['Nombre']) ?>', <?= htmlspecialchars($mesa) ?>, <?= $idPedido ?>, '<?= htmlspecialchars($nombre) ?>', <?= htmlspecialchars($sucursal) ?>)">
                                                <span class="material-symbols-outlined">add_circle</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Productos seleccionados -->
                <div class="pedido-caja">
                    <h3><span class="material-symbols-outlined">list_alt</span> Pedido</h3>
                    <?php if (!empty($tablaPedidoCliente)): ?>
                        <table id="table" border="1">
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Eliminar</th>
                            </tr>
                            <?php foreach ($tablaPedidoCliente as $pedido): ?>
                                <?php if ($pedido['cantidad'] > 0): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($pedido['producto']) ?></td>
                                        <td><?= $pedido['cantidad'] ?></td>
                                        <td>
                                            <button class="buton-agregar" style="background-color: red;" onclick="eliminar_pedidoProducto(<?= $idPedido ?>, '<?= htmlspecialchars($pedido['producto']) ?>', 'elProducto')">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <h4>*No se agregó ningún producto</h4>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
require'conexion.php';
$dire = filter_input(INPUT_POST, 'direccion');
$capa = filter_input(INPUT_POST, 'capacidad');
$co = filter_input(INPUT_POST, 'supervisor');
$fecha = filter_input(INPUT_POST, 'fecha');
$cant = filter_input(INPUT_POST, 'cant');
$cod = $_GET['cod'];

$change=$conexion->prepare("UPDATE sucursales SET Direccion=:dir, Capacidad=:cap, Cod_supervisor=:cod_s, Fecha=:fec, Cant_empleados=:c_e WHERE sucursales.Cod_sucursal= :code ");
    $change->bindParam(':dir',$dire);
    $change->bindParam(':cap',$capa);
    $change->bindParam(':cod_s',$co);
    $change->bindParam(':fec',$fecha);
    $change->bindParam(':c_e',$cant);
    $change->bindParam(':code',$cod);
    $change->execute();
    header('location:view_sucursales.php')
?>
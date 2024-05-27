<?php
include'header.php';
require'../Modelos/consultas.php';
$direccion = filter_input(INPUT_POST, 'direccion');
$capacidad = filter_input(INPUT_POST, 'capacidad');
$cod_supervisor = filter_input(INPUT_POST, 'supervisor');
$fecha = filter_input(INPUT_POST, 'fecha');
$codigo = $_GET['cod'];
echo($direccion.$capacidad.$cod_supervisor.$fecha.$codigo);
updateSucursal($direccion,$capacidad,$cod_supervisor,$fecha,$codigo);
header('location:../Vistas/view_sucursales.php')
?>
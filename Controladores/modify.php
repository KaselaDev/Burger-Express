<?php
require'../Modelos/consultas.php';
$direccion = filter_input(INPUT_POST, 'direccion');
$capacidad = filter_input(INPUT_POST, 'capacidad');
$cod_supervisor = filter_input(INPUT_POST, 'supervisor');
$fecha = filter_input(INPUT_POST, 'fecha');
$cantidad = filter_input(INPUT_POST, 'cant');
$codigo = $_GET['cod'];
modify($direccion,$capacidad,$cod_supervisor,$fecha,$cantidad,$codigo);
header('location:view_sucursales.php')
?>
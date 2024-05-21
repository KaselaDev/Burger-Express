<?php
    require "conexion.php";
    $ubi=filter_input(INPUT_GET,'ubi');
    $consulta=$conexion->prepare("DELETE FROM productos WHERE Id_producto=:ub");
    $consulta->bindParam(":ub",$ubi);
    $consulta->execute();
    header('Location:listado_producto.php');
?>
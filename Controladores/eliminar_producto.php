<?php
    require "../Modelos/consultas.php";
    $ubi=filter_input(INPUT_GET,'ubi');
    delete($ubi);
    header('Location:../Vistas/listado_producto.php');
?>
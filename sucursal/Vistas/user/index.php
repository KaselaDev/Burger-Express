<?php include 'header_user.php';
include '../../Modelos/consultas.php';
date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
$fecha = date("Y-m-d");
$set = getCaja($fecha);
if(empty($set)){
    if(isset($_POST['caja'])){
            postOpen($_POST['caja'],$_SESSION['usuario']);
    } 
    else{
        echo'<script type="text/javascript" src="../JavaScript/index.js"></script>';
    }
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    
</head>
<body>
    <section class="menu">
        <a href="cola_pedidos.php" class="inicio">
            <span class="material-symbols-outlined">assignment</span>
            <h2>Pedidos</h2>
        </a>
        <a href="menu_pedidos.php" class="inicio">
            <span class="material-symbols-outlined">assignment_add</span>
            <h2>Realizar Pedidos</h2>
        </a>
         <a href="../caja.php" class="inicio">
            <span class="material-symbols-outlined">assignment_add</span>
            <h2>Caja</h2>
        </a>
        <a href="infoStock.php" class="inicio">
            <span class="material-symbols-outlined">monitoring</span>
            <h2>Stock</h2>
        </a>
    </section>
</body>
</html>
<?php session_start(); require '../../Modelos/consultas.php'; $info=view_tabla2('infosucursal');?>
<nav id='menu'>
  <div style="display: flex;margin-left: 20px;align-items: center;gap:10px;">
    <div style="display: flex;align-items: center;">
      <img src="data:image/jpg;base64,<?= $info[0]['logo'] ?>" width="40" height="40">
      <h2 style="margin:0"><?= $info[0]['nombre'] ?></h2> 
    </div>
    <h4 id="sucursal"><?= $_SESSION['sucursal'] ?></h4>
  </div>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label> 
  <ul>
    <li><a href='index.php'>Inicio</a></li>
    <li><a href="cola_pedidos.php">Pedidos</a></li>
    <li><a href="menu_pedidos.php">Realizar Pedido</a></li>
    <li><a href="infoStock.php">Stock</a></li>
    <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
        <ul class="sub-menus">
           <li><a href='../../Controladores/cerrarSesion.php'>Cerrar Sesion</a></li> 
        </ul>
    </li>
  </ul>
</nav>

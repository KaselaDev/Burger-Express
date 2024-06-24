<?php session_start(); require '../Modelos/consultas.php'; $info=view_tabla('infosucursal'); ?>
<nav id='menu'>
  <div style="display: flex;margin-left: 20px;width: 30%;flex-direction: column;">
    <div style="display: flex;align-items: center;">
      <img src="data:image/jpg;base64,<?= $info[0]['logo'] ?>" width="40" height="40">
      <h2 style="margin:0"><?= $info[0]['nombre'] ?></h2> 
    </div>
    <h4 style="color: #00000099;"><?= isset($_SESSION['sucursal']) ? 'Sucursal: '.$_SESSION['sucursal'] : ''; ?></h4>     
  </div>
  
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='select.php'>Inicio</a></li>
    <li><a href='view_sucursales.php'>Sucursales</a></li>
    <li><a href='view_empleados.php'>Empleados</a></li>
    <li><a href='view_productos.php'>Productos</a></li>
    <li><a href='infoStock.php'>Stock</a></li>
    <li><a href='estadisticas.php'>Estadisticas Ventas</a></li>
    <li><a href='caja.php'>Control</a></li>
    <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
        <ul class="sub-menus">
           <li><a href='./view_config.php'>Configuración</a></li> 
           <li><a href='../Controladores/cerrarSesion.php'>Cerrar Sesion</a></li> 
        </ul>
    </li>
  </ul>
</nav>

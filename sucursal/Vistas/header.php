<?php session_start(); ?>
<nav id='menu'>
  <h2>Rapidash</h2>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='index.php'>Inicio</a></li>
    <li><a href='view_sucursales.php'>Sucursales</a></li>
    <li><a href='view_empleados.php'>Empleados</a></li>
    <li><a href='view_productos.php'>Productos</a></li>
    <li><a href='infoStock.php'>Stock</a></li>
    <li><a href='estadisticasVentas.php'>Estadisticas Ventas</a></li>
    <li><a href='caja.php'>Control</a></li>

    <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
        <ul class="sub-menus">
           <li><a href='../Controladores/cerrarSesion.php'>Cerrar Sesión</a></li> 
        </ul>
    </li>
  </ul>
</nav>

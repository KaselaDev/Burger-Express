<?php if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
} ?>
 <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<nav id='menu'>
  <h2>Rapidash</h2>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
   <?php
    if(isset($_SESSION['Cod_sucursal'])){
        echo'<h4 id="sucursal">
    Sucursal:';
        echo $_SESSION['sucursal']."</h4>";
        ?> 
  <ul>
        <li><a href='select.php'>Inicio</a></li>
        <li><a href='view_sucursales.php'>Sucursales</a></li>
        <li><a href='view_empleados.php'>Empleados</a></li>
        <li><a href='view_productos.php'>Productos</a></li>
        <li><a href='infoStock.php'>Stock</a></li>
    <li><a href='estadisticas.php'>Estadisticas Ventas</a></li>
    <li><a href='caja.php'>Control</a></li>
<?php 
}
?>
    <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
        <ul class="sub-menus">
           <li><a href='../Controladores/cerrarSesion.php'>Cerrar Sesión</a></li> 
        </ul>
    </li>
  </ul>
</nav>

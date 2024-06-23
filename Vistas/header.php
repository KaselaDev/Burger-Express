<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}
define("URLP", "C:/xampp/htdocs/sucursalV4/sucursal/sucursal/"); 
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<nav id='menu'>
  <h2>Rapidash</h2>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'>
  <?php
    if(isset($_SESSION['sucursal'])){
        echo'<h4 id="sucursal">
    Sucursal:';
        echo $_SESSION['sucursal'];
        ?>
        </h4>
          <ul>
            <li><a href='index.php'>Inicio</a></li>
            <li><a href='select.php'>Sucursales</a></li>
            <li><a href='view_empleados.php'>Empleados</a></li>
            <li><a href='view_productos.php'>Productos</a></li>
            <li><a href='infoStock.php'>Stock</a></li>
            <li><a href='estadisticas.php'>Estadisticas Ventas</a></li>
            <li><a href='caja.php'>Control</a></li>
            <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
                <ul class="sub-menus">
                   <li><a href='../Controladores/cerrarSesion.php'>Cerrar Sesión</a></li> 
                </ul>
            </li>
          </ul>
        

        <?php
    }
  ?>
</nav>

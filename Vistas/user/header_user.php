<?php
  define("URLP", "C:/xampp/htdocs/sucursalV4/sucursal/"); 
require URLP.'Modelos/consultas.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}
date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
$fecha = date("Y-m-d");
$set = getCaja($fecha);
if(empty($set)){
    if(isset($_POST['caja'])){
            postOpen($_POST['caja'],$_SESSION['DNI']);
    } 
    else{
        echo'<script type="text/javascript" src="../JavaScript/index.js"></script>';
    }
}?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<nav id='menu'>
  <h2><svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M44 22C44 12.0589 35.0457 4 24 4C12.9543 4 4 12.0589 4 22H44Z" fill="none" stroke="#000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><rect x="4" y="38" width="40" height="6" fill="none" stroke="#000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 28L9.45455 32L16.7273 28L24 32L31.2727 28L38.5455 32L44 28" stroke="#000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>Rapidash</h2>
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><h4 id="sucursal">
    Sucursal:
  <?php
    echo $_SESSION['sucursal'];
  ?>
</h4>
  <ul>
    <li><a href='index.php'>Inicio</a></li>
    <li><a href="cola_pedidos.php">Pedidos</a></li>
    <li><a href="menu_pedidos.php">Realizar Pedido</a></li>
    <li><a href='../caja.php'>Control</a></li>

    <li><a href="infoStock.php">Stock</a></li>
    <li><a class="dropdown-arrow">Usuario: <?= $_SESSION['usuario'] ?></a>
        <ul class="sub-menus">
           <li><a href='../../Controladores/cerrarSesion.php'>Cerrar Sesión</a></li> 
        </ul>
    </li>
  </ul>
</nav>

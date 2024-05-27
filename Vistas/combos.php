 <!DOCTYPE html>
 <html>
 <head>
     <title></title>
     <link rel="stylesheet" type="text/css" href="styles/combos.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
 </head>
 <body>
    <center><h2>Combos disponibles</h2></center>
    <div class="productos-container">    
        <?php
            require'../Modelos/consultas.php';
            $combos = getCombos();
            session_start();
            foreach ($combos as $combo) {
                echo "<div class='producto'>";
                echo "<img class='productImg' src=images/img_".$combo['id_combo'].".jfif >";
                echo "<div class='producto-contenido'>";
                echo "<h3>" . $combo['nombre'] . "</h3>";
                echo "<p>Precio: $" . $combo['precio'] . "</p>";
                echo'<a href= "combos.php?id='.$combo['id_combo'].'"><span class="material-symbols-outlined">
add_shopping_cart
</span></a>';
                echo "</div>";
                echo "</div>";
            } 
        if(isset($_GET['id'])){

            if(isset($_SESSION['id'])){
                $_SESSION['total'] = $_SESSION['total']+getCosto($_SESSION['id']);
                updatePedido($_SESSION['id']);
                echo'</div><div id="botones">
                        <a class="submit" href="ver_pedido.php">Ver pedido</a>
                        <a class="submit" href="realizar_pedido.php?id='.$_SESSION['id'].'">Realizar pedido</a>';
            }
            else{
                $info="a";
                $nombre="a";
                $_SESSION['id'] = postPedido($nombre,$_GET['id'],$info);
                echo($_SESSION['id']);
                $_SESSION['total'] = getCosto($_SESSION['id']);
            }
        }
       
        ?>
    </div>
    </body>
 </html>
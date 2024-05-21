<?php
include 'header.php';
    $arn=fopen('nombre.csv','r');
	$nom=fgets($arn);
	fclose($arn);

    $total=0;
    $cant=0;

    if (isset($_POST['buton-ingre'])) {//SI PRESIONA EL BOTON 
        $archi=fopen('pedido.csv', 'a');

        fwrite($archi, $i_nom.",".$i_pre.",".$i_in1." ".$i_in2." ".$i_in3."\n");
        fclose($archi);
    }//SI PRESIONA EL BOTON 

    if (file_exists('pedido.csv')) {//SI pedido.csv EXISTE
        $ar=fopen('pedido.csv', 'r');
        while (!feof($ar)) {//MIENTRAS NO LLEGE AL FINAL DE pedido.csv
            $datos[]=explode(',', fgets($ar));
        }//MIENTRAS NO LLEGE AL FINAL DE pedido.csv

        for ($i=0; $i <= count($datos)-2; $i++) {//FOR CALCULA EL TOTAL y LA CANTIDAD 
            $total=$total+$datos[$i][1];
            $cant=count($datos)-1;
        }//FOR CALCULA EL TOTAL y LA CANTIDAD
        fclose($ar);
    }//SI pedido.csv EXISTE

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Pedido</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    	function cancelar() {
    		Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA ELEGIR INGREDIENTES
                title: "Seguro",
                text: "Seguro quieres cancelar el pedido?",
                icon: "warning",
                showDenyButton: true,
				confirmButtonText: "Realizar",
				denyButtonText: `Cancelar`,
                allowOutsideClick: true,
                showCloseButton: true,
                footer: "Esta informacion es importante",
            })//MUESTRA UNA VENTANA EMERGENTE PARA ELEGIR INGREDIENTES
            .then((result) => {//PARA SABER LA RESPUESTA DE Swal.fire
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {//SI DESAE CANCELAR
				    Swal.fire({
				    	title: "Se ha Cancelado el pedido!", 
				    	icon: "success",
				    	showConfirmButton: false,
				    	timer: 1000,
				    }).then((res)=>{
				    	if (res) {//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				    		window.location.assign("cancelar_pedido.php");
				    	}//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				    });
				}//SI DESA CANCELAR
			});//PARA SABER LA RESPUESTA DE Swal.fire
    	}

    	function realizar() {
    		Swal.fire({
				title: "Se Realizado el pedido!", 
				icon: "success",
				showConfirmButton: false,
				timer: 1000,
			}).then((res)=>{
				if (res) {//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
				    window.location.assign("realizar_pedido.php");
				}//UNA VEZ LO ACEPTE LO REDIRECCIONE A UNA PAGINA
			});
    	}
    </script>
</head>
<body>

<!-- CARRITO -->
<section id="carrito" class="carrito">
    <div class="caja-pedido">
        <h2><svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="8" y="4" width="32" height="40" rx="2" fill="none" stroke="#333" stroke-width="4" stroke-linejoin="round"/><path d="M21 14H33" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 24H33" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 34H33" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15 16C16.1046 16 17 15.1046 17 14C17 12.8954 16.1046 12 15 12C13.8954 12 13 12.8954 13 14C13 15.1046 13.8954 16 15 16Z" fill="#333"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15 26C16.1046 26 17 25.1046 17 24C17 22.8954 16.1046 22 15 22C13.8954 22 13 22.8954 13 24C13 25.1046 13.8954 26 15 26Z" fill="#333"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15 36C16.1046 36 17 35.1046 17 34C17 32.8954 16.1046 32 15 32C13.8954 32 13 32.8954 13 34C13 35.1046 13.8954 36 15 36Z" fill="#333"/></svg>Pedido</h2>
        <p>De:<b><?php echo $nom ?></b></p>
        <p>Cantidad Platos <b><?php echo $cant; ?></b></p>
        <p>Total: <b>$<?php echo $total; ?></b></p>
        <a href="#"><button class="buton-carrito-c" onclick="cancelar()">Cancelar Pedido</button></a>
        <a href="#"><button class="buton-carrito-r" onclick="realizar()">Realizar Pedido</button></a>
    </div>
</section>


<!-- PLATOS -->
<section class="menu-productos">
        <?php
        	if (file_exists("pedido.csv")) {///SI EL ARCHIVO pedido.csv existe
       	?>
        		<h1 style="text-align: center;"><svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 4V44" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 5V15C8 20 14 20 14 20C14 20 20 20 20 15V5" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M37 4L40 44" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><path d="M31 4L28 44" stroke="#333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>  PEDIDO</h1>
    				<div class="productos-container">`;
	    <?php    	
	        	$arc=fopen('pedido.csv', 'r');
			    while (!feof($arc)) {//MIENTRAS NO LLEGE AL FINAL DE pedido.csv
			        $datos[]=explode(',', fgets($arc));
			    }//MIENTRAS NO LLEGE AL FINAL DE pedido.csv
			    
			    for ($i=0; $i < (count($datos)/2)-1; $i++) { 
			    	echo "<div class='producto' >";
		                echo "<img src='' width='150' height='100' >";
		                echo "<div class='producto-contenido'>";
		                echo "<h3>" . $datos[$i][0] . "</h3>";
		                echo "<p>Precio: $" . $datos[$i][1]. "</p>";
		                echo "</div>";
		                echo "</div>";
			    }
			    echo `</div>`;	
        	}///SI EL ARCHIVO pedido.csv existe
        ?>
    

</section>
</body>
</html>
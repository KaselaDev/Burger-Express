<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../Vistas/styles/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function nombre(){
            const contenido=`<form action="pedido.php" method="post">
                Ingrese el nombre del cliente 
                <p>
                <input type="text" name="nombre" placeholder="Ingrese nombre" class="swal2-input" required>
                <p>
                <button type="submit" class="buton-carrito-r">Ingresar</button>
                </form`;
            Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
                title: "Pedido",
                html: contenido,
                allowOutsideClick: true,
                showConfirmButton: false,
                footer: "Esta informacion es importante",
            });//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
            
        }
    </script>
</head>
<body>
    	
    	 <div class="menu">   
            <ul class="links">
                <li><a href="select.php"><input id="input_head" type="submit" value="Ver stock de sucursales"></a></li>
                <li><a onclick="nombre()"><input id="input_head" type="submit" value="Ingresar pedido"></a></li>
                 <li><a href="../Controladores/view_sucursales.php"><input id="input_head" type="submit" value="Ver sucursales"></a></li>
            </ul>     
    </div>
</body>
</html>

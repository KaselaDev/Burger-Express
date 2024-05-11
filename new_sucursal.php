<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar sucursal</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    
</html>
<script type="text/javascript">
 		const contenido=`<form action="up_sucursal.php" method="post">
            Ingrese la direccion de la sucursal 
            <p>
            	<input type="text" name="dir" class="swal2-input" required>
            <p>
            <br>
            	Ingrese la capacidad
            <p>
            	<input type="text" name="cap" class="swal2-input" required>
            <p>
            	<button type="submit" class="buton-carrito-r">Registrar</button>
            </form>
            <p style="margin-top:10px;"></p>
            <a href="index.php"><button class="buton-carrito-c">Volver</button></a>`;
            Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
                title: "Nueva sucursal",
                html: contenido,
                allowOutsideClick: false,
                showConfirmButton: false,
                footer: "",
            });//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
</script>
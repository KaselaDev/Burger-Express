<!DOCTYPE html>
<html>
<head>
	<title>View sucursales</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<style type="text/css">
	.material-symbols-outlined {
		cursor: pointer;
		background: #F33627;
		border-radius: 4px;
	  font-variation-settings:
	  'FILL' 0,
	  'wght' 400,
	  'GRAD' 0,
	  'opsz' 24
	}
	a{
		text-decoration: none;
		color: black;
	}
	a .material-symbols-outlined {
		background:#099122 ;
	}
		#table{
	    margin-left: 15%;
	    margin-top: 20px;
	    border-collapse: collapse;
	    text-align: center;
	    align-items: center;
	}
	.del{
		background: red;
	}
	#table th{
		padding: 4px;
		background: cadetblue;

	}
	#table td{
		
		padding: 4px;
	}
	#table tr:hover{
		background: gray;
	}
	#table .gray{
		background: #D6D6E0;
	}

</style>
<nav class="nav">
	<h2>Titulo</h2>
	<ul class="nav-menu">
		<li class="nav-menu-item"><a href="index.php">Inicio</a></li>
		<li class="nav-menu-item"><a href="pedido.php">k</a></li>
		<li class="nav-menu-item"><a href="select.php">Estadisticas</a></li>
	</ul>
</nav>
</html>


    <script type="text/javascript">

    	function eliminar (){
			Swal.fire({
	  			title: "Realmente desea eliminar esta sucursal?",
	 			text: "",
	  			icon: "warning",
	  			showCancelButton: true,
	  			confirmButtonColor: "#3085d6",
	  			cancelButtonColor: "#d33",
	  			confirmButtonText: "Si, Eliminarla!"
			}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "view_sucursales.php"
    
  			}
		});
    }
        function modificar(a, b, c, d, e, f){
            const contenido= `<form action='modify.php?cod=${a}' method="post">
                
                Direccion:
                <p>
                <input type="text" name="direccion" placeholder="${b}" class="swal2-input">
                <p>
                Capacidad:
                <p>
                 <input type="text" name="capacidad" placeholder="${c}" class="swal2-input">
                <p> 
                Supervisor
                <p>
                 <input type="text" name="supervisor" placeholder="${d}" class="swal2-input" >
                <p>
                Fecha
                <p>
                <input type="date" name="fecha" placeholder="${e}" class="swal2-input">
                <p>
                Cantidad de empleados
                <p>
                 <input type="text" name="cant" placeholder="${f}" class="swal2-input">
                <p>
                <button type="submit" class="buton-carrito-r">Modificar</button>
                </form>
                <p style="margin-top:10px;">
                <br>
                <a href="view_sucursales.php"><button class="buton-carrito-c">Volver</button></a></p>`;
            Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
                title: "Modificar",
                html: contenido,
                allowOutsideClick: true,
                showConfirmButton: false,
                footer: "",
            });//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
            
        }
        function add(){
            const contenido= `<form action='up_sucursal.php' method="post">
                
                Direccion:
                <p>
                <input type="text" name="dir"  class="swal2-input" required>
                <p>
                Capacidad:
                <p>
                 <input type="text" name="cap"  class="swal2-input" required>
                <p>
                Cantidad de empleados
                <p>
                 <input type="text" name="cant" class="swal2-input" required>
                <p>
                <button type="submit" class="buton-carrito-r">Ingresar</button>
                </form>
                <p style="margin-top:10px;">
                <br>
                <a href="view_sucursales.php"><button class="buton-carrito-c">Volver</button></a></p>`;
            Swal.fire({//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
                title: "Nueva sucursal",
                html: contenido,
                allowOutsideClick: true,
                showConfirmButton: false,
                footer:"Luego debera asignar los empleados y supervisor correspondientes",
            });//MUESTRA UNA VENTANA EMERGENTE PARA INGRESAR NOMBRE
            
        }
	</script>
<?php
	require'conexion.php';
	if(isset($_GET['mod'])){
		$cod = $_GET['codigo'];
		$consulta = $conexion->prepare("SELECT * FROM sucursales WHERE `Cod_sucursal` = '$cod'");
		$consulta->execute();
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		foreach ($datos as $elemento) {
			$a=$elemento['Cod_sucursal'];
			$b='"'.$elemento['Direccion'].'"';
			$c=$elemento['Capacidad'];
			$d='"'.$elemento['Cod_supervisor'].'"';
			$e='"'.$elemento['Fecha'].'"';
			$f=$elemento['Cant_empleados'];

		}
		?>
			<script>modificar(<?php echo $a ?>,<?php echo $b ?>,<?php echo $c ?>,<?php echo $d ?>,<?php echo $e ?>,<?php echo $f ?>)
			</script>
		<?php
	}
	
		$consulta = $conexion->prepare("SELECT * FROM sucursales");
		$consulta->execute();
		$cuenta=$consulta->rowcount();
		if($cuenta==0){
			 echo "<script type='text/javascript'>alert('No se han registrado turnos agendados');</script>";
        	echo "<p><center><h3><a href='menuUsuario.html'>Ir al inicio</a></h3></center>";
		}
		else{
		$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
		echo"<table id='table'border='1'><thead><th>Cod. Sucursal</th><th>Direccion</th><th>Capacidad</th><th>Fecha de alta</th><th>Empleado a cargo</th><th>Cantidad de empleados</th><th>Modificar</th><th>Eliminar</th></thead><tbody>";
		$c=0;
		foreach($datos as $elemento){
			$c++;
			if($c%2==0){
				echo"<tr class='gray'>";
			}
			else{
				echo"<tr class='white'>";

			}
			echo"<td>".$elemento['Cod_sucursal']."</td><td>".$elemento['Direccion']."</td><td>".$elemento['Capacidad']."</td><td>".$elemento['Fecha']."</td><td>".$elemento['Cod_supervisor']."</td><td>".$elemento['Cant_empleados']."</td>";
			echo'<td><a style="font-size:80%" href="view_sucursales.php?codigo='.$elemento['Cod_sucursal'].'&mod=true"><span class="material-symbols-outlined">edit</span></a></td>
                                    <td><span class="material-symbols-outlined" onclick="eliminar()">delete</span></td></tr>';
            
		}
		echo'<tr><td><a><span class="material-symbols-outlined" onclick="add()">add</span></a></td></tr></tbody></table>';
		}
	
?>
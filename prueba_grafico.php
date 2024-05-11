<?php include 'header.php'; $sucursal =$_POST['sucursal'];?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Stock Sucursal <?php echo $sucursal; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

</head>
<body>
	<?php
    echo'<header class="h-esta">STOCK SUCURSAL: '.$sucursal.'</header>';
    

    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<div id="box">
    <canvas id="grafica" style="max-width:80%;"></canvas>
        <script>
 


// Obtener una referencia al elemento canvas del DOM

    const $grafica = document.querySelector("#grafica");
    // Las etiquetas son las que van en el eje X. 
    const etiquetas = ["Pan", "Medallon de carne", "Envoltorios", "Conos","Aderezos","Cheddar","Bacon","Cebolla","Papas","Vasos","Gaseosas","Aceite","Sal"];
const datos = [100, 86, 80, 100, 80, 34, 53, 63, 88, 76, 97, 76,20];
let mensaje=`Se pidieron a deposito los siguientes productos: `;

Swal.fire("Se pidio a deposito el siguiente producto: Sal");

    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datosVentas = {
        label: "Stock de materias primas en %",
        data: datos , // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
        borderWidth: 1,// Ancho del borde
    };
    
    
    new Chart($grafica, {
        type: 'bar',// Tipo de gráfica
        data: {
            labels: etiquetas ,
            datasets: [
                datosVentas,
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });

        </script>
    </div>
</body>

</html>
<?php include 'header.php'; $sucursal =$_POST['sucursal'];?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vistas/styles/styles.css">
    <title>Stock Sucursal <?= $sucursal; ?></title>
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
 


    const $grafica = document.querySelector("#grafica");
     const etiquetas = ["Pan", "Medallon de carne", "Envoltorios", "Conos","Aderezos","Cheddar","Bacon","Cebolla","Papas","Vasos","Gaseosas","Aceite","Sal"];
const datos = [100, 86, 80, 100, 80, 34, 53, 63, 88, 76, 97, 76,20];
let mensaje=`Se pidieron a deposito los siguientes productos: `;

Swal.fire("Se pidio a deposito el siguiente producto: Sal");

    const datosVentas = {
        label: "Stock de materias primas en %",
        data: datos , 
        backgroundColor: 'rgba(54, 162, 235, 0.2)', 
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
    };
    
    
    new Chart($grafica, {
        type: 'bar',
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
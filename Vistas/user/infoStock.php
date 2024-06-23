<?php
    require '../../Modelos/conexion.php';
        session_start();
        $sucursal=$_SESSION['Cod_sucursal'];
    $consulta=$conexion->prepare("SELECT * FROM `stock` WHERE Cod_sucursal=$sucursal");
    $consulta->execute();
    $datos=$consulta->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Stock</title>
    <style>
       
        .stockLista{
            background-color: rgb(255, 224, 255);
            padding: 5px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
        }
        .stock{
            width: 200px;
            padding: 10px 0;
            background-color: #b2b2b2;
            border-radius: 20px;
            text-align: center;
        }
        canvas{
            width: 400px;
            height: 400px;
            position: relative;
            left: -50%;
            transform: translate(25%);
        }
        .grafico{
            width: 2000px;
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <?php include 'header_user.php'; 
?>
    <h1>Informacion de stock</h1>
    <hr>
    <div class="grafico">
        <canvas id="GraficoStock"></canvas>
        <?php
            $dataStock=[];
            $nombreStock=[];
            foreach($datos as $db){
                $dataStock[] = $db['Cantidad'];
                $nombreStock[] = $db['Nombre'];
            }
            $dataStock=json_encode($dataStock);
            $nombreStock=json_encode($nombreStock);
        ?>
        <script>
            let dataStock = <?php echo $dataStock; ?>;
            let nombreStock = <?php echo $nombreStock; ?>;
            let datos
            const ctx = document.getElementById('GraficoStock');
            new Chart(ctx, {
              type: "bar",
              data: {
                labels: nombreStock,
                datasets: [{
                  label: 'stock general',
                  data: dataStock,
                  backgroundColor: 'red',
                  borderWidth: 0
                }]
              },
              options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  legend: {
                      position: 'top',
                  }
              }
            });
            
        </script>
    </div>
    <br><br><br>
    <hr>
    <div class="stockLista">
        
    <?php
        foreach($datos as $db){
            echo '<div class="stock">
                <h3>'.$db['Nombre'].' | '.$db['Cantidad'].'</h3>
            </div>';

        }
    ?>
    </div>
</body>
</html>
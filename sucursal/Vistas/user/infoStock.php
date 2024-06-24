<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Stock</title>
    <style>
        .content-stock,.grafico{
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            margin: 10px 0;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php 
        include 'header_user.php'; 
        //$tablaStock=view_tabla("stock WHERE Cod_sucursal='$_SESSION['sucursal']'");
     ?>
    <section>
        <?php 
            $sucursal=$_SESSION['Cod_sucursal'];
            $tablaSucursales=view_tabla2('sucursales');
            echo "<h2>Stock de Sucursal ";
                foreach ($tablaSucursales as $key) {
                    if ($key['Cod_sucursal'] == $sucursal ) {//Si para seleccionar la sucursal en la que seleciono
                        echo $key['Direccion']."</h2>";    
                    }//Si para seleccionar la sucursal en la que seleciono
                }
            $tablaStock=view_tabla2("stock WHERE Cod_sucursal='".$sucursal."'");
         ?>
         <!---------------------------------------------- 
            
                TABLA STOCK 

        ------------------------------------------------>
        <div class="content-stock">
            <h2>Tabla de Stock</h2>
            <table id="table" border="1" width="100%">
                <tr>
                    <th>###</th>
                    <th>Nombre</th>
                    <th>Cantidad(Unidad)</th>
                </tr>
                <?php
                    $n=1;
                    $bajoStock=[];
                    foreach($tablaStock as $db){
                        if($db['Cantidad']<5) { 
                            array_push($bajoStock, $db['Nombre']);
                        }//SI el stock es bajo gurader los nombres
                        $color = ($n%2)!=0 ? ' ' : 'class="gray"';
                        echo '<tr '.$color.'>
                            <td>'.$n.'</td> 
                            <td>'.$db['Nombre'].'</td> 
                            <td>'.$db['Cantidad'].'</td>
                        </tr>';
                        $n++;
                    }
                ?>  
            </table>
        </div> 
         <!---------------------------------------------- 
            
                GRAFICO STOCK 

        ------------------------------------------------>
        <div class="grafico">
            <h2>Grafico de Stock</h2>
            <div style="width: 70%;"><canvas id="GraficoStock" style="margin: 10px"></canvas></div>
            <?php
                $dataStock=[];
                $nombreStock=[];
                $stockColor=[];
                foreach($tablaStock as $db){
                    $dataStock[] = $db['Cantidad'];
                    $nombreStock[] = $db['Nombre'];
                }
                $dataStock=json_encode($dataStock);
                $nombreStock=json_encode($nombreStock);
                $bajoStock=json_encode($bajoStock);     
            ?>
            <script src="../JavaScript/infoStock.js"></script>
            <script>alertStock(<?= $bajoStock ?>)</script>
            <script>graficar(<?=$dataStock?>,<?=$nombreStock?>,"Cantidad","GraficoStock")</script>
        </div>
    </section>
</body>
</html>
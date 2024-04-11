 <?php

ob_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        table{

	text-align: center;
	border-collapse: collapse;
	 max-width: 1200px;
    width: 95%;
    margin: 0 auto;
}

th, td{
padding: 3px;
}

thead{
	background-color: rgba(0, 0, 0, 0.8);
	
	color: white;
}

tr:nth-child(even){
	background-color: #ddd;
}

.logo{
            position: absolute;
          
            margin-left: 84%;
}

    </style>
</head>
<body>

<?php
    // Muestra la fecha actual en el formato DD/MM/YYYY
    echo date('d/m/Y');
?>
<img class="logo"  src="http://<?php echo $_SERVER['HTTP_HOST'];?>./App_Inventario/img/logo.png" width='105' >
<center><h3>LISTADO DE VEHICULOS</h3></center>

                                <table class="table text-center">
                                     <thead class="thead-dark">
                                        <tr>
                                            <th style="text-align: center;">Tipo</th>
                                        <th style="text-align: center;">Descripción</th>
                                            <th style="text-align: center;">Marca</th>
                                            <th style="text-align: center;">Placa</th>
                                            <th style="text-align: center;">Año</th>
                                            <th style="text-align: center;">Color</th>
                                        
                                            <th style="text-align: center;">Bateria</th>
                                            <th style="text-align: center;">Observacion</th>
                                            <th style="text-align: center;">Estatus</th>
                                            <th style="text-align: center;">Fecha</th>
                                         
                                            
                                        </tr>
                                    </thead>
                                   <img src="" alt="">
                                    
                                        <?php
                                        require"./../../php/conexion.php";
                                        $queto= "SELECT * FROM vehiculo";
                                        $result= mysqli_query($conexion, $queto);
                                       while($fila = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                            <td style="text-align: center;"><?php echo $fila['tipo']?></td>
   <td style="text-align: center;"><?php echo $fila['descripcion'] ?></td>
      <td style="text-align: center;"><?php echo $fila['marca'] ?></td>
   <td style="text-align: center;"><?php echo $fila['placa'] ?></td>
     <td style="text-align: center;"><?php echo $fila['anio'] ?></td>
 
    <td style="text-align: center;"><?php echo $fila['color'] ?></td>
    <td style="text-align: center;"><?php echo $fila['bateria'] ?></td>
    <td style="text-align: center;"><?php echo $fila['observacion'] ?></td>
    <td style="text-align: center;"><?php echo $fila['estatus'] ?></td>
    <td style="text-align: center;"><?php echo $fila['fecha'] ?></td>
                                            
                                            </tr>
                                        
                                            <?php }?>


                                    
                                </table>
                           
                                
</body>
</html>
<?php

$html=ob_get_clean();
//echo $html;
require"./../../dompdf/autoload.inc.php";

use Dompdf\Dompdf;
$dompdf= new Dompdf();
$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$dompdf->stream("reporte de vehiculos.pdf", array("Attachment"=>false));



    ?>

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
<center><h3>LISTADO MATERIALES</h3></center>

                                <table class="table text-center">
                                     <thead class="thead-dark">
                                        <tr>
                                        <th style="text-align: center;">Descripción</th>
                                            <th style="text-align: center;">Serial de Numero</th>
                                            <th style="text-align: center;">Numero de Pack</th>
                                            <th style="text-align: center;">Ubicación</th>
                                            <th style="text-align: center;">Marca</th>
                                            <th style="text-align: center;">Cantidad</th>
                                            <th style="text-align: center;">Codigo</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Unidad de Medida</th>
                                            
                                        </tr>
                                    </thead>
                                   <img src="" alt="">
                                    
                                        <?php
                                        require"./../../php/conexion.php";
                                        $queto= "SELECT * FROM materiales";
                                        $result= mysqli_query($conexion, $queto);
                                       while($fila = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                            <td style="text-align: center;"><?php echo $fila['descripcion']?></td>
   <td style="text-align: center;"><?php echo $fila['serial_number'] ?></td>
   <td style="text-align: center;"><?php echo $fila['numero_de_pack'] ?></td>
     <td style="text-align: center;"><?php echo $fila['ubicacion'] ?></td>
    <td style="text-align: center;"><?php echo $fila['marca'] ?></td>
    <td style="text-align: center;"><?php echo $fila['cantidad'] ?></td>
    <td style="text-align: center;"><?php echo $fila['codigo'] ?></td>
    <td style="text-align: center;"><?php echo $fila['fecha'] ?></td>
    <td style="text-align: center;"><?php echo $fila['unidad_de_medida'] ?></td>
                                            
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
$dompdf->stream("reporte de materiales.pdf", array("Attachment"=>false));



    ?>
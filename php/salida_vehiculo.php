<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAB & WELD, C. A. INVENTARIO</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<?php
// Conexión a la base de datos
$conn = new PDO("mysql:host=localhost;dbname=sistema_inventariado", "root", "");

// Obtener datos del formulario
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$placa = $_POST['placa'];

$anio = $_POST['anio'];
$color = $_POST['color'];

$bateria = $_POST['bateria'];
$observacion = $_POST['observacion'];
$estatus = $_POST['estatus'];
$fecha= $_POST['fecha'];



// Establecer el nuevo estatus
$nuevoEstatus = "Retirado";

// Actualizar el estatus en la base de datos

$query = "UPDATE vehiculo SET estatus = :estatus WHERE placa = :placa";
$stmt = $conn->prepare($query);
$stmt->bindParam(':estatus', $nuevoEstatus);
$stmt->bindParam(':placa', $placa);
$stmt->execute();
  // Generar PDF de salida
  require_once '../dompdf/autoload.inc.php';

  $dompdf = new Dompdf\Dompdf();
  $dompdf->loadHtml('<h1>Salida de Vehiculo</h1><p>Descripción: '.$descripcion.'</p><p>Tipo: '.$tipo.'</p>
  <p>Marca: '.$marca.'</p> <p>Placa: '.$placa.'</p>
  <p>Año: '.$anio.'</p><p>Color: '.$color.'</p>
  <p>Bateria: '.$bateria.'</p><p>Observaciones: '.$observacion.'</p><p>Estatus: '.$nuevoEstatus.'</p><p>fecha: '.$fecha.'</p>');
   $dompdf->render();
   $pdfContent = $dompdf->output();
   // Establecer la zona horaria a Venezuela
   date_default_timezone_set('America/Caracas');
   // Guardar el PDF en el servidor
   $fechaHora = date('Ymd_His');
   
   // Generar el nombre del archivo PDF utilizando la fecha y la hora
   $file = 'salida_vehiculo_' . $fechaHora . '.pdf';
   $filePath = '../reportes_salida/' . $file;
   file_put_contents($filePath, $pdfContent);
   
   // Mostrar alerta y abrir una nueva ventana para mostrar el PDF
   echo '<script>';
       echo '  document.addEventListener("DOMContentLoaded", function() {';
       echo '    Swal.fire({';
       echo '      icon: "success",';
       echo '      title: "Salida de vehiculo correctamente",';
       echo '      showConfirmButton: false,';
       echo '      timer: 1500';
       echo '    }).then(function() {';
       echo '      var newWindow = window.open("", "_blank");';
       echo '      var form = document.createElement("form");';
       echo '      form.method = "GET";';
       echo '      form.action = "../reportes_salida/'.$file.'";';
       echo '      form.target = "_blank";';
       echo '      newWindow.document.body.appendChild(form);';
       echo '      form.submit();';
       echo '      window.location.href = "../views/vehiculos.php";';
       echo '    });';
       echo '  });';
       echo '</script>';

 

 




// Detener la ejecución del script
exit;
?>

</body>
</html>
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
$conexion = new PDO("mysql:host=localhost;dbname=sistema_inventariado", "root", "");

// Obtener datos del formulario
$descripcion = $_POST['descripcion'];
$serial_number = $_POST['serial_number'];

$ubicacion = $_POST['ubicacion'];

$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];


$fecha = $_POST['fecha'];




// Verificar disponibilidad de stock
$stmt = $conexion->prepare("SELECT cantidad FROM mobiliarios WHERE 	serial_number = ?");
$stmt->execute([$serial_number]);
$producto = $stmt->fetch();

if ($producto && $producto['cantidad'] >= $cantidad) {
  // Actualizar cantidad en la base de datos
  $nuevaCantidad = $producto['cantidad'] - $cantidad;
  $stmt = $conexion->prepare("UPDATE mobiliarios SET cantidad = ? WHERE serial_number = ?");
  $stmt->execute([$nuevaCantidad, $serial_number]);

  // Generar PDF de salida
  require_once '../dompdf/autoload.inc.php';

  $dompdf = new Dompdf\Dompdf();
  $dompdf->loadHtml('<h1>Salida de Mobiliarios</h1><p>Descripción: '.$descripcion.'</p><p>Serial de Numero: '.$serial_number.'</p>
  <p>Ubicación: '.$ubicacion.'</p>
  <p>Marca: '.$marca.'</p><p>Cantidad: '.$cantidad.'</p>
<p>Fecha: '.$fecha.'</p>');
   $dompdf->render();
   $pdfContent = $dompdf->output();
   // Establecer la zona horaria a Venezuela
   date_default_timezone_set('America/Caracas');
   // Guardar el PDF en el servidor
   $fechaHora = date('Ymd_His');
   
   // Generar el nombre del archivo PDF utilizando la fecha y la hora
   $file = 'salida_mobiliarios_' . $fechaHora . '.pdf';
   $filePath = '../reportes_salida/' . $file;
   file_put_contents($filePath, $pdfContent);
   
   // Mostrar alerta y abrir una nueva ventana para mostrar el PDF
   echo '<script>';
       echo '  document.addEventListener("DOMContentLoaded", function() {';
       echo '    Swal.fire({';
       echo '      icon: "success",';
       echo '      title: "Salida de mobiliarios correctamente",';
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
       echo '      window.location.href = "../views/mobiliarios.php";';
       echo '    });';
       echo '  });';
       echo '</script>';

 
} else {
  echo '
  <script>

Swal.fire({
  icon: "error",
  title: "Error",
  text: "No hay suficiente stock disponible."})
  .then((result) => {
    if (result.value) {
   
       window.location.href = "../views/mobiliarios.php";
    }
  
});

</script>';
}




// Detener la ejecución del script
exit;
?>

</body>
</html>
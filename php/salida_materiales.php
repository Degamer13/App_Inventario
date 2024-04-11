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
$numero_de_pack = $_POST['numero_de_pack'];
$ubicacion = $_POST['ubicacion'];

$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];

$codigo = $_POST['codigo'];
$fecha = $_POST['fecha'];

$unidad_de_medida = $_POST['unidad_de_medida'];



// Verificar disponibilidad de stock
$stmt = $conexion->prepare("SELECT cantidad FROM materiales WHERE codigo = ?");
$stmt->execute([$codigo]);
$producto = $stmt->fetch();

if ($producto && $producto['cantidad'] >= $cantidad) {
  // Actualizar cantidad en la base de datos
  $nuevaCantidad = $producto['cantidad'] - $cantidad;
  $stmt = $conexion->prepare("UPDATE materiales SET cantidad = ? WHERE codigo = ?");
  $stmt->execute([$nuevaCantidad, $codigo]);

  // Generar PDF de salida
  require_once '../dompdf/autoload.inc.php';

  $dompdf = new Dompdf\Dompdf();
  $dompdf->loadHtml('<h1>Salida de Materiales</h1><p>Descripción: '.$descripcion.'</p><p>Serial de Numero: '.$serial_number.'</p>
  <p>Numero de Pack: '.$numero_de_pack.'</p> <p>Ubicación: '.$ubicacion.'</p>
  <p>Marca: '.$marca.'</p><p>Cantidad: '.$cantidad.'</p>
  <p>Codigo: '.$codigo.'</p><p>Fecha: '.$fecha.'</p><p>Unidad de Medida: '.$unidad_de_medida.'</p>');
   $dompdf->render();
   $pdfContent = $dompdf->output();
   // Establecer la zona horaria a Venezuela
   date_default_timezone_set('America/Caracas');
   // Guardar el PDF en el servidor
   $fechaHora = date('Ymd_His');
   
   // Generar el nombre del archivo PDF utilizando la fecha y la hora
   $file = 'salida_material_' . $fechaHora . '.pdf';
   $filePath = '../reportes_salida/' . $file;
   file_put_contents($filePath, $pdfContent);
   
   // Mostrar alerta y abrir una nueva ventana para mostrar el PDF
   echo '<script>';
       echo '  document.addEventListener("DOMContentLoaded", function() {';
       echo '    Swal.fire({';
       echo '      icon: "success",';
       echo '      title: "Salida de material correctamente",';
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
       echo '      window.location.href = "../views/materiales.php";';
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
   
       window.location.href = "../views/materiales.php";
    }
  
});

</script>';
}




// Detener la ejecución del script
exit;
?>

</body>
</html>
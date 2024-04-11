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
$conex= mysqli_connect("localhost", "root", "", "sistema_inventariado");
mysqli_set_charset($conex,"utf8");
// Obtener datos del formulario
$descripcion = $_POST['descripcion'];

$serial_number = $_POST['serial_number'];

$ubicacion = $_POST['ubicacion'];

$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];


$fecha = $_POST['fecha'];



  $verifica_serial=mysqli_query($conex, "SELECT * FROM facilidades WHERE serial_number='$serial_number'");
if (mysqli_num_rows($verifica_serial)>0) {
  echo '

  <script>
  
  Swal.fire({
    icon: "error",
    title: "Error",
    text: "El Serial Ya Existe. Por Favor, Intentelo De Nuevo."})
    .then((result) => {
      if (result.value) {
         // Aquí puedes redirigir al usuario a la página de registro
         window.location.href = "../views/facilidades.php";
      }
    
  });
  
  </script>';
  
  exit();
  }




// Insertar entrada en la base de datos
$stmt = $conexion->prepare("INSERT INTO facilidades (descripcion, serial_number, ubicacion, marca, cantidad, fecha)
 VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$descripcion, $serial_number, $ubicacion, $marca, $cantidad, $fecha]);

// Generar PDF de entrada
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Entrada de Facilidades</h1><p>Descripción: '.$descripcion.'</p><p>Serial de Numero: '.$serial_number.'</p>
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
$file = 'entrada_facilidades_' . $fechaHora . '.pdf';
$filePath = '../reportes_entrada/' . $file;
file_put_contents($filePath, $pdfContent);

// Mostrar alerta y abrir una nueva ventana para mostrar el PDF
echo '<script>';
    echo '  document.addEventListener("DOMContentLoaded", function() {';
    echo '    Swal.fire({';
    echo '      icon: "success",';
    echo '      title: "Facilidades registrado correctamente",';
    echo '      showConfirmButton: false,';
    echo '      timer: 1500';
    echo '    }).then(function() {';
    echo '      var newWindow = window.open("", "_blank");';
    echo '      var form = document.createElement("form");';
    echo '      form.method = "GET";';
    echo '      form.action = "../reportes_entrada/'.$file.'";';
    echo '      form.target = "_blank";';
    echo '      newWindow.document.body.appendChild(form);';
    echo '      form.submit();';
    echo '      window.location.href = "../views/facilidades.php";';
    echo '    });';
    echo '  });';
    echo '</script>';


// Detener la ejecución del script
exit;
?>
  
  </body>
</html>
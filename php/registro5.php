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
$serial_number=$_POST['serial_number'];
$numero_pack = $_POST['numero_pack'];
$ubicacion = $_POST['ubicacion'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
$responsable = $_POST['responsable'];
$fecha = $_POST['fecha'];



$verifica_serial=mysqli_query($conex, "SELECT * FROM sistema WHERE serial_number='$serial_number'");
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
         window.location.href = "../views/sistemas.php";
      }
    
  });
  
  </script>';
  
  exit();
  }

// Insertar entrada en la base de datos
$stmt = $conexion->prepare("INSERT INTO sistema (descripcion, serial_number, numero_pack, ubicacion, marca, cantidad, responsable, fecha)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$descripcion, $serial_number, $numero_pack, $ubicacion, $marca, $cantidad, $responsable, $fecha]);

// Generar PDF de entrada
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Entrada de Sistemas</h1><p>Descripción: '.$descripcion.'</p><p>Serial de Numero: '.$serial_number.'</p>
<p>Numero de Pack: '.$numero_pack.'</p><p>Ubicación: '.$ubicacion.'</p>
<p>Marca: '.$marca.'</p><p>Cantidad: '.$cantidad.'</p>
<p>Responsable: '.$responsable.'</p><p>Fecha: '.$fecha.'</p>');
$dompdf->render();
$pdfContent = $dompdf->output();
// Establecer la zona horaria a Venezuela
date_default_timezone_set('America/Caracas');
// Guardar el PDF en el servidor
$fechaHora = date('Ymd_His');

// Generar el nombre del archivo PDF utilizando la fecha y la hora
$file = 'entrada_sistema_' . $fechaHora . '.pdf';
$filePath = '../reportes_entrada/' . $file;
file_put_contents($filePath, $pdfContent);

// Mostrar alerta y abrir una nueva ventana para mostrar el PDF
echo '<script>';
    echo '  document.addEventListener("DOMContentLoaded", function() {';
    echo '    Swal.fire({';
    echo '      icon: "success",';
    echo '      title: "Sistema registrado correctamente",';
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
    echo '      window.location.href = "../views/sistemas.php";';
    echo '    });';
    echo '  });';
    echo '</script>';


// Detener la ejecución del script
exit;
?>
  
  </body>
</html>
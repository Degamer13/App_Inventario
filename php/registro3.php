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
$modelo = $_POST['modelo'];

$color = $_POST['color'];
$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$serial_number=$_POST['serial_number'];
$cantidad = $_POST['cantidad'];


$fecha = $_POST['fecha'];

$verifica_codigo=mysqli_query($conex, "SELECT * FROM maquinarias_fijas WHERE codigo='$codigo'");
if (mysqli_num_rows($verifica_codigo)>0) {
  echo '

  <script>
  
  Swal.fire({
    icon: "error",
    title: "Error",
    text: "El Codigo Ya Existe. Por Favor, Intentelo De Nuevo."})
    .then((result) => {
      if (result.value) {
         // Aquí puedes redirigir al usuario a la página de registro
         window.location.href = "../views/maquinarias_fijas.php";
      }
    
  });
  
  </script>';
  
  exit();
  }
  $verifica_serial=mysqli_query($conex, "SELECT * FROM maquinarias_fijas WHERE serial_number='$serial_number'");
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
         window.location.href = "../views/maquinarias_fijas.php";
      }
    
  });
  
  </script>';
  
  exit();
  }


// Insertar entrada en la base de datos
$stmt = $conexion->prepare("INSERT INTO maquinarias_fijas (descripcion, modelo, color, codigo, marca, serial_number, cantidad, fecha)
 VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$descripcion, $modelo, $color, $codigo, $marca, $serial_number, $cantidad, $fecha]);

// Generar PDF de entrada
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>Entrada de Maquinarias Fijas</h1><p>Descripción: '.$descripcion.'</p><p>Modelo: '.$modelo.'</p>
<p>Color: '.$color.'</p> <p>Codigo: '.$codigo.'</p>
<p>Marca: '.$marca.'</p><p>Serial de Numero: '.$serial_number.'</p>
<p>Cantidad: '.$cantidad.'</p><p>Fecha: '.$fecha.'</p>');
$dompdf->render();
$pdfContent = $dompdf->output();
// Establecer la zona horaria a Venezuela
date_default_timezone_set('America/Caracas');
// Guardar el PDF en el servidor
$fechaHora = date('Ymd_His');

// Generar el nombre del archivo PDF utilizando la fecha y la hora
$file = 'entrada_maquinarias_fijas_' . $fechaHora . '.pdf';
$filePath = '../reportes_entrada/' . $file;
file_put_contents($filePath, $pdfContent);

// Mostrar alerta y abrir una nueva ventana para mostrar el PDF
echo '<script>';
    echo '  document.addEventListener("DOMContentLoaded", function() {';
    echo '    Swal.fire({';
    echo '      icon: "success",';
    echo '      title: "Maquinaria Fija registrada correctamente",';
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
    echo '      window.location.href = "../views/maquinarias_fijas.php";';
    echo '    });';
    echo '  });';
    echo '</script>';


// Detener la ejecución del script
exit;
?>
  
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    

<?php
require 'conexion.php';


$id= $_GET['id'];
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




$query=" UPDATE vehiculo SET  descripcion='$descripcion', tipo='$tipo',
 marca='$marca', placa='$placa', anio='$anio', color='$color'
 , bateria='$bateria', observacion='$observacion', estatus='$estatus', fecha='$fecha' WHERE id=$id";

$ejecute=mysqli_query($conexion, $query);
if ($ejecute) {
	?><script>
        Swal.fire({
  icon: 'success',
  title: "Excelente",
  text: "Los datos han sido actualizados con exito"})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/vehiculos.php";
    }
  
});
	
</script><?php
}else{
	echo "malo";
}
?>
</body>
</html>
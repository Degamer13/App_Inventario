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
$serial_number = $_POST['serial_number'];
$numero_de_pack = $_POST['numero_de_pack'];
$ubicacion = $_POST['ubicacion'];

$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];

$codigo = $_POST['codigo'];
$fecha = $_POST['fecha'];

$unidad_de_medida = $_POST['unidad_de_medida'];



$query=" UPDATE materiales SET  descripcion='$descripcion', serial_number='$serial_number',
 numero_de_pack='$numero_de_pack', ubicacion='$ubicacion', marca='$marca', cantidad='$cantidad'
 , codigo='$codigo', unidad_de_medida='$unidad_de_medida', fecha='$fecha' WHERE id=$id";

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
       window.location.href = "../views/materiales.php";
    }
  
});
	
</script><?php
}else{
	echo "malo";
}
?>
</body>
</html>
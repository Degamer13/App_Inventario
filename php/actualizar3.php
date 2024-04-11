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
$modelo = $_POST['modelo'];

$color = $_POST['color'];
$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$serial_number=$_POST['serial_number'];
$cantidad = $_POST['cantidad'];


$fecha = $_POST['fecha'];



$query=" UPDATE maquinarias_fijas SET  descripcion='$descripcion', modelo='$modelo',
 color='$color', codigo='$codigo', marca='$marca', serial_number='$serial_number'
 , cantidad='$cantidad', fecha='$fecha' WHERE id=$id";

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
       window.location.href = "../views/maquinarias_fijas.php";
    }
  
});
	
</script><?php
}else{
	echo "malo";
}
?>
</body>
</html>
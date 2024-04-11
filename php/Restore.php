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
include 'Connet.php';
$restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (60);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=0");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
	?>
	   <script>

Swal.fire({
  icon: 'success',
  title: "Excelente",
  text: "La base de datos fue restaurada de forma correcta"})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/home.php";
    }
  
});
</script>
	<?php
}else{
	?><script>
	alert("Ocurrio un error inesperado, no se pudo hacer la restauración completamente");
	window.location.href="../views/home.php";
  </script><?php
}
?>
</body>
</html>
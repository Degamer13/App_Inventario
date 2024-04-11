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
require"conexion.php";
    $id= $_GET['id'];

$respuesta1=$_POST["respuesta1"];
$respuesta2=$_POST["respuesta2"];
$respuesta3= $_POST['respuesta3'];


if (mysqli_connect_errno()) {
	printf("conexion fallida:%s\n", mysqli_connect_errno());
	exit();
}
$consulta="SELECT * FROM preguntas_seguridad where respuesta1='$respuesta1' and respuesta2='$respuesta2' and respuesta3='$respuesta3'";
if (!$resultado=mysqli_query($conexion, $consulta)) {
	echo("Error description:".mysqli_error($conexion));
}//$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_fetch_array($resultado, MYSQLI_ASSOC);

if ($filas["id_user"]) {

header('location:../views/reset_passwor.php?id='.$id);

	
}else{

	 ?>
        <script>
        
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Una de las repuestas es incorrecta"})
          .then((result) => {
            if (result.value) {
               // Aquí puedes redirigir al usuario a la página de registro
               window.location.href = "../index.php";
            }
          
        });
        
        </script>
     <?php

}
mysqli_free_result($resultado);
mysqli_close($conexion);


?>
</body>
</html>
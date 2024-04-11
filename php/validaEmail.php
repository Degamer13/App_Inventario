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

$email=$_POST["email"];

if (mysqli_connect_errno()) {
	printf("conexion fallida:%s\n", mysqli_connect_errno());
	exit();
}
$consulta="SELECT * FROM users where email='$email'";


if (!$result=mysqli_query($conexion, $consulta)) {
	echo("Error description:".mysqli_error($conexion));
}//$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_fetch_array($result, MYSQLI_ASSOC);

$result = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($result) > 0) {
	// Usuario y contraseña válidos

	

if ($result=mysqli_query($conexion, $consulta)) {
	$dato = array();	
	while ($dato[] = mysqli_fetch_assoc($result));
	echo("Error description:".mysqli_error($conexion));


header('location:../views/preguntas_seguridad.php?id=' .$dato[0]['id']);
	
}
}else{

	 ?>
      <script>
        
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "El correo electronico no se encuentra registrado"})
          .then((result) => {
            if (result.value) {
               // Aquí puedes redirigir al usuario a la página de registro
               window.location.href = "../views/login.php";
            }
          
        });
        
        </script>
    <?php

}
mysqli_free_result($result);
mysqli_close($conexion);


?>
</body>
</html>
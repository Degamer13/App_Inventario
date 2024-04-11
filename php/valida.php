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
require"../php/conexion.php";
$username=$_POST["username"];
$passwordd=$_POST["passwordd"];
$passwordd= hash('sha512', $passwordd);

session_start();


if (mysqli_connect_errno()) {
	printf("conexion fallida:%s\n", mysqli_connect_errno());
	exit();
}
$consulta="SELECT * FROM users where username='$username' and passwordd='$passwordd'";

if (!$result=mysqli_query($conexion, $consulta)) {
	echo("Error description:".mysqli_error($conexion));
}//$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_fetch_array($result, MYSQLI_ASSOC);

$result = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($result) > 0) {
	// Usuario y contraseña válidos

	

if ($filas["role_id"]==1) {
	$row = mysqli_fetch_assoc($result);
	$_SESSION["id"] = $row["id"];
	header('location:../views/home.php');
	
}

if ($filas["role_id"]==2){
	$row = mysqli_fetch_assoc($result);
	$_SESSION["id"] = $row["id"];
	//header('location:../contenido/home1.php');
echo"hola user";
}

if ($filas["estatus"]=='Inactivo'){
	echo '

<script>

Swal.fire({
  icon: "error",
  title: "Error",
  text: "El Usuario se encuentra Inactivo."})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/login.php";
    }
  
});

</script>';


}
}else{

    echo '

    <script>
    
    Swal.fire({
      icon: "error",
      title: "Error",
      text: "Usuario o Contraseña Incorrecta. Intentelo de Nuevo"})
      .then((result) => {
        if (result.value) {
           // Aquí puedes redirigir al usuario a la página de registro
           window.location.href = "../views/login.php";
        }
      
    });
    
    </script>';
    

}

mysqli_close($conexion);


?>
</body>
</html>

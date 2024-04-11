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
$username=$_POST['username'];
$email=$_POST['email'];
$passwordd= $_POST['passwordd'];
$passwordd= hash('sha512', $passwordd);

$estatus=$_POST['estatus'];
$role_id=$_POST['role_id'];




$query=" UPDATE users SET  username='$username', email='$email', passwordd='$passwordd', estatus='$estatus', role_id='$role_id' WHERE id=$id";

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
       window.location.href = "../views/usuarios.php";
    }
  
});
	
</script><?php
}else{
	echo "malo";
}
?>
</body>
</html>
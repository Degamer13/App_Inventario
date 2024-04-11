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

require'conexion.php';



$username=$_POST['username'];
$email=$_POST['email'];
$passwordd= $_POST['passwordd'];
$passwordd= hash('sha512', $passwordd);

$estatus=$_POST['estatus'];
$role_id=$_POST['role_id'];


$verifica_usuario=mysqli_query($conexion, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($verifica_usuario)>0) {
echo '

<script>

Swal.fire({
  icon: "error",
  title: "Error",
  text: "El Usuario Ya Existe. Por Favor, Intentelo De Nuevo."})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/nuevo_user.php";
    }
  
});

</script>';

exit();
}
$verifica_correo=mysqli_query($conexion, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($verifica_correo)>0) {
  echo '

  <script>
  
  Swal.fire({
    icon: "error",
    title: "Error",
    text: "El Correo Electrónico Ya Existe. Por Favor, Intentelo De Nuevo."})
    .then((result) => {
      if (result.value) {
         // Aquí puedes redirigir al usuario a la página de registro
         window.location.href = "../views/nuevo_user.php";
      }
    
  });
  
  </script>';
  
  exit();
  }

$query=" INSERT INTO users (username, email, passwordd, estatus, role_id)  VALUES('$username', '$email', '$passwordd', '$estatus', '$role_id')";

$ejecute=mysqli_query($conexion, $query);
if ($ejecute) {
?>

<script>

Swal.fire({
  icon: 'success',
  title: "Excelente",
  text: "El Usuario Se Registro Con Exito"})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/usuarios.php";
    }
  
});
</script>
<?php
}else{
echo "malo";
}


?>
  
</body>
</html>

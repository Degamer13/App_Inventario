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


$query=" UPDATE users SET username='$username', email='$email'  WHERE id=$id";

$ejecute=mysqli_query($conexion, $query);
if ($ejecute) {
  
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}else{
    echo "malo";
}
?>
</body>
</html>

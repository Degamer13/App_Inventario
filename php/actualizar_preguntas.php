<?php

require 'conexion.php';

$pregunta1=$_POST['pregunta1'];
$pregunta2=$_POST['pregunta2'];
$pregunta3=$_POST['pregunta3'];

$respuesta1=$_POST['respuesta1'];
$respuesta2=$_POST['respuesta2'];
$respuesta3=$_POST['respuesta3'];

$id_user=$_POST['id_user'];


$query = "SELECT * FROM preguntas_seguridad WHERE id_user = '$id_user'";
$result = mysqli_query($conexion, $query);
$user = mysqli_fetch_assoc($result);
if ($user['id_user'] != null) {
    // Update the user's security questions
    $query = "UPDATE preguntas_seguridad SET pregunta1= '$pregunta1', pregunta2 = '$pregunta2',  pregunta3 = '$pregunta3', respuesta1='$respuesta1', respuesta2='$respuesta2', respuesta3='$respuesta3', id_user='$id_user' WHERE id_user = '$id_user'";
    mysqli_query($conexion, $query);
     
  header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
    // Register the user's security questions
    $query = "INSERT INTO preguntas_seguridad (pregunta1, pregunta2, pregunta3, respuesta1, respuesta2, respuesta3,  id_user) VALUES ('$pregunta1', '$pregunta2', '$pregunta3', '$respuesta1',  '$respuesta2',  '$respuesta3', '$id_user')";
    mysqli_query($conexion, $query);
     
  header("Location: " . $_SERVER["HTTP_REFERER"]);
}
// Close the database connection
mysqli_close($conexion);





?>
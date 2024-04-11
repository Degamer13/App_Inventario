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

// Usamos el comando "unlink" para borrar el fichero
unlink($_GET["name"]);

// Redirigiendo hacia atrás
echo"<script>

Swal.fire({
    icon: 'success',
  title: 'Excelente',
  text: 'Se Elimino el Respaldo'})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = '../views/respaldos.php';
    }
  
});

</script>";
?>
    
    </body>
</html>
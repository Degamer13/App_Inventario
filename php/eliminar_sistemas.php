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
// Conexión a la base de datos
require "conexion.php";
$id=$_GET['id'];
        $query = "DELETE FROM sistema WHERE id = $id";
        mysqli_query($conexion, $query);
        ?>
        <script>

Swal.fire({
  icon: 'success',
  title: "Excelente",
  text: "El registro ha sido eliminado"})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/sistemas.php";
    }
  
});
</script>
       <?php

?>
</body>
</html>

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
// Conexión a la base de datos
require "conexion.php";

// Verifica si se ha enviado un formulario para eliminar un usuario
if(isset($_GET['id'])){
    // Obtiene el ID del usuario que se está eliminando
    $id_usuario_eliminar = $_GET['id'];

    // Obtiene el ID del usuario actualmente conectado
    session_start();
    $id_usuario_conectado = $_SESSION['id'];

    // Verifica si el usuario que se está eliminando es el mismo que el usuario conectado
    if($id_usuario_eliminar == $id_usuario_conectado){
        // Muestra un mensaje de error y no permite la eliminación
		?>

        <script>
        
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "No puedes eliminarte a ti mismo"})
          .then((result) => {
            if (result.value) {
               // Aquí puedes redirigir al usuario a la página de registro
               window.location.href = "../views/usuarios.php";
            }
          
        });
        
        </script>
      <?php
        
    } else {
        // Elimina el usuario de la base de datos
        $query = "DELETE FROM users WHERE id = $id_usuario_eliminar";
        mysqli_query($conexion, $query);
        ?>
        <script>

Swal.fire({
  icon: 'success',
  title: "Excelente",
  text: "El usuario ha sido eliminado"})
  .then((result) => {
    if (result.value) {
       // Aquí puedes redirigir al usuario a la página de registro
       window.location.href = "../views/usuarios.php";
    }
  
});
</script>
       <?php
    }
}
?>
</body>
</html>

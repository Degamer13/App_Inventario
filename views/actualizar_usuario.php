
<?php 

require"../php/conexion.php";
$id= $_GET['id'];
$consulta= "SELECT * FROM users u LEFT JOIN roles r ON u.role_id=r.id_rol WHERE id=$id";
$ejecute= $conexion->query($consulta);
$extraer= $ejecute->fetch_assoc();

 ?>

         
    <body class="sb-nav-fixed">

    <?php require'nav.php';?>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Actualización de Usuario</h1>
                      
                        <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">

      <div class="card">
       
      
  <div class="card-body">
  <center><i class='fas fa-user-circle' style='font-size:50px;'></i><h3>Actualizar Usuario</h3></center>
  <form action="../php/actualizar_user.php?id=<?=$extraer['id']?>" method="POST" onsubmit="return validarClave()">
   <div class="row g-2">
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Nombre de Usuario</label>
      <input type="text" class="form-control"  placeholder="Escribir Usuario" value="<?php echo $extraer['username'] ?>" name="username" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Correo Eléctronico</label>
    <input type="email" class="form-control" placeholder="example@gmail.com" name="email" value="<?php echo $extraer['email'] ?>" required>
      
    </div>
  </div>
  
  <div class="mb-3">
    <label for="floatingInput">Contraseña</label>
  <input type="password" class="form-control"  placeholder="Escribir Contraseña" id="clave" name="passwordd" maxlength="15" minlength="8" required>
  
</div>
<div class="mb-3">
    <label for="floatingInput">Confirmar Contraseña</label>
  <input type="password" class="form-control"  placeholder="Repetir Contraseña"  id="confirmacionClave" name="confirm_password" maxlength="15" minlength="8" required>
  
</div>
<div class="mb-3">
 <select class="form-select"  name="role_id" required> 
  <option value="">Seleccione un rol</option>
    <?php  
  
  $queru="SELECT * FROM roles"; 
  $resultadu=mysqli_query($conexion, $queru); ?> 
  
   
    
      <?php 
        while($listo=mysqli_fetch_array($resultadu)) 
        echo "<option  value='".$listo["id_rol"]."'>".$listo["nombre"]." </option>";  
      ?> 
       </select> 
     

  </div>

<div class="mb-3">

    <select name="estatus" class="form-select" id="" required>

    <option value="">Seleccione un Estatus</option>
    <option value="Activo">Activo</option>
    <option value="Inativo">Inativo</option>
    </select>
 
</div>


<div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-outline-info">Actualizar</button>

</div>
  

</form>
  </div>
</div>

</div>
 
 </div>

                      
                      
                </main>

    <br>
    <?php require'footer.php';?>
            
                
     
    </body>
</html>

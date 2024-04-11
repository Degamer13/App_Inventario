<?php require'nav.php';?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Nuevo Usuario</h1>
                      
                        <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">

      <div class="card">
       
      
  <div class="card-body">
  <center><i class='fas fa-user-circle' style='font-size:50px;'></i><h3>Registrar Usuario</h3></center>
  <form action="../php/agregarUsuario.php" method="POST" onsubmit="return validarClave()">
   <div class="row g-2">
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Nombre de Usuario</label>
      <input type="text" class="form-control"  placeholder="Escribir Usuario" name="username" required>
      
    </div>
  </div>
  <div class="col-md">
  <div class="mb-3">
    <label for="floatingInputGrid">Correo Eléctronico</label>
    <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required>
      
    </div>
  </div>
  
  <div class="mb-3">
    <label for="floatingInput">Contraseña</label>
  <input type="password" class="form-control"  placeholder="Escribir Contraseña" id="clave" name="passwordd" maxlength="15" minlength="8" required>
  
</div>
<div class="mb-3">
    <label for="floatingInput">Confirmar Contraseña</label>
  <input type="password" class="form-control"  placeholder="Repetir Contraseña"  id="confirmacionClave"  maxlength="15" minlength="8" required>
  
</div>

 <select class="form-select"  name="role_id" required> 
  <option value="">Seleccione un rol</option>
    <?php  
  require"../php/conexion.php";
  $queru="SELECT * FROM roles"; 
  $resultadu=mysqli_query($conexion, $queru); ?> 
  
   
    
      <?php 
        while($listo=mysqli_fetch_array($resultadu)) 
        echo "<option  value='".$listo["id_rol"]."'>".$listo["nombre"]." </option>";  
      ?> 
       </select> 
  </div>
 
<input type="hidden" value="Activo" name="estatus">

<br>
<div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-outline-info">Registrar</button>

</div>
  

</form>
  </div>
</div>

</div>
 
 </div>

                      
                      
                </main>
                <?php require'footer.php';?>